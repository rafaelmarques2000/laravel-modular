## Sobre este projeto

Este projeto consiste no laravel 7.1 Modificado para ter suporte aos seguintes recursos:

- Modularidade(ok)
- Registro automático dos modulos atraves do provider do modulo Main(ok)
- Injeção automática de Models , Repositorys e services(Em andamento)(ok)


## Comandos Personalizados
- create:module
- create:controller
- create:repository
- create:package

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

## Estrutura de Pacote
  - Domain
    - Model
    - Repository
  - Providers

