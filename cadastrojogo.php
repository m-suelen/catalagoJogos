<?php

    $conn = mysqli_connect("localhost", "root", "", "testeciee");

    if($conn == false){
        die("ERRO: Não conseguiu conectar no MySQL. " . mysqli_connect_error());
    }

    $id = "";
    $titulo = "";
    $genero = "";
    $dev = "";
    $dtlanc = "";
    $desc_jogo = "";
    
    //Se foi enviado ID via GET - edição de jogo
    if(isset($_GET['id'])){
        //Obtém valores enviado via GET
        $id = $_GET['id'];

        $sql = "SELECT * FROM cad_jogo WHERE id = $id";

        //Envia a consulta para obter dados do jogo atual
        $res = mysqli_query($conn, $sql);

        //Armazena os dados obtidos
        $row = mysqli_fetch_assoc($res);

        $titulo = $row['titulo'];
        $genero = $row['genero'];
        $dev = $row['dev'];
        $dtlanc = $row['dtlanc'];
        $desc_jogo = $row['desc_jogo'];
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/cadjogo.css">
    <title>Tela de Cadastro de Jogos</title>
</head>
<body>
    <header class="top-header clearfix">
        <div class="maxwidth">
            <h1 class="top-header-title">Cadastro de Jogos</h1>
            <nav class="top-nav">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="listajogos.php">Jogos</a></li>
                    <li><a href="cadastrojogo.php">Cadastro</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
        <div>
            <form action="recebecadjogo.php" method="POST" class="form">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>                
                <div>
                    <label for="titulo">Título:</label><br>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>">  
                </div>
                         
                <div>
                    <label for="genero">Gênero:</label><br>
                    <input type="text" name="genero" id="genero" value="<?php echo $genero; ?>"> 
                </div>
                             
                <div>
                    <label for="dev">Desenvolvedora:</label><br>
                    <input type="text" name="dev" id="dev" value="<?php echo $dev; ?>">
                </div>
                
                <div>
                    <label for="dtlanc">Data de Lançamento:</label><br>
                    <input type="date" name="dtlanc" id="dtlanc" value="<?php echo $dtlanc; ?>">                
                </div>
                
                <div>
                    <label for="desc_jogo">Descrição:</label><br>
                    <input type="text" name="desc_jogo" id="desc_jogo" value="<?php echo $desc_jogo; ?>"> 
                </div>                
                        
                <input type="submit" value="Enviar" class="btnenviar">
            </form>
        </div>        
    </section>
    <footer class="footer">    
        <p>&copy; Todos direitos reservados</p>
    </footer>
</body>
</html>