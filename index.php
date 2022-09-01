<?php
$insert=false;
if(isset($_POST['name'])){ 
    $server="localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("Failed".mysqli_connect_error());
    }
    // echo "success";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = " INSERT INTO `trip`.`t_trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql)===true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel from</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIMT">
    <div class="container">
        <h1>WELCOME TO TRAVEL FORM OF IIMT COLLEGE OF ENGINEERING</h1>
        <p>Enter your details</p>
        <?php
        if($insert == true){
        echo "<p class='sub'>Thanks for submiting the form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email"  placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <br>
            <!-- <button class="btn">Reset</button> -->
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</html>