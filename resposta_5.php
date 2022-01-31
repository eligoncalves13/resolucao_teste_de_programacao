<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
</head>
<body>
    <?php
        $dsn = 'mysql:host=localhost;dbname=hangar_teste';
        $user = 'root';
        $password = '';

        try{
            $connection = new PDO($dsn, $user, $password);
            
            $query = '
                SELECT 
                EXTRACT(MONTH FROM orders.order_date) AS mes,
                SUM(orders.order_total) AS total
                FROM orders
                INNER JOIN user
                ON user.user_id = orders.order_user_id
                GROUP BY mes;
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