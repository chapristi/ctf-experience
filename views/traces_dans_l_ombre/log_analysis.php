<?php
$decrypted_flag = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flag_input'])) {
    if (trim($_POST['flag_input']) === 'Xian Jiao') {
        $decrypted_flag = "ANALYSE TERMINÉE : INTRUS IDENTIFIÉ. ACCÈS SÉCURISÉ. INITIER PROTOCOLE CTF{L0G_M45T3R_D3T3CT3D}";
    } else {
        $error = "ERREUR : FLAG INCORRECT.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ANALYSEUR DE LOGS TACTIQUE</title>
    <style>
        body {
            margin: 0; background: #050505; color: #00ff00;
            font-family: 'Consolas', 'Courier New', monospace; padding: 20px;
        }
        .terminal {
            border: 1px solid #00ff00; height: 400px; overflow-y: scroll;
            padding: 10px; background: rgba(0, 20, 0, 0.9); font-size: 0.85em;
            box-shadow: inset 0 0 10px #00ff00;
        }
        .log-entry { margin-bottom: 2px; border-bottom: 1px solid #004400; }
        .success { color: #ffffff; background: #004400; font-weight: bold; }
        
        .input-area { margin-top: 20px; border-top: 2px solid #00ff00; padding-top: 20px; }
        input { background: #000; border: 1px solid #00ff00; color: #00ff00; padding: 10px; width: 300px; }
        button { background: #00ff00; color: #000; border: none; padding: 10px 20px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>

<h2>[SST] - ANALYSEUR DE LOGS SERVEUR</h2>
<p>Instructions : Identifiez la connexion réussie parmi les tentatives de force brute.</p>

<div class="terminal" id="log-terminal">
    <?php
    for ($i = 1; $i <= 50000; $i++) {
        $ip = "192.168.1." . rand(2, 256);
        $date = "16/Jan/2026:14:" . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT) . ":" . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);

        if ($i === 27341) {
            echo "<div class='log-entry'>[$date] POST /login.php HTTP/1.1 200 OK - IP: 10.0.0.42 - Agent: Xian Jiao</div>";
        } else {
            echo "<div class='log-entry'>[$date] POST /login.php HTTP/1.1 401 Unauthorized - IP: $ip - Agent: Mozilla/5.0</div>";
        }
    }
    ?>
</div>

<div class="input-area">
    <?php if ($decrypted_flag): ?>
        <h3 style="color: #ffffff;"><?= $decrypted_flag ?></h3>
    <?php else: ?>
        <form method="POST">
            <label>EXTRAIRE LE NOM DE L'INFILTRANT :</label><br><br>
            <input type="text" name="flag_input" autocomplete="off" placeholder="" required>
            <button type="submit">VALIDER</button>
        </form>
        <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php endif; ?>
</div>

<script>
    const term = document.getElementById('log-terminal');
    term.scrollTop = 0;
</script>

</body>
</html>
