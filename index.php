<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2> LIst of clients and their sttaus</h2>
        <a class="btn btn-primary" href="/myclients/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";    

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error){
                    die("Connection failed: " . $connection->connection_error);
                }

                //read all row form database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);
                

                if (!$result){
                    die("INVALID QUERY: " . $connection->error);
                }

                //read data of each row

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>    
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/myclients/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/myclients/delete.php?id=$row[id]'>Delete</a>

                    </td>
                </tr>
                    ";
                }
                ?>


               
            </tbody>    
        </table>
    </div>
</body>
</html>