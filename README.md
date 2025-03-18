# CobrancaCoreTest

Este é o projeto principal que define o **core do sistema de cobrança**. Ele contém a lógica genérica e os métodos base para criação de acordos, retornos, e outras operações relacionadas à cobrança.

## Objetivo
O **CobrancaCoreTest** fornece uma estrutura padronizada para lidar com operações de cobrança, delegando a implementação específica para módulos externos.

## Estrutura dos Projetos

- **CobrancaModuloInterface.php**: Interface principal que espelha os métodos da classe abstrata do módulo principal, garantindo que todas as implementações de clientes sigam o mesmo contrato. Esse arquivo pode ser localizado no projeto [CobrancaModuloInterface](https://github.com/brunoserrate/CobrancaModuloInterface).

- **CobrancaModulo.php**: Módulo abstrato que é utilizado no sistema principal. Esse arquivo pode ser localizado no projeto [CobrancaCoreTest](https://github.com/brunoserrate/CobrancaCoreTest).

- **ModuloCliente01.php**: Módulo de implementação de um cliente especifico. Esse arquivo pode ser localizado no projeto [CobrancaModulo1](https://github.com/brunoserrate/CobrancaModulo1).
