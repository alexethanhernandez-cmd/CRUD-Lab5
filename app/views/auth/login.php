<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Product Manager</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0d0d0d;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #1a1a1a;
            width: 100%;
            max-width: 380px;
            border-radius: 16px;
            padding: 40px 36px;
            border: 1px solid #2e2a1f;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }
        .logo {
            width: 52px;
            height: 52px;
            background: #d4a72c;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d0d0d;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
        }
        h2 {
            text-align: center;
            color: #f5f5f5;
            font-size: 22px;
            margin-bottom: 4px;
        }
        .subtitle {
            text-align: center;
            color: #9a9a9a;
            font-size: 14px;
            margin-bottom: 28px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #d4a72c;
            margin-bottom: 6px;
            margin-top: 16px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            background: #0d0d0d;
            border: 1.5px solid #3a3626;
            border-radius: 8px;
            font-size: 14px;
            color: #f5f5f5;
            transition: border-color 0.2s;
        }
        input::placeholder { color: #6b6b6b; }
        input:focus {
            outline: none;
            border-color: #d4a72c;
        }
        button {
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            background: #d4a72c;
            color: #0d0d0d;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        button:hover { opacity: 0.85; }
        .error {
            background: #2a1414;
            color: #f87171;
            border: 1px solid #5c2626;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">P</div>
        <h2>Welcome back</h2>
        <p class="subtitle">Sign in to manage your products</p>

        <?php if (!empty($error)): ?>
            <p class="error"><?= html_escape($error) ?></p>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">
            <label>Username</label>
            <input type="text" name="username" required autofocus placeholder="Enter your username">

            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter your password">

            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>