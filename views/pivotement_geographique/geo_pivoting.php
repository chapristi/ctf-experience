<?php
$step = "login"; 
$error = "";
$flag = "CTF{M4PU70_S7R33T5_2025_OS1NT}";
$target_image = "/assets/images/samora.jpg";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'check_questions') {
        $q1 = strtolower(trim($_POST['q1']));
        $q2 = strtolower(trim($_POST['q2']));
        $q3 = trim($_POST['q3']);

        // Réponses attendues : Maputo, Place de L'independence, Samora Machel
        if (strpos(strtolower($q1), 'maputo') !== false && strpos(strtolower($q2), "place de l'independance") !== false && strtolower($q3) === 'samora machel') {
            $step = "success";
        } else {
            $step = "login";
            $error = "Vérification échouée. Les données géographiques ne correspondent pas.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Poste de Sophie - Investigation</title>
    <style>
        :root { --win-red: #a82020; --bg-dark: #1e1e1e; }
        body {
            margin: 0; height: 100vh;
            background: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1600') center/cover;
            font-family: 'Segoe UI', sans-serif; overflow: hidden;
        }

        .desktop { padding: 20px; display: grid; grid-template-columns: repeat(1, 100px); gap: 20px; }
        .icon { width: 90px; text-align: center; color: white; cursor: pointer; text-shadow: 1px 1px 2px black; font-size: 0.8em; }
        .icon img { width: 45px; display: block; margin: 0 auto 5px; }

        .window {
            position: absolute; background: #f0f0f0; border: 1px solid #444;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6); display: none; flex-direction: column; z-index: 10;
        }
        .title-bar { 
            background: #333; color: white; padding: 6px 12px; font-size: 0.85em;
            display: flex; justify-content: space-between; cursor: move; user-select: none;
        }
        .close { cursor: pointer; color: #bbb; }
        .close:hover { color: white; }

        /* Contenu PDF Réaliste */
        .pdf-body { background: #525659; padding: 20px; height: 450px; overflow-y: auto; }
        .pdf-page { background: white; padding: 40px; color: #222; box-shadow: 0 0 10px black; line-height: 1.6; }

        /* Vault */
        .vault-ui { padding: 20px; text-align: center; color: #333; }
        input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; box-sizing: border-box; }
        button { background: var(--win-red); color: white; border: none; padding: 10px; cursor: pointer; width: 100%; font-weight: bold; }
        .forgot-link { font-size: 0.75em; color: var(--win-red); cursor: pointer; display: block; margin-top: 10px; text-decoration: underline; }
    </style>
</head>
<body>

<div class="desktop">
    <div class="icon" onclick="openApp('note-win')">
        <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF">
        Rapport.pdf
    </div>
    <div class="icon" onclick="openApp('photo-win')">
        <img src="https://cdn-icons-png.flaticon.com/512/337/337948.png" alt="IMG">
        Vue_voiture.jpg
    </div>
    <div class="icon" onclick="openApp('vault-win')">
        <img src="https://cdn-icons-png.flaticon.com/512/2589/2589174.png" alt="Vault">
        Archives_Sophie.exe
    </div>
</div>

<div id="note-win" class="window" style="top: 40px; left: 100px; width: 550px;">
    <div class="title-bar"><span>Adobe Reader - Rapport.pdf</span><span class="close" onclick="closeApp('note-win')">✕</span></div>
    <div class="pdf-body">
        <div class="pdf-page">
            <h2 style="color:var(--win-red)">Notes d'Investigation - Mai 2025</h2>
            <p><strong>Sujet :</strong> Surveillance zone Sommerschield.</p>
            <p>Je m'approche de plus en plus de faire contacte avec l'objectif. Finallement, je pourai lui rencontrer demain a 10:00. Ça sera aparemment au centre de la capital.</p>
            <p>Je donnerai plus de mises à jour a la meme heure demain.</p>
            <p><em>Rappel personnel :</em> Pour déchifrer les parties critiques du message, faut mettre les infos de l'endroit</p>
            <hr>
            <p style="font-size:0.8em; color:#666;">Note : Ne pas oublier de rendre la carte magnétique de la chambre 2402 avant de partir vers Paris.</p>
        </div>
    </div>
</div>

<div id="photo-win" class="window" style="top: 150px; left: 650px; width: 400px;">
    <div class="title-bar"><span>Visionneuse - Vue_Chambre.jpg</span><span class="close" onclick="closeApp('photo-win')">✕</span></div>
    <div style="background:#000; padding:10px; text-align:center;">
        <img src="<?= $target_image ?>" style="max-width:100%; border:1px solid #333;">
        <p style="color:#aaa; font-size:0.7em;"><em>Photo prise le 14/05/2025 à 09:42</em></p>
    </div>
</div>

<div id="vault-win" class="window" style="top: 100px; left: 450px; width: 350px; <?= ($step !== 'login') ? 'display:flex;' : '' ?>">
    <div class="title-bar"><span>Coffre Fort - Protection Identité</span><span class="close" onclick="closeApp('vault-win')">✕</span></div>
    <div class="vault-ui" id="vault-content">
        <?php if ($step === 'login'): ?>
            <h4 style="color:var(--win-red)">Où se trouve l'agente Sophie</h4>
            <?php if($error) echo "<p style='color:red; font-size:0.7em;'>$error</p>"; ?>
            <form method="POST">
                <input type="hidden" name="action" value="check_questions" autocomplete="off">
                <label style="font-size:0.7em; display:block; text-align:left;" autocomplete="off">Derniére ville où elle était ?</label>
                <input type="text" name="q1" placeholder="Ex: Limoges" autocomplete="off" required>
                <label style="font-size:0.7em; display:block; text-align:left;" autocomplete="off">Nom du monument ?</label>
                <input type="text" name="q2" placeholder="Nom du monument en français" autocomplete="off" required>
                <label style="font-size:0.7em; display:block; text-align:left;" autocomplete="off">Nom de la personne dans le monument ?</label>
                <input type="text" name="q3" placeholder="Ex: Louis Gerbeaud" autocomplete="off" required>
                <button type="submit">Valider les informations</button>
            </form>
        <?php elseif ($step === 'success'): ?>
            <h3 style="color:green;">Informations bien validées</h3>
            <div style="background:#eee; padding:15px; border:1px dashed #333;">
                <p style="font-size:0.8em;">Message de Sophie :</p>
                <strong><?= $flag ?></strong>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function showForgot() {
        const content = document.getElementById('vault-content');
        content.innerHTML = `
            <h4 style="color:var(--win-red)">Récupération de Clé</h4>
            <form method="POST">
                <input type="hidden" name="action" value="check_questions">
                <label style="font-size:0.7em; display:block; text-align:left;">Ville de mon dernier séjour ?</label>
                <input type="text" name="q1" placeholder="Indice : Photo" required>
                <label style="font-size:0.7em; display:block; text-align:left;">Nom de l'hôtel (vue panoramique) ?</label>
                <input type="text" name="q2" placeholder="Recherche géo indispensable" required>
                <label style="font-size:0.7em; display:block; text-align:left;">Année d'inauguration de la tour visible ?</label>
                <input type="text" name="q3" placeholder="Date historique" required>
                <button type="submit">Réinitialiser l'accès</button>
            </form>
        `;
    }

    let highestZ = 10;
    function openApp(id) { const win = document.getElementById(id); win.style.display = 'flex'; bringToFront(win); }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }
    function bringToFront(win) { win.style.zIndex = ++highestZ; }

    document.querySelectorAll('.window').forEach(win => {
        const titleBar = win.querySelector('.title-bar');
        let isDragging = false, startX, startY, initialLeft, initialTop;

        titleBar.addEventListener('mousedown', (e) => {
            if (e.target.classList.contains('close')) return;
            isDragging = true; bringToFront(win);
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
</script>

</body>
</html>