<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f4f7fb 0%, #e8edf5 100%);
            color: #1f2937;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 3rem 1.5rem;
        }
        h1 { margin-bottom: 1.5rem; font-size: 1.6rem; }
        table {
            background: #fff;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        th, td {
            padding: 0.85rem 1.25rem;
            text-align: left;
            font-size: 0.92rem;
        }
        th {
            background: #2563eb;
            color: #fff;
            font-weight: 600;
        }
        tbody tr:nth-child(even) { background: #f8fafc; }
        tbody tr:hover { background: #eef2ff; }
        td { border-bottom: 1px solid #f1f5f9; }
        .empty {
            padding: 1.5rem;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>
<body>

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']); ?></td>
                    <td><?= htmlspecialchars($user['firstname']); ?></td>
                    <td><?= htmlspecialchars($user['lastname']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="empty">No users found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
