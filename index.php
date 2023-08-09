<?php
$insert = false;
if(isset($_POST['name'])){
// Set Connection Variables
$server = "localhost";
$username = "root";
$password = "";

// Create a Connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if(!$con){
    die("The connection to this server failed because of " . mysqli_connect_error());
}
// echo "Success connecting to the DB";

// Collect Post Variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
// echo $sql;

// Execute the Query
if($con->query($sql) == TRUE){
    // Flag for successful insertion
    $insert = true;
    // echo "Successfully inserted";
}
else{
    echo "Error: $sql <br> $con->error";
}

// Close the Database Connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Background">
    <div class="container">
        <h1>Welcome to Dummy Travel Form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy that you are joining us in the trip.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name: ">
            <input type="number" name="age" id="age" placeholder="Enter your age: ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender: ">
            <input type="email" name="email" id="email" placeholder="Enter your email: ">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number: ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter additional information here: "></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>