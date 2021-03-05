<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name;
    $email;

    $nameReq = "*";
    $emailReq = "*";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HTML Formulier Verwerken</title>
</head>
<body>
    <div id="content">
        <?php
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["email"])){           
            ?>
            <h1>De ingevulde gegevens zijn:</h1>
            <p>
                Naam: <?php echo  $name?>
                <br>
                Email: <?php echo $email ?>
            </p>
        <?php
        }
        else{
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"])){
                    $nameReq = "* This is a required field.";
                }
                if(empty($_POST["email"])){
                    $emailReq = "* This is a required field";
                }
            }
            ?>
            <h1>HTML Formulier</h1>
            <form action="welcome.php" method="POST">
                <input type="text" id="name" name="name" placeholder="Naam" value=<?php echo $name ?>>
                <span class="error"> <?php echo $nameReq;?></span>
                <br>
                <input type="email" id="email" name="email" placeholder="Email" value=<?php echo $email ?>>
                <span class="error"> <?php echo $emailReq;?></span>
                <br>
                <input type="submit" value="Submit">
            </form> 
        <?php
        }
        ?>       
    </div>   
</body>
</html>