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
        <h1 class="form-group"> Registration form</h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="enter your name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="password" placeholder="enter your password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="confirm_password" placeholder="re enter your password">
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary"  name="register" value="register">
            </div>

        </form>
    </div>

</body>

</html>