<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $servico = htmlspecialchars($_POST['servico']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Monta o corpo do email
    $to = "geosig@geosigtecnologias.com.br";
    $subject = "Solicitação de Orçamento - $servico";
    $body = "Nome: $nome\nEmail: $email\nTelefone: $telefone\n\nServiço de Interesse: $servico\n\nMensagem Adicional:\n$mensagem";
    $headers = "From: $email";

    // Envia o email
    if (mail($to, $subject, $body, $headers)) {
        // Exibe a mensagem de obrigado
        echo "<script type='text/javascript'>
                alert('Obrigado! Sua mensagem foi enviada com sucesso.');
                window.location.href = 'https://www.geosigtecnologias.com.br/';
              </script>";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
