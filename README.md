## Sobre este projeto

Este projeto consiste no laravel 7.1 Modificado para ter suporte aos seguintes recursos:

- Modularidade(ok)
- Registro automático dos modulos atraves do provider do modulo Main(ok)
- Injeção automática de Models , Repositorys e services(Em andamento)
- Modificar para que cada novos comandos de terminal possam ser criados por modulo(No momemnto somente no componente Main, mais funciona normalmente no terminal)
- Adaptar os Migrations para cada Modulo(em andamento)


## Comandos

Para criar um modulo e sua estrutura 

**php artisan module:create {Nome do modulo}**
Ex: php artisan module:create Api

#### Instruções para o Artisan

Parar criar um controller dentro do modulo
- **php artisan make:controller {namespace}**
Ex: **php artisan make:controller "App\Modules\Api\Domain\Model\Produto"**


## Estrutura do Modulo Main
- Console
- Exceptions
- Http
- Providers
- Services

Obs: O modulo Main contem os recursos gerais do Framework como Middlewares e 
configurações Gerais.

## Estrutura do Modulo(custom)
- Controller
- Domain
    - Model
    - Repository
- Providers
- Routes
- Services
- Views

