<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <?php
        $dsn = 'mysql:host=localhost;dbname=hangar_teste';
        $user = 'root';
        $password = '';

        try{
            $connection = new PDO($dsn, $user, $password);
            
            $query = '
                SELECT a.user_name, a.user_city, a.user_country
                FROM user a
                INNER JOIN orders b 
                ON a.user_id = b.order_user_id
                WHERE a.user_id IN (1, 3, 5)
                ORDER BY a.user_name;
            ';
        
            $statement =  $connection->query($query);
            $list = $statement->fetchAll(PDO::FETCH_ASSOC);

            echo '<pre>';
            print_r($list);
            echo '<pre>';
        
        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
        }
    ?>
</body>
</html>