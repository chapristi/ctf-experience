<?php
$flag_revealed = false;
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vault_pass'])) {
    if ($_POST['vault_pass'] === 'Fidji1993') {
        $flag_revealed = true;
    } else {
        $error = "Accès Refusé : Mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bureau de Marie - Session Active</title>
    <style>
        :root { --fb-blue: #1877F2; --win-blue: #0078d4; }
        body {
            margin: 0; height: 100vh;
            background: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2070') center/cover;
            font-family: 'Segoe UI', sans-serif; overflow: hidden;
        }

        /* Icons */
        .desktop-icons { padding: 20px; display: flex; flex-direction: column; gap: 20px; position: relative; z-index: 5; }
        .icon { 
            width: 70px; text-align: center; color: white; cursor: pointer;
            text-shadow: 1px 1px 3px black; font-size: 0.8em;
        }
        .icon img { width: 50px; display: block; margin: 0 auto 5px; }

        /* Windows */
        .window {
            position: absolute; background: white; border: 1px solid #999;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: none;
            flex-direction: column; z-index: 10;
        }
        .title-bar { 
            background: #eee; padding: 8px 10px; display: flex; 
            justify-content: space-between; font-size: 0.8em; cursor: move;
            user-select: none; border-bottom: 1px solid #ddd;
        }
        .close { cursor: pointer; color: red; font-weight: bold; padding: 0 5px; }

        /* Fake Facebook App */
        #fb-app { top: 50px; left: 100px; width: 900px; height: 600px; }
        .fb-wrapper { background: #f0f2f5; height: 100%; overflow-y: auto; color: #1c1e21; }

        /* Layout FB */
        .fb-header-container { background: white; border-bottom: 1px solid #ddd; }
        .fb-cover { height: 180px; background-size: cover; background-position: center; }
        .fb-profile-strip { display: flex; padding: 0 30px; transform: translateY(-30px); align-items: flex-end; }
        .fb-profile-pic { width: 130px; height: 130px; border-radius: 50%; border: 4px solid white; background-size: cover; }
        .fb-name-box { margin-left: 20px; padding-bottom: 10px; }
        .fb-name-box h1 { margin: 0; font-size: 1.8em; }
        .fb-nav-mock { display: flex; gap: 20px; padding: 10px 30px; border-top: 1px solid #eee; font-weight: 600; color: #65676b; font-size: 0.9em; }

        .fb-body { display: grid; grid-template-columns: 300px 1fr; gap: 15px; padding: 15px; }
        .fb-card { background: white; border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
        .fb-intro-list { list-style: none; padding: 0; margin: 10px 0; font-size: 0.9em; }
        .fb-intro-list li { margin-bottom: 8px; }
        .fb-photo-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 5px; }
        .fb-photo-grid img { width: 100%; height: 70px; object-fit: cover; border-radius: 4px; }

        /* Posts */
        .post-header { display: flex; gap: 10px; margin-bottom: 10px; align-items: center; }
        .mini-avatar { width: 40px; height: 40px; border-radius: 50%; }
        .post-img { width: calc(100% + 30px); margin-left: -15px; margin-top: 10px; display: block; }
        .post-actions { border-top: 1px solid #eee; margin-top: 10px; padding-top: 10px; color: #65676b; font-size: 0.8em; }

        /* Vault App */
        #vault-app { top: 150px; left: 450px; width: 320px; padding-bottom: 20px; border: 1px solid var(--win-blue); }
        .vault-ui { text-align: center; color: black; padding: 20px; }
        .vault-ui input { width: 80%; padding: 8px; margin: 10px 0; border: 1px solid #ccc; }
        .vault-ui button { background: var(--win-blue); color: white; border: none; padding: 8px 15px; cursor: pointer; }
    </style>
</head>
<body>

<div class="desktop-icons">
    <div class="icon" onclick="openApp('fb-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="FB">
        FriendBook
    </div>
    <div class="icon" onclick="openApp('vault-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" alt="Vault">
        Coffre_Fort.exe
    </div>
</div>

<div id="fb-app" class="window">
    <div class="title-bar">
        <span>Friend Book - Profil de Marie</span>
        <span class="close" onclick="closeApp('fb-app')">✕</span>
    </div>

    <div class="fb-wrapper">
        <div class="fb-header-container">
            <div class="fb-cover" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800');"></div>
            <div class="fb-profile-strip">
                <div class="fb-profile-pic" style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200');"></div>
                <div class="fb-name-box">
                    <h1>Marie Laurent</h1>
                    <p>842 amis • 12 en commun</p>
                </div>
            </div>
            <div class="fb-nav-mock">
                <span>Publications</span> <span>À propos</span> <span>Amis</span> <span>Photos</span>
            </div>
        </div>

        <div class="fb-body">
            <div class="fb-left-col">
                <div class="fb-card">
                    <h3>Intro</h3>
                    <ul class="fb-intro-list">
                        <li>📍 Habite à <strong>Limoges</strong></li>
                        <li>🐶 Mère de <strong>chien</strong></li>
                        <li>🎓 A étudié à <strong>IUT du Limousin</strong></li>
                    </ul>
                </div>
                <div class="fb-card">
                    <h3>Photos</h3>
                    <div class="fb-photo-grid">
                        <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=150" alt="Dog">
                        <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?w=150" alt="Party">
                        <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=150" alt="Lake">
                    </div>
                </div>
            </div>

            <div class="fb-timeline">
                <div class="fb-card post">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50" class="mini-avatar">
                        <div><strong>Marie Laurent</strong><br><small>15 mai 2023 • 🌎</small></div>
                    </div>
                    <div class="post-text">
                        Petite balade matinale au bord du lac. Mon cher Fidji est infatigable ! 🐾 #GoldenRetriever #Bonheur
                    </div>
                    <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=600" class="post-img">
                    <div class="post-actions">👍 124 J'aime • 12 Commentaires</div>
                </div>

                <div class="fb-card post">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50" class="mini-avatar">
                        <div><strong>Marie Laurent</strong><br><small>21 Fevrier 2023 • 🌎</small></div>
                    </div>
                    <div class="post-text">
                        Il faut profiter des petits moments dans la vie. Les sourires, les promenades, les rigolades, la beauté de ce qui nous entoure 🎂🥂
                    </div>
                    <img src="https://images.unsplash.com/photo-1530103043960-ef38714abb15?q=80&w=1000&auto=format&fit=cro" class="post-img">
                    <div class="post-actions">❤️ 91 J'aime • 17 Commentaires</div>
                </div>

                <div class="fb-card post">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50" class="mini-avatar">
                        <div><strong>Marie Laurent</strong><br><small>10 janvier 2023 • 🌎</small></div>
                    </div>
                    <div class="post-text">
                        Un immense merci pour tous vos messages ! Je n'arrive pas à croire que j'ai déjà 30 ans aujourd'hui... La vie commence maintenant ! 🎂🥂
                    </div>
                    <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?w=600" class="post-img">
                    <div class="post-actions">❤️ 256 J'aime • 48 Commentaires</div>
                </div>

                <div class="fb-card post">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50" class="mini-avatar">
                        <div><strong>Marie Laurent</strong><br><small>28 décembre 2022 • 🌎</small></div>
                    </div>
                    <div class="post-text">
                        Vivre la vie dans son max, c'est ce que j'avais promis a moi même dans mes vingt ans, je ne veux faire plaisir à personne, juste rendre heureuse ma version plus jeune. ❤️
                    </div>
                    <img src="https://images.unsplash.com/photo-1516939884455-1445c8652f83?q=80&w=1000&auto=format&fit=crop" class="post-img">
                    <div class="post-actions">❤️ 153 J'aime • 74 Commentaires</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="vault-app" class="window" style="<?= ($flag_revealed || $error) ? 'display:flex;' : '' ?>">
    <div class="title-bar"><span>SÉCURITÉ SYSTÈME</span><span class="close" onclick="closeApp('vault-app')">✕</span></div>
    <div class="vault-ui">
        <?php if ($flag_revealed): ?>
            <h3 style="color: green;">Coffre Ouvert</h3>
            <p><strong>CTF{0S1NT_D0G_M4M4_1993}</strong></p>
        <?php else: ?>
            <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" width="50">
            <form method="POST">
                <input type="password" name="vault_pass" placeholder="Mot de passe">
                <button type="submit">DÉVERROUILLER</button>
            </form>
            <?php if($error) echo "<p style='color:red; font-size:0.7em;'>$error</p>"; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function openApp(id) { 
        const win = document.getElementById(id);
        win.style.display = 'flex'; 
        bringToFront(win);
    }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }

    let highestZ = 10;
    function bringToFront(win) {
        highestZ++;
        win.style.zIndex = highestZ;
    }
    
    document.querySelectorAll('.window').forEach(win => {
        const titleBar = win.querySelector('.title-bar');
        let isDragging = false;
        let startX, startY, initialLeft, initialTop;

        titleBar.addEventListener('mousedown', (e) => {
            if (e.target.classList.contains('close')) return;
            
            isDragging = true;
            bringToFront(win);
            
            startX = e.clientX;
            startY = e.clientY;
            initialLeft = win.offsetLeft;
            initialTop = win.offsetTop;
            
            document.addEventListener('mousemove', drag);
            document.addEventListener('mouseup', stopDrag);
        });

        function drag(e) {
            if (!isDragging) return;
            const dx = e.clientX - startX;
            const dy = e.clientY - startY;
            win.style.left = (initialLeft + dx) + 'px';
            win.style.top = (initialTop + dy) + 'px';
        }

        function stopDrag() {
            isDragging = false;
            document.removeEventListener('mousemove', drag);
            document.removeEventListener('mouseup', stopDrag);
        }

        win.addEventListener('mousedown', () => bringToFront(win));
    });
</script>

</body>
</html>