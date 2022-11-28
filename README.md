# Photo Cold
###  Projeto loja virtual de fotos e eventos

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-funcionalidades">Funcionalidades</a> •
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-tecnologias">Tecnologias</a> •  
 <a href="#user-content--licença">Licença</a>
</p>

## 💻 Sobre o projeto

Permite aos fotógrafos venderem suas fotos, que foram tiradas em eventos, em um processo mais automático. Já os clientes, facilidade na hora de comprar as fotos.

---

## ⚙️ Funcionalidades

- [ ] Os usuários fotógrafos têm acesso ao painel administrativo, que podem realizar:
    - [ ] Gerenciar Eventos
    - [ ] Gerenciar Fotos
    - [ ] Gerenciar Pagamentos
  

- [ ] Os usuários clientes têm acesso a painel financeiro, que podem:
    - [ ] Comprar Fotos
    - [ ] Visualizar os Eventos
    - [ ] Visualizar os Fotógrafos

---
## 🚀 Como executar o projeto

### Pré-requisitos

para que a aplicação possa rodar em sua máquina, é necessário que você tenha as ferramentas: Composer, Git, Laravel.

Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)
### 🎲 Rodando o Projeto

#### Instalando as dependências
```bash
# Clone este repositório
$ git clone <https://github.com/USUARIO/REPOSITORIO.git>

# Acesse a pasta do projeto no terminal/cmd
$ cd photo-cold

# Instale as dependências composer
$ composer install

# Instale as dependências npm (frontend)
$ npm install && npm run dev
```
#### Configurando o projeto
1. Faça uma cópia do arquivo `.env.example` e renomeie para `.env`:
2. Crie um banco de dados
> Sugestão MariaDB ou MySQL: definição de collation: **utf8mb4_general_ci**

3. Configure a conexão com os dados do banco de dados no arquivo `.env`:
```php  
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=NOMEDOBANCO
    DB_USERNAME=USUARIO
    DB_PASSWORD=SENHA
```
#### Rodando o servidor
```bash    
# Criação de nova chave de criptografia da aplicação:
php artisan key:generate
    
# Criação das tabelas e inserção dos dados no banco de dados:
php artisan migrate:fresh --force --seed

# Execute a aplicação em modo de desenvolvimento
php artisan serve

# O servidor iniciará na porta:8000 - acesse <http://localhost:8000>
```

### 🎲 Acesso ao Projeto (servidor)
Acesso à área pública da aplicação:
> **URL:** http://domínio/

Acesso à área privada da aplicação:
> **URL:** http://domínio/admin <br/>

**Criar usuário pelo terminal usando tinker:**
```bash
# Executar o tinker
php artisan tinker

# No tinker: 
>>> $user = new \App\Models\User;
>>> $user->email = 'admin@admin.com';
>>> $user->password = Hash::make('senha'); # altere 'senha' para uma senha forte
>>> $user->name = 'Nome do Administrator';
>>> $user->save();
>>> exit() # sair do tinker
```
---
## 🛠 Tecnologias

Para a construção da aplicação, foram utilizadas as ferramentas:

- [Laravel](https://laravel.com/docs)
- [Bootstrap](https://getbootstrap.com/)
- [PHP]()

As seguintes dependências foram incluidas no projeto:
- [Módulo de linguagem Português do Brasil (pt_BR) para Laravel](https://github.com/lucascudo/laravel-pt-BR-localization)
- [Composer]()
- [Voyager]()
---
## 💪 Como contribuir para o projeto

1. Faça um **fork** do projeto.
2. Crie uma nova branch com as suas alterações: `git checkout -b my-feature`
3. Salve as alterações e crie uma mensagem de commit contando o que você fez: `git commit -m "feature: My new feature"`
4. Envie as suas alterações: `git push origin my-feature`

## 📝 Licença

Este projeto é um software de código aberto licenciado sob a licença [gnu general public license version 3.0 (gplv3)](./LICENSE).
