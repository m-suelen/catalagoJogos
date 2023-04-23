<?php

    $conn = mysqli_connect("localhost", "root", "", "testeciee");

    if($conn == false){
        die("ERRO: Não conseguiu conectar no MySQL. " . mysqli_connect_error());
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM cad_jogo WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    header("Location: listajogos.php");

?>