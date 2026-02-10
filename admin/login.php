<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - GameValen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #11998e;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
            font-weight: 500;
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #11998e;
        }

        button {
            width: 100%;
            padding: 11px;
            background: #11998e;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 8px;
        }

        button:hover {
            background: #0d8073;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 1.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="login_proses.php" method="post">
            <div class="input-group">
                <label for="user_name">Username</label>
                <input type="text" id="user_name" name="user_name" maxlength="10" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" maxlength="20" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
