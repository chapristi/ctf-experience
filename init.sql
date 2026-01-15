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
    hint TEXT NOT NULL,
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

INSERT INTO challenges (title, description, points, flag, category, picture, slug) VALUES 
('Porta Aberta', 'Encontra a flag no código fonte da página.', 100, 'CTF{view_source_is_key}', 'Web', 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcDZwcXg2eXN4Yzd2NHlrYno1OTZpODNvYTZvMHdteHN3NHN4b2ZjOSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/A1oBMukTqFfkoY1HiH/giphy.gif', '/challenges'),
('Cifra de César', 'Descodifica: PHQVDJHP', 150, 'CTF{mensagem_secreta}', 'Crypto', 'https://media1.tenor.com/m/0P2I-Z4sFB0AAAAC/key-magic-key.gif', '/challenges'),
('Binary Search', 'Explora o buffer overflow.', 300, 'CTF{pwn_the_stack}', 'Pwn', 'https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExMW5tcTdxYnZjOXkyOWZ6emQ3OTE1aW50Y3R6ZnJvdWR3dTR3bXg1cCZlcD12MV9naWZzX3NlYXJjaCZjdD1n/gq8bvfkh2EIZAnntsc/giphy.gif', '/challenges');

INSERT INTO solves (user_id, challenge_id) VALUES 
(1, 1),
(1, 2), 
(2, 1);