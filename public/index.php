<?php

// Adicionando os cabeçalhos CORS
header("Access-Control-Allow-Origin: *"); // Permite qualquer origem
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Headers permitidos
header("Access-Control-Allow-Credentials: true"); // Permite cookies e autenticação

// Verificando o método OPTIONS (para o Preflight Request)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Resposta para o Preflight Request
    http_response_code(200);
    exit();
}

// Requerendo o autoload do Composer
use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

// Função que inicializa o Kernel
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
