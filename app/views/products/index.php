<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0d0d0d;
            color: #f5f5f5;
        }
        .navbar {
            background: #1a1a1a;
            color: #f5f5f5;
            padding: 18px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #2e2a1f;
        }
        .navbar h1 { font-size: 20px; font-weight: 700; color: #d4a72c; }
        .user-info { display: flex; align-items: center; gap: 14px; font-size: 14px; color: #d4d4d4; }
        .user-info strong { font-weight: 700; color: #f5f5f5; }
        .btn-logout {
            background: #262626;
            color: #d4a72c;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-logout:hover { background: #333333; }

        .container { max-width: 1100px; margin: 0 auto; padding: 32px 24px; }

        .top-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .top-row h2 { font-size: 22px; color: #f5f5f5; }
        .btn-add {
            background: #d4a72c;
            color: #0d0d0d;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: transform 0.15s;
            display: inline-block;
        }
        .btn-add:hover { transform: translateY(-1px); opacity: 0.9; }

        .card {
            background: #1a1a1a;
            border-radius: 14px;
            border: 1px solid #2e2a1f;
            overflow: hidden;
        }
        table { width: 100%; border-collapse: collapse; }
        th {
            background: #141414;
            text-align: left;
            padding: 14px 18px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #d4a72c;
            border-bottom: 1px solid #2e2a1f;
        }
        td {
            padding: 16px 18px;
            font-size: 14px;
            border-bottom: 1px solid #262626;
            color: #d4d4d4;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #202020; }
        .price { font-weight: 700; color: #d4a72c; }
        .empty { text-align: center; padding: 40px; color: #6b6b6b; }

        .actions { display: flex; gap: 8px; }
        .btn { padding: 6px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600; }
        .btn-edit { background: #3a3320; color: #d4a72c; }
        .btn-edit:hover { background: #4a4028; }
        .btn-delete { background: #3a1f1f; color: #f87171; }
        .btn-delete:hover { background: #4a2828; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>📦 Product Manager</h1>
        <div class="user-info">
            <span>Logged in as <strong><?= html_escape($username) ?></strong></span>
            <a class="btn-logout" href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="top-row">
            <h2>Products</h2>
            <a class="btn-add" href="<?= site_url('products/create') ?>">+ Add Product</a>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>#<?= html_escape($product['id']) ?></td>
                            <td><strong><?= html_escape($product['product_name']) ?></strong></td>
                            <td><?= html_escape($product['description']) ?></td>
                            <td class="price">₱<?= number_format((float) $product['price'], 2) ?></td>
                            <td><?= html_escape($product['quantity']) ?></td>
                            <td><?= html_escape($product['created_at']) ?></td>
                            <td>
                                <div class="actions">
                                    <a class="btn btn-edit" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a>
                                    <a class="btn btn-delete" href="<?= site_url('products/delete/' . $product['id']) ?>"
                                       onclick="return confirm('Delete this product?');">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="empty">No products yet. Click "+ Add Product" to get started.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>