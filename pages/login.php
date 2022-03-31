<?php
    session_start();
    if(isset($_SESSION["login"])) {
        header("Location: dashboard.php");
        exit;
    }
    require('../utilities/functions.php');
    if(isset($_POST['submit'])) {
        // $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])) {
                $_SESSION["login"] = true;
                header("Location: dashboard.php");
                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/4ce69e75c1877262e96a94524eade57d.jpg" />
    <link href="../css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2af2ecb3a0.js" crossorigin="anonymous"></script>
    <title>Bold. - Products</title>
</head>
<body id="login">
    <div class="container d-flex align-items-center justify-content-center my-5">
        <div class="row">
            <div class="login-wrapper  d-flex align-items-center justify-content-center">
                <div class="login-text">
                    <div class="logo">
                        <span><i class="fa-solid fa-bold"></i></span>
                        <span>Bold<span>.</span></span>
                    </div>

                    <?php if(isset($error)): ?>
                        <div class="alert-danger">
                            <strong>Error!</strong> Invalid username or password.
                        </div>
                    <?php endif; ?>
                    <h1>Sign In</h1>
                    <p>Something interesting waitin for you!</p>

                    <form action="" method="post" class="d-flex align-items-center justify-content-center flex-column" id="form_login">
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <div class="input d-flex align-items-center justify-content-center">
                                <input type="email" placeholder="name@abc.com" id="email" name="email">
                                <i class="fa-solid fa-at"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="password">Password</label>
                            <div class="input d-flex align-items-center justify-content-center">
                                <input type="password" placeholder="at least 8 characters" id="password" name="password">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                        <!-- </div><div class="check">
                            <input type="checkbox" id="agree" name="agree">
                            <span>Remember me</span>
                        </div> -->
                        <button type="submit" class="btn_submit" id="submit" name="submit">Login</button>
                        <span class="extra-line">
                            <span>Don't have an account?</span>
                            <a href="register.php">Sign Up</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script>
    $(function() {
        $("#navbar-placeholder").load("../components/navbar.php");
        $("#list").load("../components/suggestion.php");
    });
</script> -->