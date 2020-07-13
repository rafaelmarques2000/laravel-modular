## Sobre este projeto

Este projeto consiste no laravel 7.1 Modificado para ter suporte aos seguintes recursos:

- Modularidade(ok)
- Registro automático dos modulos atraves do provider do modulo Main(ok)
- Injeção automática de Models e Repositorys(Em andamento)
- Modificar para que cada novos comandos de terminar possam ser criados por modulo(No momemnto somente no componente Main)

## Comandos

Para criar um modulo e sua estrutura 

php artisan module:create {Nome do modulo}
Ex: php artisan module:create Api

## Estrutura do Modulo

- Controller
- Domain
    - Model
    - Repository
- Providers
- Routes
- Services
- Views

