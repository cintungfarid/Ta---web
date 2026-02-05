<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - GameValen</title>
    <style>
        :root {
            --light-bg: #f5faf7;
            --light-green: #e4f3e8;
            --light-accent: #c5f9d4;
            --light-hover: #b3f0c5;
            --accent-green: #2d7a3e;
            --dark-text: #2d3748;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5faf7 0%, #e4f3e8 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 80px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(76, 175, 80, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(76, 175, 80, 0.15);
            width: 100%;
            max-width: 900px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-text);
            font-weight: 500;
            font-size: 18px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 16px;
            border: 1px solid rgba(76, 175, 80, 0.3);
            border-radius: 8px;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--dark-text);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--accent-green);
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.15);
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #2d7a3e 0%, #4caf50 100%);
            color: white;
            border: 1px solid #2d7a3e;
            border-radius: 8px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%);
            border-color: #4caf50;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        h2 {
            text-align: center;
            color: var(--accent-green);
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 700;
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
