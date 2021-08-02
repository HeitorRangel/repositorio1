<html>
    <meta charset=UTF-8>
    Para apagar o veiculo clique abaixo: <hr>
    <form method=POST>
        Placa: <input type=text name=placaVeiculo>
        <input type=submit value="Apagar Veiculo">
        <a href="indexFormulário.php"><input type=button value="Voltar"></a>
    </form>
</html>

<?php

    $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");

    mysqli_select_db($conexao,"estacionamento");
    $placaVeiculo = $_POST["placaVeiculo"];

    mysqli_query($conexao,"delete from veiculos where placaVeiculo='$placaVeiculo'");
    $consulta = mysqli_query($conexao,"select * from veiculos");
    mysqli_close($conexao);
    
?>

