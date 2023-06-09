

# API Laravel
<div align="center">
  <img alt="Vinicius-Laravel" src="https://img.shields.io/badge/Laravel-323330?style=for-the-badge&logo=laravel&logoColor=FF2D20">
  <img alt="Vinicius-MySQL" src="https://img.shields.io/badge/MySQL-323330?style=for-the-badge&logo=mysql&logoColor=FF2D20">
</div>

Projeto de API em [Laravel 10.x](https://laravel.com/docs/10.x) com autenticação JWT.
Para o banco de dados, foi utilizado o MySQL.

<hr>

# Requisitos
- Certifique-se de que você possua o [MySQL](https://dev.mysql.com/downloads/installer/) instalado.
- Certifique-se de que você possua o [Composer](https://getcomposer.org) instalado.

# Configurações
Execute o comando abaixo para instalar as dependências do projeto na [pasta principal do projeto](https://github.com/Vinicius-CS/api-laravel):
- `composer install`

Configure as variáveis do banco de dados criando um arquivo .env com base no arquivo de exemplo [.env.example](https://github.com/Vinicius-CS/api-laravel/blob/main/.env.example).
- `cp .env.example .env`
	- **Você pode configurar as seguintes variáveis:**
		- **DB_HOST:** URL de conexão com o banco de dados (padrão 127.0.0.1)
		- **DB_PORT:** Porta de conexão com o banco de dados (padrão 3306)
		- **DB_DATABASE:** Nome do banco de dados (se você deixar o nome padrão, ele será criado automaticamente caso não exista)
		- **DB_USERNAME:** Nome de usuário do banco de dados
		- **DB_PASSWORD:** Senha do usuário do banco de dados

Gere a key do projeto que ficará no arquivo .env.
- `php artisan key:generate`

Gere a key JWT Secret do projeto que ficará no arquivo .env.
- `php artisan jwt:secret`
	- Digite `yes` se necessário.

Execute as [migrations](https://github.com/Vinicius-CS/api-laravel/tree/main/database/migrations) para criar o banco de dados e suas tabelas.
- `php artisan migrate`
	- Digite `yes` se necessário.

Execute as [seeders](https://github.com/Vinicius-CS/api-laravel/tree/main/database/migrations) para popular a tabela de produtos.
- `php artisan db:seed`

# Iniciando o Servidor
Execute o comando abaixo para iniciar o servidor na [pasta principal do projeto](https://github.com/Vinicius-CS/api-laravel):
- `php artisan serve`

Utilize o link `localhost:8000/api/` para fazer as requisições na API de acordo com a [Documentação da API](https://app.swaggerhub.com/apis-docs/VINICIUSCRUZ/API-Laravel/1.0.0).

# Consumindo a API
Para consumir a API você pode utilizar o [Postman](https://www.postman.com/downloads/), utilizando da seguinte forma:
- **Configurando os Headers:** Selecione a aba `Headers`  e desmarque o `Accept` e insira um novo com o valor `application/json`.
- **Passando parâmetros via Body:** Selecione a aba `Body` e marque a opção `form-data`, em `Key` insira o nome da coluna e em `Value` o valor que você deseja atribuir à ela.
- **Visualização dos dados retornados:** Para uma melhor visualização no console abaixo altere o `HTML` para `JSON`. 

Cadastre um usuário e copie o token:
![Cadastrando usuário](https://i.imgur.com/hRa9Ifv.png)

Insira o token na aba `Authorization` sendo do tipo `Bearer Token`:
![enter image description here](https://i.imgur.com/Ni2ByxN.png)
