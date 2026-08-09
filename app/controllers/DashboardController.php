<?php

declare(strict_types=1);

final class DashboardController
{
    public function __construct(private PDO $pdo) {}

    public function index(): array
    {
        $areas = $this->pdo->query(
            "SELECT a.id, a.name, a.icon,
                    COALESCE(ROUND(AVG(g.progress)), 0) AS progress,
                    COUNT(g.id) AS goal_count
             FROM areas a
             LEFT JOIN goals g ON g.area_id = a.id
             GROUP BY a.id, a.name, a.icon, a.sort_order
             ORDER BY a.sort_order"
        )->fetchAll();

        $overall = (int)($this->pdo->query(
            "SELECT COALESCE(ROUND(AVG(progress)), 0)
             FROM goals
             WHERE status <> 'done'"
        )->fetchColumn() ?: 0);

        $goals = $this->pdo->query(
            "SELECT g.title, g.progress, g.deadline, g.status, a.name AS area
             FROM goals g
             JOIN areas a ON a.id = g.area_id
             ORDER BY g.deadline IS NULL, g.deadline
             LIMIT 8"
        )->fetchAll();

        $schedule = $this->pdo->query(
            "SELECT TIME_FORMAT(s.start_time, '%H:%i') AS time,
                    s.title,
                    COALESCE(a.name, 'Personal') AS area,
                    CASE
                        WHEN s.duration_minutes IS NULL THEN 'Planned'
                        WHEN s.duration_minutes < 60 THEN CONCAT(s.duration_minutes, ' min')
                        ELSE CONCAT(ROUND(s.duration_minutes / 60, 1), ' hrs')
                    END AS duration
             FROM schedule_items s
             LEFT JOIN areas a ON a.id = s.area_id
             WHERE s.schedule_date = CURDATE()
               AND s.status <> 'cancelled'
             ORDER BY s.start_time
             LIMIT 6"
        )->fetchAll();

        $priorities = $this->pdo->query(
            "SELECT p.title,
                    COALESCE(a.name, 'Personal') AS area,
                    p.status
             FROM weekly_priorities p
             LEFT JOIN areas a ON a.id = p.area_id
             WHERE p.week_start = DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)
             ORDER BY p.priority_no
             LIMIT 3"
        )->fetchAll();

        $attention = $this->pdo->query(
            "SELECT title,
                    CONCAT('Deadline: ', DATE_FORMAT(deadline, '%b %d')) AS detail
             FROM goals
             WHERE status = 'needs_attention'
                OR (deadline BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY))
             ORDER BY deadline
             LIMIT 4"
        )->fetchAll();

        return [
            'areas' => $areas,
            'overall_progress' => $overall,
            'goals' => $goals,
            'schedule' => $schedule,
            'priorities' => $priorities,
            'attention' => $attention,
        ];
    }
}
