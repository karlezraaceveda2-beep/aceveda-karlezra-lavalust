<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$users = is_array($users ?? null) ? $users : [];
$active_users = 0;
foreach ($users as $user) {
    if ((int) ($user['is_active'] ?? 0) === 1) {
        $active_users++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users · LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --lava: #3cdd14;
            --lava-soft: rgba(60, 221, 20, 0.12);
            --orange: #ff7a18;
            --bg: #0a0a0b;
            --panel: #111113;
            --line: rgba(255, 255, 255, 0.09);
            --text: #f4f4f5;
            --muted: #8b8b94;
            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }
        html { background: var(--bg); }
        body {
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--text);
            background:
                linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px),
                radial-gradient(circle at 82% 5%, rgba(60,221,20,0.11), transparent 28rem),
                var(--bg);
            background-size: 64px 64px, 64px 64px, auto, auto;
            font-family: var(--sans);
        }
        a { color: inherit; }
        .site-nav {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1240px;
            margin: 0 auto;
            padding: 1.35rem 2rem;
            border-bottom: 1px solid var(--line);
        }
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            color: var(--text);
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
        }
        .brand-mark {
            display: grid;
            width: 30px;
            height: 30px;
            place-items: center;
            border-radius: 7px;
            background: var(--lava);
            color: #071006;
            box-shadow: 0 0 24px rgba(60,221,20,0.28);
            font-size: 0.9rem;
        }
        .nav-link {
            color: var(--muted);
            font-family: var(--mono);
            font-size: 0.78rem;
            text-decoration: none;
            transition: color 160ms ease;
        }
        .nav-link:hover { color: var(--lava); }
        main {
            position: relative;
            z-index: 1;
            width: min(1120px, calc(100% - 4rem));
            margin: 0 auto;
            padding: 5rem 0 6rem;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            margin-bottom: 1.35rem;
            color: var(--lava);
            font-family: var(--mono);
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .eyebrow::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--lava);
            box-shadow: 0 0 12px var(--lava);
        }
        .intro { margin-bottom: 2.5rem; }
        h1 {
            max-width: 700px;
            font-size: clamp(2.1rem, 5vw, 4.5rem);
            line-height: 1.06;
            letter-spacing: -0.04em;
        }
        h1 span { color: var(--lava); }
        .intro-copy {
            max-width: 410px;
            margin-top: 1rem;
            color: var(--muted);
            font-family: var(--mono);
            font-size: 0.9rem;
            line-height: 1.7;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.25rem;
        }
        .stat {
            min-height: 122px;
            padding: 1.35rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: rgba(17,17,19,0.82);
        }
        .stat-label {
            color: var(--muted);
            font-family: var(--mono);
            font-size: 0.72rem;
            text-transform: uppercase;
        }
        .stat-value {
            display: block;
            margin-top: 0.7rem;
            color: var(--text);
            font-size: 2rem;
            font-weight: 600;
        }
        .stat:nth-child(2) .stat-value { color: var(--lava); }
        .stat:nth-child(3) .stat-value { color: var(--orange); }
        .table-shell {
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: rgba(17,17,19,0.9);
            box-shadow: 0 24px 70px rgba(0,0,0,0.25);
        }
        .table-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.2rem 1.35rem;
            border-bottom: 1px solid var(--line);
        }
        .table-heading h2 { font-size: 0.92rem; font-weight: 500; }
        .table-heading span { color: var(--muted); font-family: var(--mono); font-size: 0.72rem; }
        .table-scroll { overflow-x: auto; }
        table { width: 100%; min-width: 650px; border-collapse: collapse; }
        th, td { padding: 1rem 1.35rem; text-align: left; }
        th {
            color: var(--muted);
            font-family: var(--mono);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        td { border-top: 1px solid var(--line); font-family: var(--mono); font-size: 0.82rem; }
        tbody tr { transition: background 160ms ease; }
        tbody tr:hover { background: rgba(60,221,20,0.045); }
        .user-id { color: #67676f; }
        .user-name { color: var(--text); font-weight: 600; }
        .email { color: var(--muted); }
        .role, .status {
            display: inline-flex;
            align-items: center;
            min-height: 27px;
            padding: 0.3rem 0.6rem;
            border-radius: 999px;
            font-size: 0.7rem;
        }
        .role { border: 1px solid rgba(255,122,24,0.25); color: var(--orange); background: rgba(255,122,24,0.08); }
        .status { gap: 0.4rem; border: 1px solid rgba(60,221,20,0.22); color: var(--lava); background: var(--lava-soft); }
        .status::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: currentColor; }
        .status.inactive { border-color: var(--line); color: var(--muted); background: transparent; }
        .empty, .error { padding: 3.5rem 1.5rem; text-align: center; font-family: var(--mono); font-size: 0.82rem; }
        .empty { color: var(--muted); }
        .error { margin: 0; color: #ff9c9c; background: rgba(255,72,72,0.06); }
        @media (max-width: 700px) {
            .site-nav { padding: 1.1rem 1.25rem; }
            main { width: min(100% - 2.5rem, 1120px); padding: 3.5rem 0 4rem; }
            .stats { grid-template-columns: 1fr; }
            .stat { min-height: auto; padding: 1.1rem 1.2rem; }
            .stat-value { margin-top: 0.4rem; font-size: 1.6rem; }
            .table-heading { align-items: start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <nav class="site-nav" aria-label="Primary navigation">
        <a class="brand" href="/"><span class="brand-mark" aria-hidden="true">🔥</span><span>LavaLust</span></a>
        <a class="nav-link" href="/">← Back to framework</a>
    </nav>
    <main>
        <div class="eyebrow">Directory / users</div>
        <section class="intro" aria-labelledby="page-title">
            <h1 id="page-title">The people<br><span>behind the build.</span></h1>
            <p class="intro-copy">A live view of the accounts connected to this LavaLust installation.</p>
        </section>
        <section class="stats" aria-label="User statistics">
            <article class="stat"><span class="stat-label">Total accounts</span><strong class="stat-value"><?= count($users); ?></strong></article>
            <article class="stat"><span class="stat-label">Active now</span><strong class="stat-value"><?= $active_users; ?></strong></article>
            <article class="stat"><span class="stat-label">System status</span><strong class="stat-value">Ready</strong></article>
        </section>
        <section class="table-shell" aria-labelledby="directory-title">
            <div class="table-heading">
                <h2 id="directory-title">Account directory</h2>
                <span><?= count($users); ?> record<?= count($users) === 1 ? '' : 's'; ?></span>
            </div>
            <?php if (!empty($error)): ?>
                <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php else: ?>
                <div class="table-scroll">
                    <table>
                        <thead><tr><th scope="col">ID</th><th scope="col">Username</th><th scope="col">Email</th><th scope="col">Role</th><th scope="col">Status</th></tr></thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <?php $is_active = (int) ($user['is_active'] ?? 0) === 1; ?>
                                    <tr>
                                        <td class="user-id">#<?= htmlspecialchars((string) ($user['id'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="user-name"><?= htmlspecialchars((string) ($user['username'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="email"><?= htmlspecialchars((string) ($user['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><span class="role"><?= htmlspecialchars((string) ($user['role'] ?? 'user'), ENT_QUOTES, 'UTF-8'); ?></span></td>
                                        <td><span class="status<?= $is_active ? '' : ' inactive'; ?>"><?= $is_active ? 'Active' : 'Inactive'; ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="empty">No users found yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>