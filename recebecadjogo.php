<?php

    $conn = mysqli_connect("localhost", "root", "", "testeciee");

    if($conn == false){
        die("ERRO: Não conseguiu conectar no MySQL. " . mysqli_connect_error());
    }

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $dev = $_POST['dev'];
    $dtlanc = $_POST['dtlanc'];
    $desc_jogo = $_POST['desc_jogo'];

    //Se o ID estiver vazio - será INSERT
    if(empty($id)){

        //Comando para inserir os dados do formulário do MySQL
        $sql = "INSERT INTO cad_jogo (titulo, genero, dev, dtlanc, desc_jogo) VALUES ('$titulo', '$genero', '$dev', '$dtlanc', '$desc_jogo') ";

        //Envia código SQL para o MySQL
        $res = mysqli_query($conn, $sql);

        //Se inseriu com sucesso
        if($res){
            //Redireciona jogo para a listagem
            header("Location: listajogos.php");
        }
        else{
            echo "ERRO AO INSERIR!";
        }
    }
    else{

        $sql = "UPDATE cad_jogo SET titulo = '$titulo', genero = '$genero', dev = '$dev', dtlanc = '$dtlanc', desc_jogo = '$desc_jogo' WHERE id = $id";

        //Envia código SQL para o MySQL
        $res = mysqli_query($conn, $sql);

        //Se atualizou com sucesso
        if($res){
            //Redireciona jogo para a listagem
            header("Location: listajogos.php");
        }
        else{
            echo "ERRO AO ATUALIZAR!";
        }
    }


?>

