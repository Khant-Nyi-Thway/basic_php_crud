<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php basic crud</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>
body {
    padding: 50px;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Posts list</div>
                            </div>
                            <div class="col-md-6">
                                <a href="post-create.php" class="btn btn-primary float-right">+ Add New</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <?php if(isset($_SESSION['successMsg'])): ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php 
                                    echo $_SESSION['successMsg'];
                                    unset($_SESSION['successMsg']);
                                ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php endif ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Descrption</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM posts";
                                    $results = mysqli_query($db,$query);

                                    foreach($results as $row)
                                        {
                                ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                        <a href="post-edit.php?postId=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="index.php?post_id_to_delete=<?php echo $row['id']; ?>" onclick="return confirm('A U sure?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php
                                        } 
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['post_id_to_delete'])){
            $post_id_to_delete = $_GET['post_id_to_delete'];

            $query = "DELETE FROM posts WHERE id=$post_id_to_delete";

            $_SESSION['successMsg'] = "A post deleted successfully!";
            mysqli_query($db,$query);
            header("location:index.php");
        }
        ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>