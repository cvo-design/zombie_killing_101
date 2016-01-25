<?php
require "db_connection.php";
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



    $sql_stmt = "INSERT INTO user_tbl "
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


    echo "        <div id='newuser' >
            <form method='POST' action='add_user.php'>
                <table >
                    <tbody>
                        <tr>
                            <td colspan=2>New User</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td><input type='text' name='firstname' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type='text' name='lastname' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td><input type='text' name='email' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type='password' name='password' value='' size='25'/></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type='password' name='password' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type='text' name='address' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input type='text' name='city' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><input type='text' name='state' value='' size='25' /></td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td><input type='text' name='zip' value='' size='25' /></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type='submit' value='Enter' name='newusersubmit' /></td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>";

}

?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
</head>
<body>
</body>
</html>