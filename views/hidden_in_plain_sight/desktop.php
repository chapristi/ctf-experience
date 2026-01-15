<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bureau - Administrateur</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop'); /* Tech background */
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            overflow: hidden;
        }

        /* The Simulated Notepad Window */
        .notepad-window {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 400px;
            background: #f0f0f0;
            border: 1px solid #0078d4;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
        }

        /* Title Bar */
        .title-bar {
            background: white;
            padding: 5px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            font-size: 14px;
        }
        .title-bar-text img { height: 16px; vertical-align: middle; margin-right: 5px; }
        .window-controls span {
            display: inline-block;
            padding: 5px 10px;
            cursor: pointer;
        }
        .close-btn:hover { background: #e81123; color: white; }

        /* Menu Bar (Fake) */
        .menu-bar {
            background: #f9f9f9;
            padding: 5px;
            font-size: 12px;
            border-bottom: 1px solid #e5e5e5;
        }
        .menu-bar span { margin-right: 15px; cursor: default; }

        /* Content Area */
        .notepad-content {
            flex-grow: 1;
            padding: 5px;
            background: white;
            overflow: auto;
        }
        textarea {
            width: 100%;
            height: 100%;
            border: none;
            resize: none;
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 16px;
            outline: none;
        }

        /* Fake Taskbar */
        .taskbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            padding-left: 10px;
        }
        .start-btn {
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="notepad-window">
        <div class="title-bar">
            <div class="title-bar-text">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Notepad_icon.svg/768px-Notepad_icon.svg.png" alt="icon">
                secret_flag.txt - Notepad
            </div>
            <div class="window-controls">
                <span>_</span><span>□</span><span class="close-btn">✕</span>
            </div>
        </div>
        <div class="menu-bar">
            <span>Fichier</span><span>Edition</span><span>Format</span><span>Affichage</span><span>Aide</span>
        </div>
        <div class="notepad-content">
            <textarea readonly>
--- DÉBUT DU FICHIER ---

Félicitations agent. Vous avez réussi à contourner l'écran de connexion en inspectant les éléments sources.

Voici votre flag de validation :

CTF{H7ML_C0MM3N7S_R_N0T_S3CUR3}

--- FIN DU FICHIER ---
            </textarea>
        </div>
    </div>

    <div class="taskbar">
        <div class="start-btn">DÉMARRER</div>
    </div>

</body>
</html>