<?php
$name_err = $age_err = $gender_err = $email_err = "";
$name = $age = $gender = $address = $email = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
        echo $nameErr . '<br><br>' ;
    }else{
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            if (!preg_match("/^[a-zA-Z]+$/" , $name)){
                echo 'only later' . '<br>';
            }
        }
    }

    if (empty($_POST['age'])) {
        $age_err = "Age is required";
        echo $age_err . '<br><br>' ;
    }else{
        if (isset($_POST['submit'])){
            $age = $_POST['age'];
            if(!($age > 10 && $age < 30)){
                echo ' Age must only contain numbers between 10 and 30' . '<br>';
            }
            if(!preg_match("/[0-9]+/" , $age)){
                echo 'Age must only contain numbers' . '<br>';
            }
        }
    }


    if (empty($_POST['email'])) {
        $email_err = "Email is required" ;
        echo $email_err . '<br><br>';
    }else{
        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            if(!preg_match("/[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]/" , $email)){
                echo "must be email syntax" . '<br>';
            }
        }
    }
    $gender =$_POST['gender'];
    $address = $_POST['address'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>120200577</title>
</head>
<body>
    <form action="" method="post">
        Name : <input type="text" name="name"><br><br>
        Age : <input type="text" name="age"><br><br>
        Gender : <input type="radio" name="gender" value="male" checked>Male
                <input type="radio" name="gender" value="female">Female   <br><br>
        Address : <input type="text" name="address"><br><br>
        Email : <input type="text" name="email"> <br><br>
                <input type="submit" name="submit" >
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass_php";

$con = new mysqli($servername , $username , $password , $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else {
    echo "Connected successfully";
}

// $sql = "CREATE DATABASE ass_php";
// if ($con->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $con->error;
// }

// $createtable = "CREATE TABLE person (
//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(30) NOT NULL ,
//     age INT(2) NOT NULL,
//     gender VARCHAR(30) NOT NULL,
//     address VARCHAR(30) NOT NULL,
//     email VARCHAR(50)NOT NULL
//     )";

// if ($con->query($createtable) === TRUE) {
//     echo "Table person created successfully";
// } else {
//     echo "Error creating table: " . $con->error;
// }

// $ins_value =$con->prepare ("INSERT INTO person ( name , age , gender , address , email) VALUES (? , ? , ? , ? , ?)");
// $ins_value->bind_param("sisss", $name , $age , $gender , $address , $email);
// $ins_value->execute();

$ins_value ="INSERT INTO person ( name , age , gender , address , email ) VALUES ('$name' , '$age' , '$gender' , '$address' , '$email')";

if ($con->query($ins_value) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ins_value . "<br>" . $con->error;
}


?>