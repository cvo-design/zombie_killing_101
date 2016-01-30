<?php
require "connection.php";
print_r($_POST);

if (isset($_POST['email'])) {
    $pwd = $_POST['password'];

    echo ('<a href="login.php">Login</a><a href="add_user.php">New User</a> ');
///////////
    $sql_check = "Select email From user_tbl Where email Like :checkEmail";


    $checkEmail = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    $sql_checkh = $pdo->prepare($sql_check);
    $sql_checkh->bindparam(":checkEmail",$checkEmail);
    $checkrow = $sql_checkh->execute();

    $checkrow = $sql_checkh->fetch();

    if($sql_checkh->rowCount()>0)
    {
        unset($_POST);
        header("Location: errorMessage.php");
    }
//////////



    $sql_stmt = "INSERT INTO user "
        . "(firstname, "
        . "lastname, "
        . "email, "
        . "password, "
        . "address, "
        . "city, "
        . "state, "
        . "zip) "
        . "VALUES "
        . "(:firstname, "
        . ":lastname, "
        . ":email, "
        . ":password, "
        . ":address, "
        . ":city, "
        . ":state, "
        . ":zip)";

    //prepare the sql statement
    $sqlh = $pdo->prepare($sql_stmt);

    //sanitize the input
    $in_firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $in_lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $in_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $in_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $in_address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $in_city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $in_state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $in_zip = filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
    //hash the password
    $in_password = password_hash($in_password, PASSWORD_DEFAULT);

    //bind the parameters
    $sqlh->bindparam(":firstname", $in_firstname);
    $sqlh->bindparam(":lastname", $in_lastname);
    $sqlh->bindparam(":email", $in_email);
    $sqlh->bindparam(":password", $in_password);
    $sqlh->bindparam(":address", $in_address);
    $sqlh->bindparam(":city", $in_city);
    $sqlh->bindparam(":state", $in_state);
    $sqlh->bindparam(":zip", $in_zip);

    $sqlh->execute();



    echo '<div id="newuserstatus">
        <p>New User Was Successfully entered</p>
        </div>';


}
else {


    echo ("
   ");

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
    <title>Login</title>
<body>
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="add_user.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Last Name" name="lastname" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="pass" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Address" name="address" type="text" value="">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="City" name="city" type="text" value="">
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
</body>
</html>