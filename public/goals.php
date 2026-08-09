<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../app/models/Goal.php';

$model = new Goal(db());
$areas = db()->query('SELECT id,name FROM areas ORDER BY sort_order')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'create';
    $data = [
        'area_id' => (int)$_POST['area_id'],
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description'] ?? ''),
        'status' => $_POST['status'] ?? 'not_started',
        'progress' => max(0, min(100, (int)$_POST['progress'])),
        'deadline' => $_POST['deadline'] ?: null,
    ];
    if ($action === 'delete') $model->delete((int)$_POST['id']);
    elseif ($action === 'update') $model->update((int)$_POST['id'], $data);
    else $model->create($data);
    header('Location: goals.php'); exit;
}
$goals = $model->all();
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>NEXUS Goals</title><link rel="stylesheet" href="assets/css/style.css"></head><body>
<main class="main standalone"><header class="topbar"><div><span class="eyebrow">NEXUS MANAGEMENT</span><h1>Goals</h1><p>Create, update and track your outcomes.</p></div><a class="button" href="index.php">← Dashboard</a></header>
<section class="card form-card"><div class="section-title"><h2>+ Add Goal</h2></div><form method="post" class="goal-form"><input type="hidden" name="action" value="create"><input name="title" placeholder="Goal title" required><select name="area_id" required><?php foreach($areas as $a): ?><option value="<?= $a['id'] ?>"><?= e($a['name']) ?></option><?php endforeach; ?></select><select name="status"><option value="not_started">Not Started</option><option value="in_progress">In Progress</option><option value="on_track">On Track</option><option value="needs_attention">Needs Attention</option><option value="done">Done</option></select><input type="number" name="progress" min="0" max="100" value="0"><input type="date" name="deadline"><input name="description" placeholder="Notes / description"><button class="button" type="submit">Create Goal</button></form></section>
<section class="card"><div class="section-title"><h2>Active Goals</h2><span class="muted"><?= count($goals) ?> goals</span></div><div class="table-wrap"><table><thead><tr><th>Goal</th><th>Area</th><th>Progress</th><th>Deadline</th><th>Status</th><th>Action</th></tr></thead><tbody><?php foreach($goals as $g): ?><tr><td><?= e($g['title']) ?></td><td><?= e($g['area_name']) ?></td><td><?= (int)$g['progress'] ?>%</td><td><?= e($g['deadline'] ?: '—') ?></td><td><?= e($g['status']) ?></td><td><form method="post"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $g['id'] ?>"><button class="danger" onclick="return confirm('Delete this goal?')">Delete</button></form></td></tr><?php endforeach; ?></tbody></table></div></section></main></body></html>
