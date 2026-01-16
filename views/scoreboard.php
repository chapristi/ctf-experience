<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <title>Scoreboard - CTF</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .scoreboard-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #e6edf3;
            font-family: 'Consolas', monospace;
        }

        th {
            text-align: left;
            border-bottom: 2px solid #30363d;
            padding: 15px;
            color: #8b949e;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #21262d;
        }

        tr:hover {
            background-color: rgba(57, 255, 20, 0.02);
        }

        .rank-badge {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            font-weight: bold;
            background: #30363d;
            color: #e6edf3;
        }

        /* Style spécial pour le top 3 */
        tr:nth-child(1) .rank-badge { background: #ffd700; color: #000; } /* Or */
        tr:nth-child(2) .rank-badge { background: #c0c0c0; color: #000; } /* Argent */
        tr:nth-child(3) .rank-badge { background: #cd7f32; color: #000; } /* Bronze */

        .pseudo {
            font-weight: bold;
            color: #39ff14;
        }

        .points-total {
            color: #39ff14;
            font-weight: bold;

        }
        .challenges-resolved{
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #8b949e;
            text-decoration: none;
        }
        .back-link:hover { color: #39ff14; }
    </style>
</head>
<body>

<div class="scoreboard-container">
    <a href="/challenges" class="back-link"> < Retour au terminal </a>

    <header style="text-align: center; margin-bottom: 30px;">
        <h1 style="color: #39ff14; margin: 0;">CLASSEMENT GÉNÉRAL</h1>
        <p style="color: #8b949e;">Les meilleurs agents de l'opération</p>
    </header>

    <table>
        <thead>
        <tr>
            <th>Rang</th>
            <th>Agent</th>
            <th>Défis Résolus</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody id="scoreboard-body">
            <?php $rank = 1; ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><span class="rank-badge"><?= $rank ?></span></td>
                    
                    <td><span class="pseudo"><?= htmlspecialchars($user['nickname']) ?></span></td>
                    
                    <td class="challenges-resolved">
                        <?= $user['solve_count'] ?? 'N/A' ?>
                    </td>
                    
                    <td class="points-total"><?= $user['score'] ?> PTS</td>
                </tr>
                <?php $rank++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
<script>
    function refreshScoreboard() {
        fetch(window.location.href)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#scoreboard-body').innerHTML;

                document.querySelector('#scoreboard-body').innerHTML = newContent;
                console.log("Scoreboard actualisé !");
            })
            .catch(err => console.error("Erreur de mise à jour :", err));
    }
    setInterval(refreshScoreboard, 5000);
</script>
</html>