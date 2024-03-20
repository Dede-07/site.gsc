<?php
require_once 'config.php';

$senhaSecreta = "GutGut1802";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST['senha'];

    //DIGITOU A SENHA CERTO
    if($senhadigitada === $senhaSecreta){
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);
    }
    else{
        echo "<h1>Senha Incorreta</h1>";
    }   
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mensagens</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background: #dfdcdc;
            display: flex;
            flex-flow: column wrap;
            padding: 40px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        input {
            width: 90%;
            height: 30px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px;
        }

        textarea {
            width: 90%;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px;
        }

        button {
            background: green;
            color: white;
            padding: 15px 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: rgb(10, 164, 10);
        }

        .mensagens{
            background: #ccc;
            padding: 20px;
            margin-left:60px;
            border-radius:10px;
        }
    </style>


</head>

<body>
    <form method="post">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Enviar</button>
    </form>

 <div class="mensagens">
 <?php if(isset($result) && $result->num_rows >0) : ?>
            <h2 style="text-align:center">Mensagens</h2>
            <ul>
                <?php while($row = $result->fetch_assoc()) :?>
                    <li>
                        <strong>Nome: </strong> <?php echo $row["nome"]; ?><br>
                        <strong>Email: </strong> <?php echo $row["email"]; ?><br>
                        <strong>Perfil Instagram: </strong> <?php echo $row["instagram"]; ?><br>
                        <strong>Faturamento Mensal: </strong> <?php echo $row["faturamento"]; ?><br><br>
                
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
                <p>Nenhuma mensagem. </p>
                <?php endif; ?>
 </div>
    
</body>
</html>