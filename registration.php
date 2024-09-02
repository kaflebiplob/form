<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regristration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        // print_r($_POST)
        if (isset($_POST["register"])) {
            // echo "Yo have regristered";
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"];

            $encryptPassword = password_hash($password, PASSWORD_BCRYPT);
            $errors = array();
            if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
                // echo "all feilds arfe required";
                array_push($errors, "All feilds are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Enter a valid email");
            }
            if ($password !== $confirmPassword) {
                array_push($errors, "Password do no match");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be 8 character long");
            }
            require_once "database.php";

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connection, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Email already exists");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {

                    echo "<div class='alert alert-danger'>{$error}</div>";
                }
            } else {

                $sql = "INSERT INTO users(name, email, password) VALUES( ?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
                if ($stmtPrepare) {
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $encryptPassword);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Registred succesfully</div>";
                } else {
                    die("somenthing went wrong");
                }
            }
        }
        ?>
        <h3 class="form-group"> Registration form</h3>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="enter your name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="enter your email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="enter your password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="re enter your password">
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary" name="register" value="register">
            </div>

        </form>
    </div>

</body>

</html>