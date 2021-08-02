<html>
    <meta charset=UTF-8>
    Para alterar a forma de pagamento clique abaixo: <hr>

    <form method=POST>
        ID: <input type=text name=idProprietario>
        Nova forma de pagamento: <input type=text name=formaPagamento>
        <input type=submit value="Alterar forma de pagamento">
        <a href="indexFormulário.php"><input type=button value="Voltar"></a>
    </form>
</html>

<?php
   
   $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");
    mysqli_select_db($conexao,"estacionamento");
    $idProprietario= $_POST["idProprietario"];
    $formaPagamento= $_POST["formaPagamento"];
    mysqli_query ($conexao,"update veiculos set formaPagamento='$formaPagamento' where idProprietario=$idProprietario");
    $consulta = mysqli_query($conexao,"select * from veiculos");

    while($exibir = mysqli_fetch_array($consulta))
    {
        echo "<br>ID: ".$exibir['idProprietario'];
        echo " - Forma de Pagamento: ".$exibir['formaPagamento'];
    }
    mysqli_close($conexao);
    
?>
