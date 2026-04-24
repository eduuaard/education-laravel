-- =========================
-- RESET DAS VIEWS
-- =========================
DROP VIEW IF EXISTS mediageral;
DROP VIEW IF EXISTS mediaaluno;
DROP VIEW IF EXISTS totpergunta;
DROP VIEW IF EXISTS numaluno;
DROP VIEW IF EXISTS numunidade;

-- =========================
-- TOTAL DE UNIDADES
-- =========================
CREATE VIEW numunidade AS
SELECT COUNT(*) AS numuni
FROM unidade_ensinos;

-- =========================
-- TOTAL DE ALUNOS
-- =========================
CREATE VIEW numaluno AS
SELECT COUNT(*) AS numalu
FROM users
WHERE nivel != 0;

-- =========================
-- TOTAL DE PERGUNTAS + PONTOS
-- =========================
CREATE VIEW totpergunta AS
SELECT 
    COUNT(*) AS qtdper,
    SUM(peso) AS totpon_per
FROM perguntas;

-- =========================
-- PONTUAÇÃO POR ALUNO
-- =========================
CREATE VIEW mediaaluno AS
SELECT 
    r.user_id,
    SUM(p.peso) AS totpon,
    SUM(p.peso) AS totpon_per
FROM respostas r
INNER JOIN perguntas p ON p.id = r.pergunta_id
WHERE r.selecionada = 1
GROUP BY r.user_id;

-- =========================
-- MÉDIA GERAL
-- =========================
CREATE VIEW mediageral AS
SELECT 
    AVG(totpon_per) AS totpon,
    AVG(totpon_per) AS totpon_per
FROM mediaaluno;

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

mysql -u root -p education-master < database/setup.sql
