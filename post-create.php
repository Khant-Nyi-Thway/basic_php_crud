<?php 
    session_start();
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
<?php

    require "connect.php";
    $title = "";
    $titleError = "";
    $descError = "";

    if(isset($_POST['create_post_button'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        //condition for error no input
        if(empty($title)){
            $titleError = "The title field is required";
        }
        if(empty($desc)){
            $descError = "The description field is required";
        }

        if(!empty($title) && !empty($desc)){
            $query = "INSERT INTO posts(title,description) VALUES('$title','$desc')";
            mysqli_query($db,$query);

            $_SESSION['successMsg'] = "A post created successfully!";
            header('location:index.php');
        }


    }

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Posts Creation Form</div>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-primary float-right">Back</a>
                            </div>
                        </div>
                        
                    </div>
                    <form action="post-create.php" method="POST">
                        <div class="card-body">
                        

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" placeholder="Enter post title" 
                                class="form-control <?php if($titleError != ''): ?> is-invalid <?php endif ?>" value="<?php echo $title; ?>">
                                <span class="text-danger"><?php echo $titleError ?></span>
                            </div>

                            <div class="form-group">
                                <label for="">Descrption</label>
                                <textarea name="description" cols="30" rows="2" placeholder="entre description" 
                                class="form-control <?php if($descError != ''): ?> is-invalid <?php endif ?>" value="<?php echo $desc; ?>"></textarea>
                                <span class="text-danger"><?php echo $descError ?></span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" name="create_post_button" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



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