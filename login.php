<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connection,$sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($user){
                if(password_verify($password, $user["password"])){
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class'alert alert-danger'>Password doesnot match</div>"; 
                }

            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <h3 class="form-group">Login Form</h3>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="enter your email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="enter your password">
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary" name="login" value="login">
            </div>

        </form>
    </div>

</body>

</html>