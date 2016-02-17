<?php
require "dConnect.php";

if (isset($_POST['userName'])) {
    $pwd = $_POST['passWord'];


    //create sql statement
    $sql_stmt = "INSERT INTO tb_user "
        . "(firstName, "
        . "lastName, "
        . "email, "
        . "passWord, "
        . "address, "
        . "city, "
        . "state, "
        . "zip) "
        . "VALUES "
        . "(:firstName, "
        . ":lastName, "
        . ":email, "
        . ":passWord, "
        . ":address, "
        . ":city, "
        . ":state, "
        . ":zip) ";

    //prepare the sql statement
    $sqlh = $pdo->prepare($sql_stmt);

    //sanitize the input
    $in_firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $in_lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $in_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $in_passWord = filter_var($_POST['passWord'], FILTER_SANITIZE_STRING);
    $in_address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $in_city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $in_state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $in_zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);

    //hash the password
    /*
     * NOTE THAT password_hash should go into a field that
     * is 255 in length.  It also includes a builtin random salt
     * and it currently uses BCrypt.
     */
    $in_passWord = password_hash($in_passWord, PASSWORD_DEFAULT);

    //bind the parameters
    $sqlh->bindparam(":firstName", $in_firstName);
    $sqlh->bindparam(":lastName", $in_lastName);
    $sqlh->bindparam(":email", $in_email);
    $sqlh->bindparam(":passWord", $in_passWord);
    $sqlh->bindparam(":address", $in_address);
    $sqlh->bindparam(":city", $in_city);
    $sqlh->bindparam(":state", $in_state);
    $sqlh->bindparam(":zip", $in_zip);

    //excecute the sqlstatement
    $sqlh->execute();

    header('Location: login.php');


}
else {


    echo('<html>
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
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="newUserReg.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="First Name" name="firstName" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Last Name" name="lastName" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="passWord" type="passWord" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Address" name="address" type="test" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="City" name="city" type="city" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="State" name="state" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Zip" name="zip" type="text" value="">
                            </div>



                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >

                        </fieldset>
                    </form>
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
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

?>



