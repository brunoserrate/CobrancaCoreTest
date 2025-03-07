<?php

require 'vendor/autoload.php';

use Core\Cobranca\CobrancaModulo;

// Aqui ficaria um arquivo separado ou vindo de uma base de dados
$config = [
    'billing_module' => 'Cliente\\ModuloCliente01\\Cliente01Module', // Ou Cliente02Module
];

// Obtém a classe do módulo a ser usado
$classeModulo = $config['billing_module'];

// Verifica se a classe existe e estende CobrancaModulo
if (class_exists($classeModulo) && is_subclass_of($classeModulo, CobrancaModulo::class)) {
    // Instancia o módulo dinamicamente
    $moduloCobranca = new $classeModulo();

    // Usa o módulo
    $resultado = $moduloCobranca->gerarAcordo([
        'nome' => 'Fulano de Tal',
        'valor' => 1000.00,
        'parcelas' => 3,
    ]);

    if ($resultado) {
        echo "Acordo gerado com sucesso!\n";
        print_r($resultado);
    } else {
        echo "Erro ao gerar acordo!\n";
    }
} else {
    throw new \RuntimeException("Módulo de cobrança inválido: $classeModulo");
}