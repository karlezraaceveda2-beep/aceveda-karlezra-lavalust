<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | LavaLust</title>
    <style>
        :root { --ink: #17232b; --muted: #718087; --paper: #f4f0e8; --panel: #fffdf8; --line: #d9d8cc; --coral: #ec684f; --teal: #1d7770; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; padding: 24px; display: grid; place-items: center; color: var(--ink); background: var(--paper); font-family: Georgia, 'Times New Roman', serif; }
        .auth-shell { width: min(100%, 980px); min-height: 600px; display: grid; grid-template-columns: .9fr 1.1fr; background: var(--panel); border: 1px solid var(--line); box-shadow: 14px 14px 0 #d9d1c1; }
        .brand-panel { position: relative; overflow: hidden; padding: 42px; display: flex; flex-direction: column; justify-content: space-between; color: #fffaf0; background: var(--teal); }
        .brand-panel:after { content: ''; position: absolute; width: 230px; height: 230px; right: -78px; bottom: -66px; border: 32px solid rgba(255,255,255,.14); border-radius: 50%; }
        .mark { position: relative; z-index: 1; font: 700 .78rem/1 'Courier New', monospace; letter-spacing: .2em; }
        .brand-copy { position: relative; z-index: 1; }
        .brand-copy h2 { max-width: 280px; margin: 0 0 16px; font-size: clamp(2.4rem, 5vw, 4.6rem); line-height: .9; letter-spacing: -.06em; }
        .brand-copy p { max-width: 260px; margin: 0; color: #c9e1d9; font: .95rem/1.6 'Trebuchet MS', sans-serif; }
        .eyebrow { margin: 0 0 10px; color: #f7b59f; font: 700 .7rem/1 'Courier New', monospace; letter-spacing: .18em; text-transform: uppercase; }
        .form-panel { align-self: center; width: min(100%, 390px); padding: 54px 48px; }
        h1 { margin: 0 0 8px; font-size: 2.25rem; letter-spacing: -.04em; }
        .subtitle { margin: 0 0 30px; color: var(--muted); font: .92rem/1.5 'Trebuchet MS', sans-serif; }
        label { display: block; margin: 18px 0 7px; font: 700 .76rem/1 'Courier New', monospace; letter-spacing: .04em; text-transform: uppercase; }
        input { width: 100%; padding: 13px 14px; border: 1px solid var(--line); border-radius: 2px; color: var(--ink); background: #fbfaf5; font: 1rem 'Trebuchet MS', sans-serif; }
        input:focus { outline: 2px solid #f3b19c; outline-offset: 2px; border-color: var(--coral); }
        button { width: 100%; margin-top: 26px; padding: 14px; border: 0; border-radius: 2px; color: #fff; background: var(--coral); cursor: pointer; font: 700 .82rem 'Courier New', monospace; letter-spacing: .1em; text-transform: uppercase; }
        button:hover { background: #d95641; }
        .msg { margin-bottom: 14px; padding: 11px 13px; border-left: 3px solid; font: .82rem/1.4 'Trebuchet MS', sans-serif; }
        .msg.error { color: #913c32; background: #fbe9e3; border-color: var(--coral); }
        .msg.info, .msg.success { color: #23635e; background: #e2f1eb; border-color: var(--teal); }
        .footer-link { margin-top: 24px; color: var(--muted); text-align: center; font: .83rem 'Trebuchet MS', sans-serif; }
        .footer-link a { color: var(--teal); font-weight: 700; text-decoration: none; }
        @media (max-width: 680px) { body { padding: 12px; } .auth-shell { display: block; box-shadow: 8px 8px 0 #d9d1c1; } .brand-panel { min-height: 220px; padding: 28px; } .brand-copy h2 { font-size: 3rem; } .form-panel { padding: 38px 28px; } }
    </style>
</head>
<body>
<main class="auth-shell">
    <section class="brand-panel">
        <div class="mark">LL / INVENTORY</div>
        <div class="brand-copy">
            <p class="eyebrow">A calmer way to keep stock</p>
            <h2>LavaLust</h2>
            <p>Make every product count. Keep your catalogue clear, current, and ready for the next move.</p>
        </div>
    </section>
    <section class="form-panel">
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to manage your products.</p>

    <?php if (!empty($denied)): ?>
        <div class="msg info">Please log in to continue.</div>
    <?php endif; ?>
    <?php if (!empty($registered)): ?>
        <div class="msg success">Account created. You can now log in.</div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login'); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="username" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" autocomplete="current-password" required>

        <button type="submit">Log In</button>
    </form>

    <div class="footer-link">
        Don't have an account? <a href="<?= base_url('register'); ?>">Register</a>
    </div>
    </section>
</main>
</body>
</html>
