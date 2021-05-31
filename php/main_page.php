<?php
session_start();
include('connect.php');
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/main_page.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="breadcrumb">
        <div class="container-fluid">
            <a class="navbar-brand navbar-color" href="#">Main Page</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item active bg-light font-monospace" aria-current="page"><a href="index.php">Article</a></li></a>
                    <li class="breadcrumb-item bg-light font-monospace"><a href="logout.php">Log out</li></a>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="user bg-light shadow-sm p-3 mb-5 bg-body rounded">

                    <div class="text-center">
                        <span class="fas fa-user-circle fa-8x"></span>
                    </div>
                    <h2 class="text-center js-username"><?php echo $username; ?></h2>
                    <!--start modal-->
                    <div class="text-center">
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#Create-Modal" data-whatever="@mdo">POST</button>
                    </div>
                    <div class="modal fade" id="Create-Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content text-start">
                                <div class="modal-header text-start">
                                    <h5 class="modal-title" id="ModalLabel">Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group  text-start">
                                            <label for="title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                        <div class="form-group  text-start">
                                            <label for="content" class="col-form-label">Content:</label>
                                            <textarea class="form-control" id="content" name="content" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="create" id="create" data-dismiss="modal"></br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--end modal-->
                </div>
                <div class="row text-center">
                    <div class="col lottery-area shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="information">
                            <h1>Information</h1>
                        </div>
                        <div class="col">
                            <div class="ticket">Tickets:</div>
                        </div>
                        <div class="col">
                            <div class="account">Account:</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-8">
                <div class="article shadow-sm p-3 mb-5 bg-body rounded">
                    <h2>Article</h2>
                </div>
                <div class="article-area shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="modal fade" id="Edit-Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content text-start">
                                <div class="modal-header text-start">
                                    <h5 class="modal-title" id="ModalLabel">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group  text-start">
                                            <label for="edit-title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="edit-title" name="edit-title" required>
                                        </div>
                                        <div class="form-group  text-start">
                                            <label for="edit-content" class="col-form-label">Content:</label>
                                            <textarea class="form-control" id="edit-content" name="edit-content" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="update" id="update" data-dismiss="modal"></br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../js/main_page.js"></script>
</body>

</html>