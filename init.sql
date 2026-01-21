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

INSERT INTO users (nickname, score) VALUES 
('azle1xv', 724),
('chapristi', 555);

INSERT INTO challenges (title, description, points, flag, category, picture, hint, slug) VALUES
(
    'Clic, clic, re-clic !', 
    'Atteignez 100 000 clics. Mieux vaut réfléchir que agir.', 
    100, 
    'CTF{U4L_M4N1PUL4T10N_15_K3Y}', 
    'Web', 
    'https://c.tenor.com/HrfmNIl6TxIAAAAd/tenor.gif', 
    'Votre navigation sur une page web ne se fait pas seulement par l’interface.',
    '/challenge/click-frenzy?clicks=0'),

(
    'Garde ta vie privée',
    'Un agent a laissé un rapport sécurisé. Reconstituez le mot de passe en utilisant les indices du post-it (Osint).', 
    50, 
    'CTF{051NT_M45T3R_D0C}', 
    'OSINT', 
    'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdno4MzV1Z2V6anFyYzR0MjFyaHBrdjd4ZmY5OGFwdmZpM2F3M2k3NiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/NdKVEei95yvIY/giphy.gif', 
    'Essayez de concaténer les informations que vous avez.',
    '/challenge/keep-your-life-private'
),

(
    'Le stagiaire gére, apparemment',
    'Le système de vérification des identifiants a était codé par l''IA...',
    150, 'CTF{J4V45CR1P7_15_PU8L1C}', 
    'Web', 
    'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExc3dlejN2Z3d5Z2dnZjJkNzduYzNudnBrbHhsNnpobXNsYmhwemdwdSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/11fot0YzpQMA0g/giphy.gif', 
    'Le code source d’une page web est en partie disponible.',
    '/challenge/not-secure-login'
),
(
    'Commenter? Oui, mais pas trop', 
    'Un administrateur négligent a laissé traîner ses identifiants. Connectez-vous au système pour récupérer le fichier secret sur le bureau.', 
    100, 
    'CTF{H7ML_C0MM3N7S_R_N0T_S3CUR3}', 
    'Web', 
    'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOWtoeDF0NmM1NTl6ZnJwaDF5eDRrb3Z1OGIzeHpyZXAwamg5aXA1OSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/Ws6T5PN7wHv3cY8xy8/giphy.gif', 
    "L\'interface graphique n\'est qu\'une façade. Regardez ce qui la compose.", 
    "/challenge/hidden_in_plain_sight"
),

(
    "L'Oubli de Marie", 
    'Marie utilise souvent des informations personnelles pour ses mots de passe. Fouillez son profil pour ouvrir son coffre-fort numérique.', 
    100, 
    'CTF{0S1NT_D0G_M4M4_1993}',
    'OSINT', 
    'https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExbTFqbmtlcDNuZnh0ZXYyZm93Y3MwcTllaDMyYjhha3R5OWd1cjI0NCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2FaznsStYLpCNFhwQ/giphy.gif', 
    "Calculez son année de naissance en observant ses publications et n'oubliez pas le nom de son compagnon à quatre pattes.", 
    '/challenge/marie-osint'
),
(
    'Interception Radio', 
    'Nos systèmes ont capté une transmission ennemie chifrée. Utilisez vos compétences de décodage pour extraire les ordres du commandant.', 
    250,
    'CTF{B453_64_M1L1T4RY_C4LL}', 
    'Cryptographie',
    'https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExY2l1ZmFrd2xhaWhhdHB0MjB4ZTZ3OWoyMnJvM2hoajBmZTA0NmJhbyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/bmcynfPM96sC4KOKI3/giphy.gif', 
    'Cette chaîne ressemble à un système d’encodage dont le padding est le caractère =.',
    '/challenge/interception_radio'
),
(
    "Le Chiffre de l\'Empereur", 
    'Nous avons retrouvé une vieille note de la Seconde Guerre Mondiale. Elle semble utiliser un système de décalage inventé par Jules César lui-même.', 
    150, 
    'CTF{C43S4R_W1TH_TH3_M1L1T4RY}', 
    'Cryptographie',
    'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExbXlibHpndTFlOGl0bmZubjF1ZjRxMnF6ZG80YnN4aDIxNnJkaW5tdCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/16AmBIzIdoWdgqqb4m/giphy.gif', 
    'Si A = D et B = E, alors quelle lettre donne C ?',
    '/challenge/caesar-military'
),
(
    'Tout est au point',
    'Une image a été interceptée. Elle semble cacher la ville dans laquelle se déroulera la prochaine mission.\n Format du  flag : CTF{VILLE}',
    150,
    'CTF{LIMOGES}',
    'Steganographie',
    'https://images-ext-1.discordapp.net/external/6GFN1LygOFAeJV5jRX5RLNHZFrhVtf2PcYdRi3f4ckQ/https/media.giphy.com/media/v1.Y2lkPTc5MGI3NjExamxsNnZ6OG5oMnM3aGpkM3prbHpsN3U5YWdrcXdyNmxud24zZXJjNiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/kd9BlRovbPOykLBMqX/giphy.gif',
    'Faites attention à ce qu''il y a aux alentours des points suspects.',
    '/challenge/tout-est-au-point'
),
(
    "Traces dans l\'Ombre", 
    "Le serveur central a été bombardé de requêtes. Une seule a réussi à franchir nos défenses. Analysez les journaux d\'accès pour trouver la trace de l\'intrus.", 
    150, 
    'CTF{L0G_M45T3R_D3T3CT3D}', 
    'Forensique',
    'https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZTQ3YjNpYTR6eWl5YjB4MTB3ZWdhbXpvMWZyaW9zdzNzejF2em96ciZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2WGDUTmsB4DzFuvZ2t/giphy.gif', 
    'Une ligne ne semble pas retourner le même code que les autres ; trouvez laquelle.',
    '/challenge/military-logs'
),
(
    'Le Maillon Faible', 
    'Jean-Pierre a sécurisé son coffre avec des questions personnelles. Fouillez son bureau pour usurper son identité et réinitialiser son accès.', 
    150, 
    'CTF{S3CUR1TY_QU3ST1ONS_4R3_W34K}', 
    'OSINT', 
    "https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGpibjJrcnZkejVkanJydG4ydWh0cW5mb2g2aXl1d2t0anY0dmJnciZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/eImrJKnOmuBDmqXNUj/giphy.gif", 
    "Tout ne se passe pas toujours sur la page de connexion",
    '/challenge/security-bypass'),
("L\'Infiltrée du Pays",
    "Sophie a disparu après sa mission au Mozambique. Sa seule trace est une photo prise depuis la voiture dans la quelle elle était. Identifiez sa position exacte pour débloquer le message. Pour ce challenge la recherche internet est autorisée",
    200, 
    'CTF{M4PU70_S7R33T5_2025_OS1NT}', 
    'OSINT', 
    'https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGsxNHU1aGc5bGlpNWZyNm9na2Zobm10ZDN5bWdqOTNpcTM3a2lzNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3oxHQHzFo3g5oYAZhe/giphy.gif', 
    "Vous pouvez rechercher des images disponibles sur Internet qui montrent des lieux similaires.",
    '/challenge/geo-pivoting'
);