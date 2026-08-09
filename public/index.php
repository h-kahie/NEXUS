<?php
require_once __DIR__ . '/../app/config/app.php';
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';

$controller = new DashboardController($pdo);
$data = $controller->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(APP_NAME) ?> — Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <a class="brand" href="index.php"><span class="brand-mark">N</span><span><b>NEXUS</b><small>Personal Life OS</small></span></a>
        <nav>
            <a class="active" href="index.php">⌂ Dashboard</a>
            <a href="#education">🎓 Education</a>
            <a href="#skills">💻 Skills</a>
            <a href="#faith">🕌 Faith</a>
            <a href="#health">🏋 Health</a>
            <a href="#personal">🧠 Personal</a>
            <hr>
            <a href="#schedule">◷ Schedule</a>
            <a href="#weekly">↻ Weekly Rhythm</a>
            <a href="#monthly">▦ Monthly Rhythm</a>
        </nav>
        <div class="profile"><strong>HK</strong><div><b>Hassan Kahie</b><small>Focus • Plan • Grow</small></div></div>
    </aside>
    <main class="main">
        <header class="topbar"><div><span class="eyebrow">PERSONAL LIFE OPERATING SYSTEM</span><h1>Good morning, Hassan 👋</h1><p>Stay focused. Keep building. Make it count.</p></div><div class="date"><?= date('D, M j, Y') ?></div></header>

        <section class="stats">
            <article class="card hero-stat"><small>OVERALL PROGRESS</small><strong><?= $data['overall_progress'] ?>%</strong><span>Across your five life areas</span></article>
            <?php foreach ($data['areas'] as $area): ?>
            <article class="card stat"><span class="area-icon"><?= e($area['icon']) ?></span><b><?= e($area['name']) ?></b><strong><?= (int)$area['progress'] ?>%</strong><div class="bar"><i style="width:<?= (int)$area['progress'] ?>%"></i></div><small><?= (int)$area['goal_count'] ?> goals</small></article>
            <?php endforeach; ?>
        </section>

        <section class="grid-3">
            <article class="card" id="weekly"><div class="section-title"><h2>🎯 This Week's Priorities</h2><a href="#weekly">View all →</a></div>
                <?php foreach ($data['priorities'] as $i => $priority): ?><div class="priority"><span><?= $i + 1 ?></span><div><b><?= e($priority['title']) ?></b><small><?= e($priority['area']) ?></small></div><em><?= e($priority['status']) ?></em></div><?php endforeach; ?>
            </article>
            <article class="card" id="schedule"><div class="section-title"><h2>🗓 Today's Schedule</h2><a href="#schedule">Calendar →</a></div>
                <?php foreach ($data['schedule'] as $event): ?><div class="event"><time><?= e($event['time']) ?></time><div><b><?= e($event['title']) ?></b><small><?= e($event['area']) ?> • <?= e($event['duration']) ?></small></div></div><?php endforeach; ?>
            </article>
            <article class="card"><div class="section-title"><h2>⚠ Needs Attention</h2><a href="#goals">View all →</a></div>
                <?php if (!$data['attention']): ?><p class="empty">Everything is on track.</p><?php else: foreach ($data['attention'] as $item): ?><div class="attention"><span>!</span><div><b><?= e($item['title']) ?></b><small><?= e($item['detail']) ?></small></div></div><?php endforeach; endif; ?>
            </article>
        </section>

        <section class="card" id="goals"><div class="section-title"><h2>🎯 Active Goals</h2><span class="muted">Goals & milestones, not daily tasks</span></div>
            <div class="table-wrap"><table><thead><tr><th>Goal</th><th>Area</th><th>Progress</th><th>Deadline</th><th>Status</th></tr></thead><tbody>
            <?php foreach ($data['goals'] as $goal): ?><tr><td><?= e($goal['title']) ?></td><td><?= e($goal['area']) ?></td><td><div class="mini"><i style="width:<?= (int)$goal['progress'] ?>%"></i></div><?= (int)$goal['progress'] ?>%</td><td><?= e($goal['deadline'] ?: '—') ?></td><td><span class="status"><?= e($goal['status']) ?></span></td></tr><?php endforeach; ?>
            </tbody></table></div>
        </section>
        <footer>NEXUS v1.0 · Built for clarity, consistency and growth.</footer>
    </main>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
