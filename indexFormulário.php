<!DOCTYPE html>
<html>
    <title>Página 2- Formulário</title>
    <head>
        <meta charset="utf-8">    
        <link rel="stylesheet" href="style2.css">    
    </head>
    <body>
        <div id="conteiner">
        
        <h1  id="cabecalho">Preencha o formulário com seus Dados Pessoais</h1>
        <hr> 
            <form method=POST>
            
                <br><b>Placa</b>
                <input required type=text name=placaVeiculo><br>
                <br><b>Nome:</b>
                <input required type=text name=nomeProprietario><br>
                <br><b>CPF</b>
                <input required type=text name=cpfProprietario><br>
            
                <br><b>Veículo: </b><select name=tipoVeiculo>
                    <option value=moto>Moto
                    <option value=carro>Carro
                    <option value=reboque>Reboque
                </select><br><br>

                <h3>Data e Horário de Check-In</h3><br>
                <input type="datetime-local" name = "dataHoraCheckIn"><br>
                <h3><br>Data e Horário de Check-Out</h3><br>
                <input type="datetime-local" name = "dataHoraCheckOut"><br>
                
                
                <br><b>Forma de Pagamento:</b><br>
                <input type=radio name=formaPagamento value="cartao de credito">Cartão de Crédito<br>
                <input type=radio name=formaPagamento value=dinheiro>Dinheiro<br>
                <input type=radio name=formaPagamento value=boleto>Boleto Bancário<br><br>
                <hr>
                
                <br>
                <h3>Você concorda com as restrições  do Estacionamento?</h3>
                <br><input required type=radio name=restricao value=concorda>Sim, eu concordo.

                <br><center>
                <br><input type=submit value=Enviar>
                <input type=reset value=Apagar>
                <a href="apagarVeiculo-Codigo.php"><input type=button value="Apagar Veiculo"></a>
                <a href="alterarVeiculo.php"><input type=button value="Alterar Veiculo"></a>
                </center>
            
            </form>
        </div>
    </body>
</html>

<?php
    $conexao=mysqli_connect("database1.cw3frybg0axw.us-east-1.rds.amazonaws.com", "admin", "HECR12-34h");

    mysqli_select_db($conexao,"estacionamento");
    $placaVeiculo = $_POST["placaVeiculo"];
    $nomeProprietario = $_POST["nomeProprietario"];
    $cpfProprietario = $_POST["cpfProprietario"];
    $tipoVeiculo = $_POST["tipoVeiculo"];
    $dataHoraCheckIn = $_POST["dataHoraCheckIn"];
    $dataHoraCheckOut = $_POST["dataHoraCheckOut"];
    $formaPagamento = $_POST["formaPagamento"];
    $restricao = $_POST["restricao"];

    mysqli_query($conexao, "insert into veiculos values('$placaVeiculo', '$nomeProprietario', '$cpfProprietario', '$tipoVeiculo', '$dataHoraCheckIn', '$dataHoraCheckOut', '$formaPagamento', '$restricao')");
    $consulta = mysqli_query($conexao,"select * from veiculos");
    mysqli_close($conexao);
?>
