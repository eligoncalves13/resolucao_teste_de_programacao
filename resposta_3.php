<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
    <?php
        $dsn = 'mysql:host=localhost;dbname=hangar_teste';
        $user = 'root';
        $password = '';

        try{
            $connection = new PDO($dsn, $user, $password);
            
            $query = '
                UPDATE user SET user_city = "Canada"
                WHERE user_id = 4;
            ';
            
            $connection->exec($query);
        
        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }
    ?>
</body>
</html>