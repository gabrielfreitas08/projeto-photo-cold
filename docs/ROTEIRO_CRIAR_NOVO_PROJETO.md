# Instalando projeto laravel com voyager
## 1. criar projeto Laravel
composer create-project laravel/laravel sct
### mudar diretório para a pasta criada
cd sct
## 2. instalar o voyager
composer require tcg/voyager
## configurar conexão com o banco no arquivo .env:
## colocar o DB_CONNECTION para sqlite
DB_CONNECTION=sqlite
## comentar o DB_DATABASE
#DB_DATABASE=laravel

## Criar banco as tabelas do banco com alguns dados
php artisan voyager:install --with-dummy

# Rodar a aplicação
php artisan serve
# Laravel ele utiliza a arquitetura MVC
# Model => app\Models (Tabelas banco)
# Controllers => app\Http\Controllers (gerencia tudo)
# Views => resources\views (telas do app)
# Routes (Rotas) => routes\wep.php

# baixar as dependencias
composer install
# rodar o servidor
php artisan serve

Se você instalou com os dados dummy, um usuário foi criado para você com as seguintes credenciais de login:
email: admin@admin.com
password: password

# Tecnologias
[Bootstrap](https://getbootstrap.com/docs/5.2/getting-started/introduction/)
[Font Awesome](https://fontawesome.com/search?o=r&m=free)
[Laravel](https://laravel.com/docs/9.x)
[Voyager](https://voyager-docs.devdojo.com/bread/introduction)

