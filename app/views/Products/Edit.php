<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0d0d0d;
            color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #1a1a1a;
            width: 100%;
            max-width: 460px;
            border-radius: 16px;
            padding: 36px;
            border: 1px solid #2e2a1f;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }
        .icon {
            width: 48px;
            height: 48px;
            background: #d4a72c;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d0d0d;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        h2 { font-size: 20px; margin-bottom: 4px; color: #f5f5f5; }
        .subtitle { color: #9a9a9a; font-size: 13px; margin-bottom: 24px; }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #d4a72c;
            margin-bottom: 6px;
            margin-top: 16px;
        }
        input, textarea {
            width: 100%;
            padding: 11px 14px;
            background: #0d0d0d;
            border: 1.5px solid #3a3626;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: #f5f5f5;
            transition: border-color 0.2s;
        }
        input::placeholder, textarea::placeholder { color: #6b6b6b; }
        input:focus, textarea:focus { outline: none; border-color: #d4a72c; }
        .row { display: flex; gap: 12px; }
        .row > div { flex: 1; }
        .actions { display: flex; gap: 10px; margin-top: 26px; }
        button {
            flex: 1;
            padding: 12px;
            background: #d4a72c;
            color: #0d0d0d;
            font-size: 14px;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { opacity: 0.85; }
        .btn-cancel {
            flex: 1;
            padding: 12px;
            background: #262626;
            color: #d4d4d4;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        .btn-cancel:hover { background: #333333; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">✎</div>
        <h2>Edit Product</h2>
        <p class="subtitle">Update the details of this product.</p>

        <form method="post" action="<?= site_url('products/edit/' . $product['id']) ?>">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?= html_escape($product['product_name']) ?>" required>

            <label>Description</label>
            <textarea name="description" rows="3"><?= html_escape($product['description']) ?></textarea>

            <div class="row">
                <div>
                    <label>Price</label>
                    <input type="number" step="0.01" min="0" name="price" value="<?= html_escape($product['price']) ?>" required>
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="number" min="0" name="quantity" value="<?= html_escape($product['quantity']) ?>" required>
                </div>
            </div>

            <div class="actions">
                <a class="btn-cancel" href="<?= site_url('products') ?>">Cancel</a>
                <button type="submit">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>