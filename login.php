<?php
require "dConnect.php";



if (isset($_POST['email'])) {
    echo "Login true <br><br>";

    $sql_li_stmt = "Select email, passWord, user_ID "
        . "From tb_user "
        . "where email = :email";
    $sqlh_li = $pdo->prepare($sql_li_stmt);

    $x_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

    $sqlh_li->bindParam(":email", $x_email);
    $sqlh_li->execute();


    $li_result = $sqlh_li->fetch();

    print_r($li_result['passWord'] . "<br><br>");
    print_r($li_result['email'] . "<br><br>");

    $hash = $li_result['passWord'];


    if (password_verify($_POST['passWord'], $hash)) {

        //echo 'Password is valid!';

        $_SESSION['LoginStatus'] = true;
        $_SESSION['user_ID'] = $li_result['user_ID'];
        //$_SESSION['user_ID'] = 7;
        header("Location: blog_entry.php");

        echo '<script>alert('.$_SESSION ['user_ID'].'</script>';
    } else {
        echo '<script>alert("Password Is INVALID")</script>';
    }

}
?>



<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <title>Log In</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    .btn-success
    {
        background-color: red;
    }

    .panel-success>.panel-heading
    {
        color: red;
    }
    .container
    {
    border: 3px solid red;}
    }

</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="login.php">
                        <fieldset>

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="passWord" type="passWord" value="">
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Enter" name="register" >
                            <a class="btn btn-lg btn-success btn-block" href="index.php">Home</a>

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

</html>
