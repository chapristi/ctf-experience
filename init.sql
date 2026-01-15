DROP DATABASE IF EXISTS my_database;
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    score int default 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS challenges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    picture TEXT,
    points INT DEFAULT 0,
    flag VARCHAR(255) NOT NULL,
    category VARCHAR(50),
    slug VARCHAR(100) NOT NULL,
    hint TEXT,
    is_active BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS solves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    challenge_id INT NOT NULL,
    solved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (challenge_id) REFERENCES challenges(id) ON DELETE CASCADE,
    UNIQUE KEY unique_solve (user_id, challenge_id)
) ENGINE=InnoDB;

INSERT INTO users (nickname) VALUES 
('Neo'),
('Trinity'),
('Cypher');

INSERT INTO challenges (title, description, points, flag, category, picture, hint, slug) VALUES
('Click Frenzy', 'Atteignez 100 000 clics pour forcer l''accès. Une manipulation directe de l''URL est plus rapide que l''endurance.', 100, 'CTF{U4L_M4N1PUL4T10N_15_K3Y}', 'Web', 'https://c.tenor.com/HrfmNIl6TxIAAAAd/tenor.gif', 'Regardez bien les paramètres GET dans la barre d''adresse du navigateur.', '/click-frenzy'),

('Keep you life private', 'Un agent a laissé un rapport sécurisé. Reconstituez le mot de passe en utilisant les indices du post-it (Osint).', 150, 'CTF{051NT_M45T3R_D0C}', 'Osint', 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExaWQ1N2tnamdkemRpamdpdHB3aTFkMDdiYXRoY2xtdDU0aGNkZmpudyZlcD12MV9naWZzX3NlYXJjaCZjdD1n/9rRacglGbs68E/giphy.gif', 'L''ordre classique est Nom + Année + Symbole.', '/keep-your-life-private'),

('Not a secure login', 'Le système de vérification des identifiants est exposé. Fouillez le code source JavaScript pour trouver la clé.', 300, 'CTF{J4V45CR1P7_15_PU8L1C}', 'Web', 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExc3dlejN2Z3d5Z2dnZjJkNzduYzNudnBrbHhsNnpobXNsYmhwemdwdSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/11fot0YzpQMA0g/giphy.gif', 'Faites un clic droit sur la page et sélectionnez "Inspecter" puis allez dans l''onglet "Sources" ou "Debugger".', '/not-secure-login'),

(
    'System Override', 
    'Un administrateur négligent a laissé traîner ses identifiants. Connectez-vous au système pour récupérer le fichier secret sur le bureau.', 
    75, 
    'CTF{H7ML_C0MM3N7S_R_N0T_S3CUR3}', 
    'Web', 
    'https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExam1xcGltOGE0c2V0ZHljNmxjbTRpNGFtYjJseDV0NTV4dGZ0a3U0OSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/pUVOeIagS1rrqsYQJe/giphy.gif', 
    "L\'interface graphique n\'est qu\'une façade. Regardez ce qui la compose (CTRL+U ou F12).", 
    "/hidden_in_plain_sight"
),

(
    "L'Oubli de Marie", 
    'Marie utilise souvent des informations personnelles pour ses mots de passe. Fouillez son profil pour ouvrir son coffre-fort numérique.', 
    125, 
    'CTF{0S1NT_D0G_M4M4_1992}', 
    'Osint', 
    'https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExbTFqbmtlcDNuZnh0ZXYyZm93Y3MwcTllaDMyYjhha3R5OWd1cjI0NCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2FaznsStYLpCNFhwQ/giphy.gif', 
    "Calculez son année de naissance en observant ses publications et n'oubliez pas le nom de son compagnon à quatre pattes.", 
    '/marie-osint'
);

INSERT INTO solves (user_id, challenge_id) VALUES 
(1, 1),
(1, 2), 
(2, 1);
