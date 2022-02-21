<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'geografia2');

if ($mysqli->connect_errno){

    echo "<script>
            console.log('Error connecting to server, $mysqli->connect_errno: $mysqli->connect_error');
        </script>";

    die(); 
  
}

echo "<script>
            console.log('Succesfully connected to the server');
    </script>";


if (!$mysqli->set_charset("utf8")) { //Comprovar si la connexió es troba en utf-8 (Per a no liarla)

    printf("Error loading character set utf8: %s\n", $mysqli->error);

    exit;

}


$sql = "SELECT comunidad, id FROM comunidades";

$res = $mysqli->query($sql);

while ($rows = $res->fetch_all(MYSQLI_ASSOC)) { 

    foreach ($rows as $row) {

        $show[]= "<option value='$row[id]'>$row[comunidad]</option>";

    }

}

echo "<script>
        console.log('All queries OK!');
    </script>";

$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <style>

        body {
            background-color: #F0F0F2;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 98vw;
            height: auto ;
        }

        .items {
            background-color: #F2F2F2;
            text-align: center;
            border-radius: 3px;

            width: 75%;
            max-height: 75%;
            min-width: 500px; 
            

            font-family: 'Lato', sans-serif;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            /* border: 2px solid black;  */
        }

        header {
            display: block;
            background-color: #A6A6A6;
            border-radius: 10px;
            margin: 2%;
            font-size: x-large;
            padding: 3%;
            /* border: 2px solid blue;  */
        }

        section {
            margin: 2%;
            border-radius: 10px;
            min-width: 500px;  

            /* border: 2px solid red; */
        }

        hr {
            background-color: #F25C05;
            height: 2px;
        }

        .options-form {
            margin: 5%;
            max-height: 450px;

            /* border: 2px solid blue; */
        }

        select, option {
            padding: 1%;
            font-size: x-large;
            border-radius: 4px;
        }

        button {
            margin: 3%;
            padding: 1%;
            background-color: #F27405;
            font-size: large;
            color: #F2F2F2;
            border-radius: 5px;
            font-size: x-large;
        }

        
        img {
            max-width:100%;
            height: auto;
            min-width: 500px;   

            /* border: 2px solid yellow; */
        }


    </style>
    <title>Geography</title>
</head>
<body>
    <div class="container">
        <div class="items">
        <header>
                <h1>"Comunidades" of Spain</h1>
        </header>
        <section>

            <hr>

            <div class="options-form">
                <form action="P33.2.php" method="post">
                    <select name="comunidades" id="comunidades">

                        <?php
                        
                            foreach ($show as $option) {
                                echo $option;
                            }

                        ?>

                    </select>

                    <div class="buttonDiv">
                        <button type="submit" name="submit" class="button buttonH">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="image">
            <img src="images/Comunidades.png" alt="Comunidades Autonomas">
        </div>
        </div>
    </div>
</body>
</html>