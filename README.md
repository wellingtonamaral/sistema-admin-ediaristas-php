## Projeto Sistema Administrativo da plataforma E-Diaristas

Desenvolvivido no Curso multi-stack da treinaweb

## Instalando o projeto

#### Clonar o repositório

```
git clone https://github.com/wellingtonamaral/sistema-admin-ediaristas-php.git
```

##### Instalar as depencências

```
composer install
```
 
 Ou sem ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivos de configurações de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
configurar os detalhes da aplicação e conexão com o o banco de dados.

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```

