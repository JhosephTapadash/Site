<?php
error_reporting(error_level: E_ALL);
ini_set(option: 'display_errors', value: 1);

function sanitizeInput($data): string {
    return htmlspecialchars(string: trim(string: $data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = sanitizeInput(data: $_POST['nome']);
    $email = sanitizeInput(data: $_POST['email']);
    $telefone = sanitizeInput(data: $_POST['telefone']);
    $cep = sanitizeInput(data: $_POST['cep']);
    $numero = sanitizeInput(data: $_POST['numero']);
    $validade = sanitizeInput(data: $_POST['validade']);
    $cvv = sanitizeInput(data: $_POST['cvv']);

    if (empty($nome) || empty($email) || empty($telefone) || empty($cep) || empty($numero) || empty($validade) || empty($cvv)) {
        echo "<h1>Erro: Todos os campos são obrigatórios.</h1>";
        exit;
    }

    echo "<h1>Compra realizada com sucesso!</h1>";
    echo "<p>Obrigado, $nome.</p>";
    echo "<p>Você receberá um e-mail de confirmação em $email.</p>";
} else {
    echo "<h1>Erro ao processar a compra.</h1>";
}