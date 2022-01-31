<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média de Notas</title>
    <!-- Internal Style Sheet -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Open Sans'; 
        }
        form {
            display: flex;
            flex-direction: column;
            width: 150px;  
        }
        input {
            font-family: 'Open Sans'; 
            margin-bottom: 10px;    
        }
    </style>
</head>
<body>
    <form action='resposta_1.php' method="get">
        <label name="grade1">Nota 1:</label>
        <input type="text" name="grade1">
        <label name="grade2">Nota 2:</label>
        <input type="text" name="grade2">
        <label name="grade3">Nota 3:</label>
        <input type="text" name="grade3">
        <input type="submit" name='calculate' value="Calcular">
    </form>

    <?php
        if(array_key_exists('calculate', $_GET)){
            $grade1 = $_GET['grade1'];
            $grade2 = $_GET['grade2'];
            $grade3 = $_GET['grade3'];

            if(is_numeric($grade1) && is_numeric($grade2) && is_numeric($grade3)){
                if(!($grade1 < 0 || $grade1 > 10 || $grade2 < 0 || $grade2 > 10 || $grade3 < 0 || $grade > 10)){
                    $average_grades = ($grade1 + $grade2 + $grade3)/3;
            
                    if($average_grades < 5) {
                        $result = 'Reprovado';
                    } else 
                    if($average_grades <= 7) {
                        $result = 'Exame';
                    } else 
                    if($average_grades > 7) {
                        $result = 'Aprovado';
                    }
                
                    echo 'Média do Estudante: ' . round($average_grades, 2) . '<br/> Situação do Estudante: ' . $result;
                } else {
                    echo 'Informe notas de 0 a 10!';
                }
            } else {
                echo 'Digite notas válidas!';
            }
        }
    ?>
</body>
</html>
