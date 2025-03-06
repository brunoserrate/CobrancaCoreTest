# CobrancaCoreTest
Teste de módulos de cobrança. Esse projeto é o core

A ideia do projeto é criar módulos diferentes de uma determinada classe (no caso dessa, de cobrança) e acoplar na principal.

Então teremos um módulo único e principal (que simularia a do sistema) e que chamaria outros módulos instalados por servidor:

Servidor 1:
Core -> cliente 01 -> Core

Servidor 2:
Core -> cliente 02 -> Core