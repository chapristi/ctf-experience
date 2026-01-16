<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système d'Accès Sécurisé</title>
    <style>
        :root {
            --neon-green: #39ff14;
            --dark-bg: #0d1117;
            --panel-bg: rgba(22, 27, 34, 0.9);
            --border-color: #30363d;
        }

        body {
            margin: 0;
            background-color: var(--dark-bg);
            color: #e6edf3;
            font-family: 'Consolas', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: radial-gradient(circle at center, #1a202c 0%, #0d1117 100%);
        }

        .login-card {
            background: var(--panel-bg);
            border: 1px solid var(--border-color);
            padding: 50px;
            width: 400px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        .header-icon {
            font-size: 3rem;
            color: var(--neon-green);
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.2rem;
            letter-spacing: 3px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .field-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.7rem;
            color: #8b949e;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        input {
            width: 100%;
            background: #0d1117;
            border: 1px solid var(--border-color);
            padding: 12px;
            color: var(--neon-green);
            font-family: inherit;
            box-sizing: border-box;
            outline: none;
        }

        input:focus {
            border-color: var(--neon-green);
            box-shadow: 0 0 10px rgba(57, 255, 20, 0.1);
        }

        .btn-auth {
            width: 100%;
            background: transparent;
            border: 1px solid var(--neon-green);
            color: var(--neon-green);
            padding: 15px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
            letter-spacing: 2px;
            transition: all 0.3s;
        }

        .btn-auth:hover {
            background: var(--neon-green);
            color: var(--dark-bg);
        }

        #message {
            margin-top: 20px;
            font-size: 0.8rem;
            min-height: 20px;
        }

        .status-error { color: #ff4d4d; }
        .status-success { color: var(--neon-green); border: 1px solid var(--neon-green); padding: 15px; margin-top: 20px; }

        .back-nav {
            position: fixed;
            top: 30px;
            left: 30px;
            color: #8b949e;
            text-decoration: none;
            font-size: 0.8rem;
            border: 1px solid var(--border-color);
            padding: 5px 15px;
        }
    </style>
</head>
<body>

<a href="/challenges" class="back-nav"><_ ABANDONNER</a>

<div class="login-card">
    <div class="header-icon">🔒</div>
    <h1>GateKeeper_OS v1.0</h1>

    <div class="field-group">
        <label>IDENTITY_NAME</label>
        <input type="text" id="username" placeholder="Identifiant" autocomplete="off">
    </div>

    <div class="field-group">
        <label>ACCESS_KEY</label>
        <input type="password" id="password" placeholder="Mot de passe">
    </div>

    <button class="btn-auth" onclick="validateAccess()">AUTHENTIFIER</button>

    <div id="message"></div>
</div>

<script src="../assets/js/not_secure_login/login.js"></script>

</body>
</html>