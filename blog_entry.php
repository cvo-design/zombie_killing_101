<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden, Sonesta Billow
 * Date: 2/19/2016
 * Time: 6:33 AM
 */
require "dConnect.php";

if (isset($_POST['title'])) {

//write the sql statement with placeholders
    $sql_input = "INSERT INTO  blog "
        . "(title, "
        . "summary, "
        . "content, "
        . "blog_date) "
        . "VALUES "
        . "(:title, "
        . ":summary, "
        . ":content, "
        . ":blog_date)";


//prepare the squel statement
    $sqlb_input = $pdo->prepare($sql_input);


//sanitize data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $summary = filter_var($_POST['summary'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $blog_date = filter_var($_POST['blog_date'], FILTER_SANITIZE_STRING);

//bind parameters
    $sqlb_input->bindparam(":title", $title);
    $sqlb_input->bindparam(":summary", $summary);
    $sqlb_input->bindparam(":content", $content);
    $sqlb_input->bindparam(":blog_date", $blog_date);


    $sqlb_input->execute();
    header('Location: index.php');
}
else
{
    echo('<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <title>Registration</title>
    </head>
<style>
    .login-panel {
        margin-top: 150px;

</style>
<body>
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Blog Post</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="blogform" method="POST" action="blog_entry.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Title" name="title" id="title" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Summary" name="summary" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                Content:
                                <br>
                                <textarea input class="form-control" name="content"  id="content" rows="10" cols="35" autofocus>

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
    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>');
}
