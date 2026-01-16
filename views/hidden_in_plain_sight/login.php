<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['password'] ?? '';

    if ($pass === 'Admin123!') {
        header("Location: /challenge/hidden_in_plain_sight/desktop");
        require __DIR__ . '/../views/hidden_in_plain_sight/desktop.php';
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verrouillage Système</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at center, #2c3e50 0%, #000000 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
        }
        .login-container {
            text-align: center;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .user-avatar {
            width: 100px;
            height: 100px;
            background: #ddd;
            border-radius: 50%;
            margin: 0 auto 20px;
            background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png');
            background-size: cover;
            border: 3px solid rgba(255,255,255,0.3);
        }
        h2 { margin-bottom: 25px; font-weight: 300; letter-spacing: 1px; }
        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            background: rgba(255,255,255,0.2);
            color: white;
            border-radius: 5px;
            box-sizing: border-box;
            transition: background 0.3s;
        }
        input::placeholder { color: rgba(255,255,255,0.6); }
        input:focus { background: rgba(255,255,255,0.3); outline: none; }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: #0078d4;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover { background: #005a9e; }
        .error-msg { color: #ff6b6b; margin-bottom: 15px; font-size: 0.9em; }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="user-avatar"></div>
        <h2>Administrateur</h2>
        
        <?php if(isset($error)): ?>
            <div class="error-msg"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" autocomplete="off" action="">
            <!-- A CHANGER AVANT PRODUCTION : MDP est Admin123! -->
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Entrer →</button>
        </form>
    </div>

</body>
</html>