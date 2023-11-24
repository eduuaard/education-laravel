## Laravel Education

Desenvolvi um sistema de educação para um Engenheiro e Professor da Universidade Federal de Alagoas (UFAL). O intuito do sistema é ter alunos cadastrados e que eles possam responder perguntas dentro do sistema calculando a sua pontuação.

## Quais funcionalidades?

O sistema conta com CRUD completo de usuário/aluno, unidade de ensino, perguntas e respostas.
Cada usuário tem um nível, 0 ou 1. 0 é o ADM que tem acesso a todos os CRUD e dados dos alunos e 1 é o aluno que só tem acesso as perguntas para responder e o dashboard com a sua média de pontuação das perguntas.

Já para o administrador consegue ver os dados geral dos alunos pelo o dashboard.

# Clonar o repositório
git clone https://github.com/eduuaard/laravel-education.git

# Instalar as dependências
composer update
crie .env e conecte com seu banco de dados
php artisan migrate
php db:seed




