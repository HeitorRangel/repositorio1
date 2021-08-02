<html>
    <meta charset=UTF-8>
    Para alterar a forma de pagamento clique abaixo: <hr>

    <form method=POST>
        Placa: <input type=text name=placaVeiculo>
        Nova forma de pagamento: <input type=text name=formaPagamento>
        <input type=submit value="Alterar forma de pagamento">
        <a href="indexFormulário.php"><input type=button value="Voltar"></a>
    </form>
</html>

<?php
   
   $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");
    mysqli_select_db($conexao,"estacionamento");
    $placaVeiculo= $_POST["placaVeiculo"];
    $formaPagamento= $_POST["formaPagamento"];
    mysqli_query ($conexao,"update veiculos set formaPagamento='$formaPagamento' where placaVeiculo=$placaVeiculo");
    $consulta = mysqli_query($conexao,"select * from veiculos");
    mysqli_close($conexao);
    
?>
