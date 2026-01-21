<?php
$step = "login"; 
$error = "";
$flag = "CTF{S3CUR1TY_QU3ST1ONS_4R3_W34K}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'check_questions') {
        $q1 = strtolower(trim($_POST['q1']));
        $q2 = strtolower(trim($_POST['q2']));
        $q3 = trim($_POST['q3']);

        if ($q1 === 'mistigri' && $q2 === 'bordeaux' && $q3 === '1985') {
            $step = "success";
        } else {
            $step = "forgot";
            $error = "Accès refusé. Les réponses ne correspondent pas à nos archives.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Poste de Travail - Jean-Pierre Martin</title>
    <style>
        :root { --win-blue: #0078d4; --bg-gray: #f3f3f3; --pdf-gray: #525659; }
        body {
            margin: 0; height: 100vh;
            background: url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1600') center/cover;
            font-family: 'Segoe UI', sans-serif; overflow: hidden;
        }

        /* Desktop icons */
        .desktop { padding: 20px; display: grid; grid-template-columns: repeat(1, 100px); gap: 20px; }
        .icon { width: 90px; text-align: center; color: white; cursor: pointer; text-shadow: 1px 1px 2px black; font-size: 0.8em; }
        .icon img { width: 45px; display: block; margin: 0 auto 5px; }

        /* Windows */
        .window {
            position: absolute; background: white; border: 1px solid #777;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: none; flex-direction: column; z-index: 10;
        }
        .title-bar { 
            background: #eee; color: #333; padding: 5px 12px; font-size: 0.85em;
            display: flex; justify-content: space-between; cursor: move; user-select: none;
            border-bottom: 1px solid #ccc;
        }
        .close { cursor: pointer; color: #555; font-weight: bold; }
        .close:hover { color: red; }

        /* PDF Viewer Style */
        .pdf-viewer { background: var(--pdf-gray); overflow-y: auto; height: 500px; padding: 20px; }
        .pdf-page { 
            background: white; width: 100%; max-width: 500px; margin: 0 auto; 
            padding: 40px; box-sizing: border-box; box-shadow: 0 0 10px rgba(0,0,0,0.5);
            font-family: 'Arial', sans-serif; color: #333; font-size: 0.9em;
        }
        .pdf-header { border-bottom: 2px solid var(--win-blue); padding-bottom: 10px; margin-bottom: 20px; }
        .pdf-section { margin-bottom: 15px; }
        .pdf-section h3 { color: var(--win-blue); font-size: 1em; border-bottom: 1px solid #eee; margin-bottom: 5px; }

        /* Vault UI */
        .vault-container { padding: 5px; text-align: center; color: #333; }
        input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; box-sizing: border-box; }
        button { background: var(--win-blue); color: white; border: none; padding: 10px; cursor: pointer; width: 100%; }
        .forgot-link { font-size: 0.8em; color: var(--win-blue); cursor: pointer; text-decoration: underline; margin-top: 10px; display: block; }
    </style>
</head>
<body>

<div class="desktop">
    <div class="icon" onclick="openApp('cv-win')">
        <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF">
        CV_JeanPierre_2025.pdf
    </div>
    <div class="icon" onclick="openApp('photo-win')">
        <img src="https://cdn-icons-png.flaticon.com/512/337/337948.png" alt="JPG">
        Mistigri_vacances.jpg
    </div>
    <div class="icon" onclick="openApp('vault-win')" >
        <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" alt="Vault">
        SECRET.exe
    </div>
    <div class="icon">
        <img src="https://cdn-icons-png.flaticon.com/512/716/716054.png" alt="Folder">
        Factures_2024
    </div>
    <div class="icon">
        <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Trash">
        Corbeille
    </div> 
</div>

<div id="cv-win" class="window" style="top: 30px; left: 80px; width: 600px;">
    <div class="title-bar"><span>Adobe Acrobat - CV_JeanPierre_2025.pdf</span><span class="close" onclick="closeApp('cv-win')">✕</span></div>
    <div class="pdf-viewer">
        <div class="pdf-page">
            <div class="pdf-header">
                <h1 style="margin:0;">Jean-Pierre MARTIN</h1>
                <p style="margin:5px 0;">Expert-Comptable Senior | 41 ans</p>
                <p style="font-size:0.8em; color:#666;">12 Rue de la République, 87000 Limoges | jp.martin@mail.com</p>
            </div>
            
            <div class="pdf-section">
                <h3>EXPÉRIENCES PROFESSIONNELLES</h3>
                <p><strong>2015 - Présent : Cabinet AEC Limousin (Limoges)</strong><br>
                Responsable du pôle audit. Gestion d'un portefeuille de 45 clients.</p>
                <p><strong>2010 - 2015 : Junior Accountant - Aquitaine Finances (Bordeaux)</strong><br>
                Audit légal et contractuel pour des PME régionales.</p>
            </div>

            <div class="pdf-section">
                <h3>FORMATION</h3>
                <p><strong>2008 : Master en Comptabilité, Contrôle, Audit (CCA)</strong><br>
                IAE de Bordeaux - Mention Très Bien.</p>
                <p><strong>2006 : Licence d'Économie-Gestion</strong><br>
                Université de Poitiers.</p>
            </div>

            <div class="pdf-section">
                <h3>COMPÉTENCES & LOGICIELS</h3>
                <p>SAP, Sage 100, Cegid, Microsoft Excel (Expert), Fiscalité française.</p>
            </div>

            <div class="pdf-section">
                <h3>CENTRES D'INTÉRÊT</h3>
                <p>Photographie animalière, Randonnée en haute montagne, Bénévole à la SPA de Limoges.</p>
            </div>
        </div>
    </div>
</div>

<div id="photo-win" class="window" style="top: 200px; left: 700px; width: 320px;">
    <div class="title-bar"><span>Photos - Mistigri_vacances.jpg</span><span class="close" onclick="closeApp('photo-win')">✕</span></div>
    <div style="padding:10px; text-align:center; background:#000;">
        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400" style="max-width:100%; border:1px solid #333;">
        <p style="color:white; font-size:0.8em; margin-top:5px;"><em>"Mistigri n'aime pas le sable !" - Juillet 2023</em></p>
    </div>
</div>

<div id="vault-win" class="window" style="top: 150px; left: 450px; width: 350px; <?= ($step !== 'login') ? 'display:flex;' : '' ?>">
    <div class="title-bar"><span>Gestionnaire de Secrets v2.1</span><span class="close" onclick="closeApp('vault-win')">✕</span></div>
    <div class="vault-container" id="vault-content">
        <?php if ($step === 'login'): ?>
            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" width="60">
            <h3>Fichier Verrouillé</h3>
            <input id="pwd-field" type="password" placeholder="Mot de passe">
            <span style="color : red; background-color : pink; width : 100px; display : none;" id="invalid-pwd">Mot de passe incorrect !!!</span>
            <button id="connection-button" onclick="validatePassword('invalid-pwd', 'pwd-field')">Connexion</button>
            <span class="forgot-link" onclick="showForgot()">Mot de passe oublié ?</span>
        <?php elseif ($step === 'forgot' || $step === 'success'): ?>
            <?php if ($step === 'forgot'): ?>
                <h4 style="color:var(--win-blue)">Réinitialisation du compte</h4>
                <p style="font-size:0.8em;">Répondez aux questions de sécurité pour accéder au coffre.</p>
                <?php if($error) echo "<p style='color:red; font-size:0.8em;'>$error</p>"; ?>
                <form method="POST">
                    <input type="hidden" name="action" autocomplete="off" value="check_questions">
                    <label style="font-size:0.7em; display:block; text-align:left;">Nom de votre premier chat ?</label>
                    <input type="text" name="q1" autocomplete="off" placeholder="Réponse 1" required>
                    <label style="font-size:0.7em; display:block; text-align:left;">Ville de votre diplôme de master ?</label>
                    <input type="text" name="q2" autocomplete="off" placeholder="Réponse 2" required>
                    <label style="font-size:0.7em; display:block; text-align:left;">Année de naissance (4 chiffres) ?</label>
                    <input type="text" name="q3" autocomplete="off" placeholder="Réponse 3" required>
                    <button type="submit">Vérifier l'identité</button>
                </form>
             <?php else: ?>
                <h3 style="color:green;">Accès Accordé</h3>
                <div style="background:#f9f9f9; padding:15px; border:1px dashed #222;">
                    <p style="font-size:0.8em; color:#555;">FLAG :</p>
                    <strong><?= $flag ?></strong>
                </div>
             <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function showForgot() {
        const content = document.getElementById('vault-content');
        content.innerHTML = `
            <h4 style="color:var(--win-blue)">Réinitialisation du compte</h4>
            <p style="font-size:0.8em;">Répondez aux questions de sécurité pour accéder au coffre.</p>
            <form method="POST">
                <input type="hidden" name="action" value="check_questions">
                <label style="font-size:0.7em; display:block; text-align:left;">Nom de votre premier chat ?</label>
                <input type="text" name="q1" placeholder="Réponse 1" required>
                <label style="font-size:0.7em; display:block; text-align:left;">Ville de votre diplôme ?</label>
                <input type="text" name="q2" placeholder="Réponse 2" required>
                <label style="font-size:0.7em; display:block; text-align:left;">Année de naissance (4 chiffres) ?</label>
                <input type="text" name="q3" placeholder="Réponse 3" required>
                <button type="submit">Vérifier l'identité</button>
            </form>
        `;
    }

    function openApp(id) { 
        const win = document.getElementById(id);
        win.style.display = 'flex';
        bringToFront(win);
    }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }

    let highestZ = 10;
    function bringToFront(win) { win.style.zIndex = ++highestZ; }

    document.querySelectorAll('.window').forEach(win => {
        const titleBar = win.querySelector('.title-bar');
        let isDragging = false, startX, startY, initialLeft, initialTop;

        titleBar.addEventListener('mousedown', (e) => {
            if (e.target.classList.contains('close')) return;
            isDragging = true;
            bringToFront(win);
            startX = e.clientX; startY = e.clientY;
            initialLeft = win.offsetLeft; initialTop = win.offsetTop;
            
            document.onmousemove = (e) => {
                if (!isDragging) return;
                win.style.left = (initialLeft + (e.clientX - startX)) + 'px';
                win.style.top = (initialTop + (e.clientY - startY)) + 'px';
            };
            document.onmouseup = () => { isDragging = false; document.onmousemove = null; };
        });
        win.addEventListener('mousedown', () => bringToFront(win));
    });

    function validatePassword(id, field_id) { 
        document.getElementById(id).style.display = '';
        document.getElementById(field_id).style.border = '2px solid red'; 
        }
</script>

</body>
</html>