<?php
require_once 'config.php';

//PEGANDO DADOS DO FORMULÁRIO
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['instagram'];
$data_atual = $_POST['faturamento'];


//PREPARAR COMANDO PARA TABELA
$smtp = $conn->prepare("INSERT INTO mensagens (nome, email, instagram, faturamento) VALUES (?,?,?,?)");
$smtp->bind_param("ssss", $nome, $email, $mensagem, $data_atual);

if($smtp->execute()){
    echo "Mensagem enviada com sucesso!";
}
else{
    echo "Erro no envio da mensagem: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>
<br><br>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviado!</title>
    <style>
        body{
            font-size:30px;
        }
    </style>
</head>
<body>
    <a style="text-decoration:none;border:1px solid blue;padding: 5px;" href="index.html">Voltar à página inicial</a>
</body>
</html>