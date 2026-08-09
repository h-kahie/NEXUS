<?php
// NEXUS Personal Life OS - initial dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS — Personal Life OS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <div class="brand"><div class="brand-mark">N</div><div><strong>NEXUS</strong><span>Personal Life OS</span></div></div>
        <nav class="nav">
            <a class="active" href="#dashboard">⌂ <span>Dashboard</span></a>
            <a href="#education">🎓 <span>Education</span></a>
            <a href="#skills">💻 <span>Skills</span></a>
            <a href="#faith">🕌 <span>Faith</span></a>
            <a href="#health">🏋️ <span>Health</span></a>
            <a href="#personal">🧠 <span>Personal</span></a>
            <div class="nav-divider"></div>
            <a href="#weekly">◫ <span>Weekly Rhythm</span></a>
            <a href="#monthly">▦ <span>Monthly Rhythm</span></a>
            <a href="#schedule">◷ <span>Schedule</span></a>
            <a href="#tasks">✓ <span>Tasks</span></a>
            <a href="#settings">⚙ <span>Settings</span></a>
        </nav>
        <div class="profile"><div class="avatar">HK</div><div><strong>Hassan Kahie</strong><span>Focus • Plan • Grow</span></div></div>
    </aside>

    <main class="main" id="dashboard">
        <header class="topbar">
            <div><p class="eyebrow">PERSONAL LIFE OPERATING SYSTEM</p><h1>Good morning, Hassan 👋</h1><p class="subtitle">Stay focused. Keep building. Make it count.</p></div>
            <div class="top-actions"><div class="search">⌕ <input placeholder="Search anything..."></div><button class="icon-btn">🔔</button></div>
        </header>

        <section class="stats-grid">
            <article class="card overall"><div class="card-label">Overall Progress</div><div class="ring"><span>68%</span></div><p>Keep going. You're building momentum.</p></article>
            <article class="card metric"><span class="metric-icon blue">🎓</span><h3>Education</h3><strong>75%</strong><div class="progress"><i style="width:75%"></i></div><small>12 / 16 goals</small></article>
            <article class="card metric"><span class="metric-icon purple">💻</span><h3>Skills</h3><strong>60%</strong><div class="progress purple-bar"><i style="width:60%"></i></div><small>9 / 15 goals</small></article>
            <article class="card metric"><span class="metric-icon green">🕌</span><h3>Faith</h3><strong>85%</strong><div class="progress green-bar"><i style="width:85%"></i></div><small>6 / 7 goals</small></article>
            <article class="card metric"><span class="metric-icon red">♥</span><h3>Health</h3><strong>55%</strong><div class="progress red-bar"><i style="width:55%"></i></div><small>5 / 9 goals</small></article>
            <article class="card metric"><span class="metric-icon orange">●</span><h3>Personal</h3><strong>65%</strong><div class="progress orange-bar"><i style="width:65%"></i></div><small>7 / 11 goals</small></article>
        </section>

        <section class="content-grid three">
            <article class="card priorities"><div class="section-head"><h2>📅 This Week's Priorities</h2><a href="#weekly">View Weekly Rhythm →</a></div>
                <div class="priority"><b>1</b><div><strong>Finish Database Assignment</strong><small>Education</small></div><em>High</em></div>
                <div class="priority"><b class="p2">2</b><div><strong>Build PHP Project</strong><small>Skills</small></div><em>High</em></div>
                <div class="priority"><b class="p3">3</b><div><strong>Workout 4× this week</strong><small>Health</small></div><em class="medium">Medium</em></div>
            </article>
            <article class="card schedule" id="schedule"><div class="section-head"><h2>🗓️ Today's Schedule</h2><a href="#calendar">View Calendar →</a></div>
                <div class="event"><time>08:00</time><div><strong>University Class</strong><small>Education • 2 hrs</small></div><span class="dot blue-dot"></span></div>
                <div class="event"><time>11:00</time><div><strong>PHP Practice</strong><small>Skills • 90 min</small></div><span class="dot purple-dot"></span></div>
                <div class="event"><time>15:30</time><div><strong>Quran Study</strong><small>Faith • 45 min</small></div><span class="dot green-dot"></span></div>
                <div class="event"><time>17:30</time><div><strong>Workout</strong><small>Health • 60 min</small></div><span class="dot red-dot"></span></div>
            </article>
            <article class="card attention"><div class="section-head"><h2>⚠️ Needs Attention</h2><a href="#goals">View All →</a></div>
                <div class="alert"><span>🚩</span><div><strong>Health progress is below 60%</strong><small>Focus on your health goal</small></div><em>Important</em></div>
                <div class="alert"><span>📅</span><div><strong>PHP Project deadline</strong><small>Due in 2 days</small></div><em>Due Soon</em></div>
                <div class="alert"><span>!</span><div><strong>2 goals behind schedule</strong><small>Review and update progress</small></div><em>Review</em></div>
            </article>
        </section>

        <section class="content-grid two">
            <article class="card"><div class="section-head"><h2>🎯 Recent Goals</h2><a href="#goals">View All Goals →</a></div><table><thead><tr><th>Goal</th><th>Area</th><th>Progress</th><th>Deadline</th><th>Status</th></tr></thead><tbody>
                <tr><td>Database System Project</td><td>Education</td><td><div class="mini-progress"><i style="width:80%"></i></div>80%</td><td>Aug 30</td><td><span class="status blue-status">In Progress</span></td></tr>
                <tr><td>PHP API Project</td><td>Skills</td><td><div class="mini-progress purple-mini"><i style="width:60%"></i></div>60%</td><td>Aug 25</td><td><span class="status blue-status">In Progress</span></td></tr>
                <tr><td>Quran Memorization</td><td>Faith</td><td><div class="mini-progress green-mini"><i style="width:90%"></i></div>90%</td><td>Sep 10</td><td><span class="status green-status">On Track</span></td></tr>
                <tr><td>Fitness Goal</td><td>Health</td><td><div class="mini-progress red-mini"><i style="width:45%"></i></div>45%</td><td>Sep 01</td><td><span class="status blue-status">In Progress</span></td></tr>
            </tbody></table></article>
            <article class="card"><div class="section-head"><h2>📈 Weekly Score History</h2><span class="select">Last 8 Weeks ▾</span></div><div class="bars"><span style="height:42%"><b>6.2</b></span><span style="height:49%"><b>6.8</b></span><span style="height:56%"><b>7.1</b></span><span style="height:48%"><b>6.5</b></span><span style="height:68%"><b>7.6</b></span><span style="height:76%"><b>7.9</b></span><span style="height:81%"><b>8.1</b></span><span style="height:86%"><b>8.3</b></span></div><div class="chart-labels"><span>Jun 23</span><span>Jun 30</span><span>Jul 7</span><span>Jul 14</span><span>Jul 21</span><span>Jul 28</span><span>Aug 4</span><span>Aug 11</span></div></article>
        </section>

        <footer>© 2026 NEXUS Personal Life OS · Built for clarity, consistency and growth.</footer>
    </main>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
