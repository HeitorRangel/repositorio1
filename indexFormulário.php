<!DOCTYPE html>
<html>
    <title>Pagina 2-Formulário</title>
    <head>
        <meta charset="utf-8">        
    </head>
    <body>
        
        <h1>Preencha o formulário com seus Dados Pessoais</h1>
        <hr> 
        <form method=POST>
        
            <br><b>Digite seu ID</b>
            <input required type=text name=id><br>
            <br><b>Digite seu nome:</b>
            <input required type=text name=nomeProprietario><br>
            <br><b>Digite seu CPF</b>
            <input required type=text name=cpfProprietario><br>
        
            <br><b>Veículo:</b><select name=tipoVeiculo>
                <option value=bicicleta>Bicicleta
                <option value=moto>Moto
                <option value=carro>Carro
                <option value=reboque>Reboque
            </select><br>

            <h3>Data e Horário de Check-In</h3><br>
            <input type="datetime-local" name = "dataHoraCheckIn"><br>
            <h3>Data e Horário de Check-Out</h3><br>
            <input type="datetime-local" name = "dataHoraCheckOut"><br>
            
            
            <br><b>Forma de formaPagamento:</b>
            <input type=radio name=formaPagamento value="cartao de credito">Cartão de Crédito
            <input type=radio name=formaPagamento value=dinheiro>Dinheiro 
            <input type=radio name=formaPagamento value=boleto>Boleto Bancário<br>
            <hr>
            
            <br>
            <h3>Você concorda com as restrições  do Estacionamento?</h3>
            <br><input required type=radio name=restricao value=concorda>Sim, eu concordo.
            <br><input required type=radio name=restricao value="nao concorda">Não concordo.

            <br><center>
            <br><input type=submit value=Enviar>
            <input type=reset value=Apagar>
            <a href="apagarVeiculo-Codigo.php"><input type=button value="Apagar Veiculo"></a>
            <a href="alterarVeiculo.php"><input type=button value="Alterar Veiculo"></a>
            </center>
        
        </form>
    </body>
</html>

<?php
    if(isset($_POST["idProprietario"]))
    {
        $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");

        mysqli_select_db($conexao,"estacionamento");
        $idProprietario = $_POST["idProprietario"];
        $nomeProprietario = $_POST["nomeProprietario"];
        $cpfProprietario = $_POST["cpfProprietario"];
        $tipoVeiculo = $_POST["tipoVeiculo"];
        $dataHoraCheckIn = $_POST["dataHoraCheckIn"];
        $dataHoraCheckOut = $_POST["dataHoraCheckOut"];
        $formaPagamento = $_POST["formaPagamento"];
        $restricao = $_POST["restricao"];

        mysqli_query($conexao, "insert into veiculos values('$idProprietario', '$nomeProprietario', '$cpfProprietario', '$tipoVeiculo', '$dataHoraCheckIn', '$dataHoraCheckOut', '$formaPagamento', '$restricao')");
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
        }

        mysqli_close($conexao);
    }
?>
