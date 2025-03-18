<?php

require 'vendor/autoload.php';

use CobrancaModuloInterface\Core\CobrancaModuloInterface;

// Carrega configuração
// Essas configurações podem vir de um arquivo de configuração, banco de dados, etc.
$config = [
    'billing_module' => 'Cliente01\\ModuloCliente01', // Ou ModuloCliente02
];

// Obtém a classe do módulo a ser usado
$classeModulo = $config['billing_module'];

// Verifica se a classe existe e implementa a interface - early return com exceção
if (!class_exists($classeModulo) || !in_array(CobrancaModuloInterface::class, class_implements($classeModulo))) {
    throw new \RuntimeException("Módulo de cobrança inválido: $classeModulo deve implementar CobrancaModuloInterface");
}

// Instancia o módulo dinamicamente
$moduloCobranca = new $classeModulo();

// Usa o módulo
$resultado = $moduloCobranca->gerarAcordo([
    'nome' => 'Fulano de Tal',
    'valor_divida' => 1000.00,
    'numero_parcelas' => 3,
]);

// Early return em caso de erro
if (!$resultado['sucesso']) {
    echo "Erro ao gerar acordo: {$resultado['mensagem']}\n";
    exit;
}

echo "Acordo gerado com sucesso!\n";
print_r($resultado);

// Exemplo de geração de parcelas
$parcelas = $moduloCobranca->gerarParcelas([], $resultado);

// Early return em caso de erro nas parcelas
if (!$parcelas['sucesso']) {
    echo "Erro ao gerar parcelas\n";
    exit;
}

echo "Parcelas geradas com sucesso!\n";
print_r($parcelas);