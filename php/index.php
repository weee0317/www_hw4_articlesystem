<?php session_start();
include('connect.php');
//if anonymous
if (empty($_SESSION['username'])) {
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="breadcrumb">
        <div class="container-fluid">
            <a class="navbar-brand navbar-color" href="#">Article Page</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Article</a></li>
                    <li class="breadcrumb-item"><a href="login.php">Log in</a></li>
                    <li class="breadcrumb-item"><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
//if log in
if (!empty($_SESSION['username'])) {
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="breadcrumb">
        <div class="container-fluid">
            <a class="navbar-brand navbar-color" href="#">Article Page</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Article</a></li>
                    <li class="breadcrumb-item"><a href="main_page.php">Main Page</a></li>
                    <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <div class="d-flex justify-content-center">

        <div class="container panel panel-default table-responsive">
            <table class="table font-monospace table-hover">
                <thead>
                    <tr>
                        <th scope="row" colspan="3" style="padding: 10px;">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="search-articles" id="floatingInput" placeholder="Search" aria-label="search articles">
                                <label for="floatingInput">Search</label>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row" class="">Author</th>
                        <th scope="row">Title</th>
                        <th scope="row">Time</th>
                    </tr>
                </thead>
                <tbody class="js-tbody">
                </tbody>
            </table>
        </div>
        <!-- <script src="../js/main_page.js"></script> -->
        <script src="../js/index.js"></script>
    </div>
</body>


</html>