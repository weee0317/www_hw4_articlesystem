<?php
session_start();
if ($_POST['cancel']) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    //connect to the database
    include('connect.php');

    $email = "";

    //if the login button is clicked
    if (isset($_POST['login-submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = array();


        //ensure that form fields are filled properly
        if (empty($email) || empty($password)) {
            array_push($errors, "empty fields error.");
            echo '
                    <script type="text/javascript">

                    $(document).ready(function(){

                        Swal.fire({
                            icon: "error",
                            title: "Login errors!",
                            text: "Your email and password cannot be empty.",
                            showConfirmButton: true,
                        }).then(function () {
                            window.location.href = "login.php";
                        }); 
                    });

                    </script>
                ';
        }
        //login success
        if (count($errors) == 0) {
            $password = md5($password);
            $row = mysqli_query($link, "select * from registration_hw4 where email='$email' && password='$password'");

            if (mysqli_num_rows($row) == 1) {
                //log user in
                $user = mysqli_fetch_assoc($row);
                $_SESSION['username'] = $user['username'];
                // header('location:index.php');
                echo '
                <script type="text/javascript">

                $(document).ready(function login_failed() {

                    Swal.fire({
                        icon: "success",
                        title: "Login success!",
                        text: "Welcome!' . $_SESSION['username'] . '",
                        showConfirmButton: true,
                    }).then(function () {
                        window.location.href = "index.php";
                    });
                });

                </script>
                ';
            }
            //login failed
            else {
                array_push($errors, "Wrong email/password combination.");
                echo '
                        <script type="text/javascript">

                        $(document).ready(function login_failed() {

                            Swal.fire({
                                icon: "error",
                                title: "Login failed!",
                                text: "Incorrect email or password.",
                                showConfirmButton: true,
                            }).then(function () {
                                window.location.href = "login.php";
                            });
                        });

                        </script>
                    ';
            }
        }
    }
    ?>
</body>