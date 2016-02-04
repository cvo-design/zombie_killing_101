<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden
 * Date: 1/29/2016
 * Time: 11:16 PM
 */
?>

<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <title>Blog Post</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>
<body background="zombie.jpg">

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Blog Post</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="blogform" method="post" action="insert.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Title" name="title" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Summary" name="summary" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                Content:
                                <br>
                                <textarea name="content"  id="content" rows="10" cols="35">

                                </textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Date" name="blog_date" type="date" autofocus>
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Post" name="register" >

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body background="zombie.jpg">

</html>