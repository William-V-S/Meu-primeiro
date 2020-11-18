<!DOCTYPE html>
<html lang="pt-br">  
<head>
	<metar charset="UTF-8">
	<title>Calculadora</title>
    <style>
        div{
            margin:200px 500px;
            background:white;
            text-align:center;
        }
    </style>
</head>
<body>
<div>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
	    <label for="n1">Numero 01</label><input type="text" name="n1" id="n1"><br>
	    <label for="n2">Numero 02</label><input type="text" name="n2" id="n2"><br>
	    Operação:<br>
	    <label for="x1">(++++)</label><input type="submit" name="x1" id="x1" value="MAIS"><label for="x1">(++++)</label><br>         
	    <label for="x2">(----)</label><input type="submit" name="x2" id="x2" value="MENOS"><label for="x2">(----)</label><br>                
	    <label for="x3">(****)</label><input type="submit" name="x3" id="x3" value="Vezes"><label for="x3">(****)</label><br>       
	    <label for="x4">(////)</label><input type="submit" name="x4" id="x4" value="Divisão"><label for="x4">(////)<label><br><br>   
    </form>
    <?php
        $por = 0;
        if (($_POST['n1']) == 0){
            $_POST['n1'] = 0;
        }
        if (($_POST['n2']) == 0){
            $_POST['n2'] = 0;
        }
        if(!empty($_POST['n1']) or !empty($_POST['n2'])){
            if(!$n1 = filter_input(INPUT_POST,"n1",FILTER_VALIDATE_FLOAT)){
                $por = -10;
            }
            if(!$n2 = filter_input(INPUT_POST,"n2",FILTER_VALIDATE_FLOAT)){
                $por = -10;
            }
            if($por == 0) {   
                $cont = array("x1","x2","x3","x4");
                foreach ($cont as $val) {
                    if (empty($_POST[$val])){
                        $_POST[$val] = 0;
                    }
                }
                foreach ($cont as $xx => $val){
                    if ($_POST[$val] !== 0){
                        switch ($val){
                            case "x1":
                                echo "$n1 + $n2 = ",$n1+$n2;
                            break;
                            case "x2":
                                echo "$n1 - $n2 = ",$n1-$n2;
                            break;
                            case "x3":
                                echo "$n1 * $n2 = ",$n1*$n2;
                            break;
                            case "x4":
                                echo "$n1 / $n2 = ",$n1/$n2;
                            break;
                        }

                    }
                }
            }
            if ($por < 0){
                echo "ERRO: Informe valores validos";
            }
        }
        else{
            echo "ERRO: Campos em branco";
        }
    ?>
<div>
</body>
</html>