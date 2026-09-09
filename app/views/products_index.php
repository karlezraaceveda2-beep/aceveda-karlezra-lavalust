<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$is_admin = (($_SESSION['role'] ?? null) === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | LavaLust</title>
    <style>
        :root { --ink: #17232b; --muted: #718087; --paper: #f4f0e8; --panel: #fffdf8; --line: #d9d8cc; --coral: #ec684f; --teal: #1d7770; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; padding: 30px; color: var(--ink); background: var(--paper); font-family: 'Trebuchet MS', Arial, sans-serif; }
        .wrap { max-width: 1180px; margin: 0 auto; }
        .topbar { display: flex; align-items: end; justify-content: space-between; gap: 24px; padding-bottom: 26px; border-bottom: 1px solid var(--line); flex-wrap: wrap; }
        .brand { font: 700 .72rem 'Courier New', monospace; letter-spacing: .18em; color: var(--teal); text-transform: uppercase; }
        h1 { margin: 12px 0 4px; font: 400 clamp(2.4rem, 5vw, 4.6rem)/.9 Georgia, 'Times New Roman', serif; letter-spacing: -.06em; }
        .kicker { margin: 0; color: var(--muted); font-size: .87rem; }
        .actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; justify-content: flex-end; }
        .identity { color: var(--muted); font-size: .82rem; }
        .identity strong { color: var(--ink); }
        .role { margin-left: 5px; padding: 4px 7px; color: var(--teal); background: #dcece4; border-radius: 2px; font: 700 .65rem 'Courier New', monospace; text-transform: uppercase; }
        .btn { display: inline-block; padding: 11px 14px; border: 1px solid transparent; border-radius: 2px; cursor: pointer; text-decoration: none; font: 700 .72rem 'Courier New', monospace; letter-spacing: .05em; text-transform: uppercase; }
        .btn-primary { color: #fff; background: var(--coral); }
        .btn-primary:hover { background: #d95641; }
        .btn-muted { color: var(--ink); background: transparent; border-color: var(--line); }
        .btn-muted:hover { border-color: var(--ink); }
        .btn-danger { color: #a84438; background: transparent; border-color: #e6b5a9; }
        .btn-danger:hover { color: #fff; background: var(--coral); }
        .btn-sm { padding: 7px 9px; font-size: .65rem; }
        .msg { margin: 22px 0; padding: 12px 14px; border-left: 3px solid; font-size: .84rem; }
        .msg.success { color: #23635e; background: #e2f1eb; border-color: var(--teal); }
        .msg.error { color: #913c32; background: #fbe9e3; border-color: var(--coral); }
        .panel { margin-top: 28px; overflow: hidden; background: var(--panel); border: 1px solid var(--line); box-shadow: 8px 8px 0 #ded7ca; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 17px 18px; text-align: left; font-size: .84rem; }
        th { color: var(--muted); background: #eeeadf; border-bottom: 1px solid var(--line); font: 700 .68rem 'Courier New', monospace; letter-spacing: .06em; text-transform: uppercase; }
        td { border-bottom: 1px solid #ece9df; }
        tbody tr:hover { background: #fff7f1; }
        td:first-child { color: var(--muted); font-family: 'Courier New', monospace; }
        td:nth-child(2) { font-weight: 700; }
        td.desc { max-width: 280px; color: var(--muted); line-height: 1.45; }
        td.numeric { text-align: right; white-space: nowrap; }
        .row-actions { display: flex; gap: 7px; }
        .empty { padding: 54px 20px; color: var(--muted); text-align: center; }
        form.inline { display: inline; }
        @media (max-width: 760px) { body { padding: 18px 12px; } .topbar { align-items: start; } .actions { justify-content: flex-start; } .panel { overflow-x: auto; } table { min-width: 760px; } }
    </style>
</head>
<body>
<div class="wrap">
    <div class="topbar">
        <div>
            <div class="brand">LavaLust / Inventory</div>
            <h1>Products</h1>
            <p class="kicker">A clear view of what is moving through your catalogue.</p>
        </div>
        <div class="actions">
            <span class="identity">
                Signed in as <strong><?= htmlspecialchars($_SESSION['username'] ?? ''); ?></strong>
                <?php if (!$is_admin): ?>
                    <span class="role">view only</span>
                <?php endif; ?>
            </span>
            <?php if ($is_admin): ?>
                <a class="btn btn-primary" href="<?= base_url('products/create'); ?>">+ Add Product</a>
            <?php endif; ?>
            <a class="btn btn-muted" href="<?= base_url('logout'); ?>">Logout</a>
        </div>
    </div>

    <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="panel">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <?php if ($is_admin): ?><th>Actions</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($product['id']); ?></td>
                            <td><?= htmlspecialchars($product['product_name']); ?></td>
                            <td class="desc"><?= htmlspecialchars($product['description']); ?></td>
                            <td class="numeric">₱<?= number_format((float) $product['price'], 2); ?></td>
                            <td class="numeric"><?= htmlspecialchars($product['quantity']); ?></td>
                            <td><?= htmlspecialchars($product['created_at'] ?? ''); ?></td>
                            <?php if ($is_admin): ?>
                            <td>
                                <div class="row-actions">
                                    <a class="btn btn-muted btn-sm" href="<?= base_url('products/edit/' . $product['id']); ?>">Edit</a>
                                    <form class="inline" method="post" action="<?= base_url('products/delete/' . $product['id']); ?>" onsubmit="return confirm('Delete this product?');">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="<?= $is_admin ? 7 : 6; ?>" class="empty">
                        <?= $is_admin ? 'No products yet. Click "Add Product" to create one.' : 'No products yet.'; ?>
                    </td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
