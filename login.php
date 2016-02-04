<?php
require "connection.php";
if (isset($_POST['email'])) {
    echo "Login true <br><br>";
print_r($_POST);

    $sql_li_stmt = "Select email, password "
        . "From user "
        . "where email = :email";
    $sqlh_li = $pdo->prepare($sql_li_stmt);

    $x_userName = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

    $sqlh_li->bindParam(":email", $x_userName);
    $sqlh_li->execute();


    $li_result = $sqlh_li->fetch();
    //print_r($li_result);
    //print_r($li_result['password'] . "<br><br>");
   // print_r($li_result['email'] . "<br><br>");

    $hash = $li_result['password'];
    echo $hash;
    print_r($_POST['password']);
    if (password_verify($_POST['password'], $hash)) {
        echo 'Password is valid!';

        $_SESSION['LoginStatus'] = true;
    } else {
        echo 'Invalid password.';
    }

}


?>



    <html>
    <head lang="en">
        <meta charset="UTF-8">
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
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
        <title>Login</title>
    </head>
    <style>
        .login-panel {
            margin-top: 150px;

    </style>

    <body>


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                                <div class="form-group"  >
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                                <!-- Change this to a button or input when using this as a form -->
                                <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>

    </html>

