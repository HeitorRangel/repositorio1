<html>
    <meta charset=UTF-8>
    Para apagar o veiculo clique abaixo: <hr>
    <form method=POST>
        Id: <input type=text name=idProprietario>
        <input type=submit value="Apagar Veiculo">
        <a href="indexFormulário.php"><input type=button value="Voltar"></a>
    </form>
</html>

<?php

    $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");

    mysqli_select_db($conexao,"estacionamento");
    $idProprietario = $_POST["idProprietario"];

    mysqli_query($conexao,"delete from veiculos where idProprietario='$idProprietario'");
    $consulta = mysqli_query($conexao,"select * from veiculos");

    while($exibir = mysqli_fetch_array($consulta))
    {
        echo "<br>ID:".$exibir['idProprietario'];
        echo " - Nome:".$exibir['nomeProprietario'];
        echo " - CPF:".$exibir['cpfProprietario'];
        echo " - Veiculo:".$exibir['tipoVeiculo'];
        echo " - Data e Hora de CheckIn:".$exibir['dataHoraCheckIn'];
        echo " - Data e Hora de CheckOut:".$exibir['dataHoraCheckOut'];
        echo " - Pagamento:".$exibir['formaPagamento'];
        echo " - Concordância com Restrições:".$exibir['restricao'];
        echo " - Termo de Responsabilidade:".$exibir['termoResponsabilidade'];
    }
    mysqli_close($conexao);
    
?>

