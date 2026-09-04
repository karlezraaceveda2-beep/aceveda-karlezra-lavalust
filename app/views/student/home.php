<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal · LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --lime: #b7f34a;
            --green: #3cdd14;
            --orange: #ff8b38;
            --bg: #0a0a0b;
            --panel: #121315;
            --panel-light: #1a1c1d;
            --line: rgba(255, 255, 255, 0.1);
            --text: #f5f5f0;
            --muted: #90938d;
            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }
        body {
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--text);
            background:
                linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px),
                radial-gradient(circle at 14% 5%, rgba(183,243,74,0.14), transparent 30rem),
                var(--bg);
            background-size: 64px 64px, 64px 64px, auto, auto;
            font-family: var(--sans);
        }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1240px;
            margin: 0 auto;
            padding: 1.3rem 2rem;
            border-bottom: 1px solid var(--line);
        }
        .brand, .nav-link { text-decoration: none; }
        .brand { display: inline-flex; align-items: center; gap: 0.65rem; font-size: 0.98rem; font-weight: 700; }
        .brand-mark {
            display: grid;
            width: 30px;
            height: 30px;
            place-items: center;
            border-radius: 7px;
            background: var(--green);
            color: #071006;
            box-shadow: 0 0 24px rgba(60,221,20,0.3);
        }
        .nav-link { color: var(--muted); font-family: var(--mono); font-size: 0.78rem; }
        .nav-link:hover { color: var(--lime); }
        main { width: min(1120px, calc(100% - 4rem)); margin: 0 auto; padding: 5.5rem 0 6rem; }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            margin-bottom: 1.4rem;
            color: var(--lime);
            font-family: var(--mono);
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .eyebrow::before { content: ''; width: 7px; height: 7px; border-radius: 50%; background: var(--lime); box-shadow: 0 0 12px var(--lime); }
        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(270px, 0.7fr);
            align-items: end;
            gap: 3rem;
            margin-bottom: 3.5rem;
        }
        h1 { max-width: 720px; font-size: clamp(2.5rem, 6vw, 5.4rem); line-height: 1.02; letter-spacing: -0.05em; }
        h1 span { color: var(--lime); }
        .hero-copy { color: var(--muted); font-family: var(--mono); font-size: 0.9rem; line-height: 1.75; }
        .access-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            padding: 0.45rem 0.7rem;
            border: 1px solid rgba(183,243,74,0.25);
            border-radius: 999px;
            color: var(--lime);
            background: rgba(183,243,74,0.08);
            font-family: var(--mono);
            font-size: 0.7rem;
        }
        .access-chip::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .workspace { display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 1rem; }
        .panel { padding: 1.5rem; border: 1px solid var(--line); border-radius: 8px; background: rgba(18,19,21,0.88); }
        .panel-label { color: var(--muted); font-family: var(--mono); font-size: 0.72rem; letter-spacing: 0.05em; text-transform: uppercase; }
        .profile-panel { min-height: 265px; }
        .profile-panel h2 { margin: 1.1rem 0 0.75rem; font-size: 1.55rem; line-height: 1.25; }
        .profile-panel p { max-width: 470px; color: var(--muted); font-family: var(--mono); font-size: 0.82rem; line-height: 1.7; }
        .button {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            margin-top: 1.5rem;
            padding: 0.8rem 1rem;
            border-radius: 6px;
            background: var(--lime);
            color: #10140b;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform 160ms ease, background 160ms ease;
        }
        .button:hover { background: #d1ff70; transform: translateY(-2px); }
        .button span { font-size: 1rem; }
        .steps { display: grid; gap: 0.8rem; margin-top: 1.2rem; }
        .step { display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 0; border-top: 1px solid var(--line); }
        .step-number { display: grid; width: 28px; height: 28px; flex: 0 0 28px; place-items: center; border: 1px solid rgba(183,243,74,0.3); border-radius: 50%; color: var(--lime); font-family: var(--mono); font-size: 0.7rem; }
        .step strong { display: block; margin-bottom: 0.2rem; font-size: 0.78rem; font-weight: 500; }
        .step small { color: var(--muted); font-family: var(--mono); font-size: 0.68rem; }
        .notice { margin-bottom: 1.5rem; padding: 0.85rem 1rem; border: 1px solid rgba(255,139,56,0.3); border-radius: 7px; color: #ffc08e; background: rgba(255,139,56,0.08); font-family: var(--mono); font-size: 0.78rem; line-height: 1.5; }
        @media (max-width: 760px) {
            .topbar { padding: 1.1rem 1.25rem; }
            main { width: min(100% - 2.5rem, 1120px); padding: 3.75rem 0 4rem; }
            .hero, .workspace { grid-template-columns: 1fr; gap: 1.5rem; }
            .hero { margin-bottom: 2.5rem; }
            .profile-panel { min-height: auto; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="<?= site_url(); ?>"><span class="brand-mark" aria-hidden="true">🔥</span><span>LavaLust / Student</span></a>
        <a class="nav-link" href="<?= site_url('student/profile'); ?>">Profile →</a>
    </header>
    <main>
        <div class="eyebrow">Student workspace / home</div>
        <?php if (!empty($denied)): ?>
            <div class="notice">Profile access was refreshed. Your student badge is active now.</div>
        <?php endif; ?>
        <section class="hero" aria-labelledby="student-title">
            <div>
                <h1 id="student-title">Welcome back,<br><span><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>.</span></h1>
            </div>
            <p class="hero-copy">Your student workspace is ready. Keep your profile details close and make your next move from here.</p>
        </section>
        <section class="workspace" aria-label="Student workspace options">
            <article class="panel profile-panel">
                <span class="panel-label">Your profile</span>
                <h2>See the details<br>behind your account.</h2>
                <p>Review your student ID, course, year level, skills, and the information that makes up your profile.</p>
                <a class="button" href="<?= site_url('student/profile'); ?>">Open student profile <span>↗</span></a>
            </article>
            <article class="panel">
                <span class="panel-label">Quick start</span>
                <div class="steps">
                    <div class="step"><span class="step-number">01</span><div><strong>Access granted</strong><small>Your student badge is active.</small></div></div>
                    <div class="step"><span class="step-number">02</span><div><strong>Check your profile</strong><small>Keep your academic details current.</small></div></div>
                    <div class="step"><span class="step-number">03</span><div><strong>Stay in the loop</strong><small>Return here whenever you need to.</small></div></div>
                </div>
            </article>
        </section>
    </main>
</body>
</html>