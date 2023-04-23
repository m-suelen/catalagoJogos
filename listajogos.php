<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/listajogos.css">
    <title>Tela de Listagem de Jogos</title>
</head>
<body>
    <header class="top-header clearfix">
        <div class="maxwidth">
            <h1 class="top-header-title">Lista de Jogos</h1>    
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
            <table class="table">                
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Desenvolvedora</th>
                    <th>Lançamento</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <?php

                    $conn = mysqli_connect("localhost", "root", "", "testeciee");

                    if($conn == false){
                        die("ERRO: Não conseguiu conectar no MySQL. " . mysqli_connect_error());
                    }

                    //Comando SQL para obter dados dos jogos
                    $sql = "SELECT id, titulo, genero, dev, dtlanc, desc_jogo FROM cad_jogo";

                    //Envia código SQL para o MySQL
                    $res = mysqli_query($conn, $sql);

                    //Percorre os registros encontrados
                    while($row = mysqli_fetch_assoc($res)){

                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['titulo']."</td>
                                <td>".$row['genero']."</td>
                                <td>".$row['dev']."</td>
                                <td>".$row['dtlanc']."</td>
                                <td>".$row['desc_jogo']."</td>
                                <td><a href='cadastrojogo.php?id=". $row['id'] . "'>Editar</a></td>
                                <td><a href='excluijogo.php?id=". $row['id'] . "'>Excluir</a></td>
                            </tr>";
                    };

                ?>
                
            </table>
        </div>  
    </section>

    <footer class="footer">    
        <p>&copy; Todos direitos reservados</p>
    </footer>
</body>
</html>