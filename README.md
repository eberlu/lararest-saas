# Lararest SAAS

API REST desenvolvida sob o <a href="https://laravel.com/">Laravel Framework</a>.

## Objetivos

- Desenvolver uma interface REST de roteamento HTTP imaginando um modelo de negócio <a href="https://azure.microsoft.com/pt-br/resources/cloud-computing-dictionary/what-is-saas">SAAS</a>.
- Oferecer dois níveis de autenticação distintos, administradores (back-office) e usuários (multi-tenancy), utilizando o método de autenticação JWT. 
- Abandonar controladores "tradicionais" do laravel na camada de comunicação entre a chamada HTTP e o banco, substituindo-os por "Actions".

## Laravel Actions :sparkling_heart:

Alguns anos atrás, encontrei este pacote que mudou minha maneira de trabalhar no laravel, venho usando em praticamente todos os projetos e vejo muitas vantagens em relação a controladores tradicionais,
começando pela eliminação de "controladores megazórdicos" e lógica de domínio espalhada pelo diretório `app`.

(Estou ciente da existência dos controladores invocáveis mas eles não são suficiente!)

- Aqui está o link do pacotinho milagroso: https://github.com/lorisleiva/laravel-actions
- Post do autor explicando suas motivações das quais entendi e "abracei": https://lorisleiva.com/why-i-wrote-laravel-actions

## Features

### Admin

- Login
- Obter dados dos usuários cadastros
- Atualizar usuários ou deletá-los

### Usuários

- Registro livre
- Login
- CRUD de lojas
- CRUD de categorias pertencentes a uma loja
- CRUD de produtos pertencentes a uma loja
- Anexar e desanexar produtos a múltiplas categorias da mesma loja

## Instalação e configuração

- Após o clone, instale as dependências do composer: `composer install`
- Crei o arquivo `.env` na raíz do projeto copiando o conteúdo do `.env.example` preencha as variáveis relativas ao banco de dados
- Gere a chave da app: `php artisan key:generate`
- Gere o JWT secret: `php artisan jwt:secret`
- Para popular o banco com as factories: `php artisan migrate:fresh --seed`

## Dicas

- Você pode obter uma lista com as rotas registradas em seu terminal, basta digitar `php artisan route:list --path=api`
- Para obter credências de admin por exemplo ou qualquer outro registro pré-populado no banco, você pode usar o `php artisan tinker` e realizar consultas do eloquent para facilitar seus testes manuais
- A senha padrão para os usuários e admins pré-populados é `password`

## Documentação
https://eberlu.github.io/lararest-saas/

## Em breve...

- Testes para features
- Upload de imagens para produtos
- Definir thumbnail de produto