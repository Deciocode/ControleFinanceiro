<?php

    if(isset($_POST['btnCalcular'])){
        $valor1 = $_POST['vl1'];
        $valor2 = $_POST['vl2'];
        $valor3 = $_POST['vl3'];

        $media = ($valor1 + $valor2 + $valor3) / 3;

        echo 'Resultado: ' . $media . '<hr>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="teste.php" method="POST">
        <label>1º Valor Médio:</label>
        <input name="vl1">
        <br>
        <label>2º Valor Médio:</label>
        <input name="vl2">
        <br>
        <label>3º Valor Médio:</label>
        <input name="vl3">
        <br>
        <button name="btnCalcular">CALCULAR</button>
    </form>
</body>
</html>