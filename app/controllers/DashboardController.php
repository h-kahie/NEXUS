<?php
class DashboardController {
    public function __construct(private PDO $pdo) {}

    public function index(): array {
        $areas = $this->pdo->query("SELECT a.id, a.name, a.icon, COALESCE(ROUND(AVG(g.progress)), 0) progress, COUNT(g.id) goal_count FROM areas a LEFT JOIN goals g ON g.area_id = a.id GROUP BY a.id, a.name, a.icon ORDER BY a.sort_order")->fetchAll();
        $overall = (int)($this->pdo->query("SELECT COALESCE(ROUND(AVG(progress)),0) FROM goals WHERE status <> 'done'")->fetchColumn() ?: 0);
        $goals = $this->pdo->query("SELECT g.title, g.progress, g.deadline, g.status, a.name area FROM goals g JOIN areas a ON a.id=g.area_id ORDER BY g.deadline IS NULL, g.deadline LIMIT 8")->fetchAll();
        $schedule = $this->pdo->query("SELECT TIME_FORMAT(start_time,'%H:%i') time, title, area, duration FROM schedule_items WHERE schedule_date=CURDATE() AND status <> 'cancelled' ORDER BY start_time LIMIT 6")->fetchAll();
        $priorities = $this->pdo->query("SELECT title, area, status FROM weekly_priorities WHERE week_start = DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) ORDER BY priority_no LIMIT 3")->fetchAll();
        $attention = $this->pdo->query("SELECT title, CONCAT('Deadline: ', DATE_FORMAT(deadline,'%b %d')) detail FROM goals WHERE status='needs_attention' OR (deadline BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)) ORDER BY deadline LIMIT 4")->fetchAll();
        return compact('areas','overall','goals','schedule','priorities','attention') + ['overall_progress'=>$overall];
    }
}
