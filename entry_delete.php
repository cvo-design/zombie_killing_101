<!DOCTYPE html>

<?php
require "dConnect.php";  //Database and Session_Start

// Don't allow users to see this page without being logged in
if(!isset($_SESSION['LoginStatus']))
{
    header("Location: index.php");
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Zombie Killing 101</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="style/blog.css" rel="stylesheet">
</head>
<body>
<?php
include "menu.php";
?>
<div class="row">

    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h3>Manage your blog articles</h3>

            <?php
            // Do on third pass
            If (isset($_POST['blog_delete']))
            {
                //echo("BlogID: ".$_POST['editID']);  // For testing

                // Use ArticleID to delete the selected blog
                $sql_delete = "DELETE FROM blog "
                    ."WHERE blog_id ='".$_POST['edit_ID']."'";

                //echo ("<br>$sql_delete<br>"); //For testing

                $result = $pdo->query($sql_delete);

                if ($result->rowCount() > 0)  //If DELETE was successful, display message
                {
                    echo ('<fieldset class = "message"');
                    echo ('<p>Article was deleted.</p>');
                    echo ('</fieldset>');
                }
            } // Now return to list of user's blogs, less the deleted one
            // ---- Show user's blogs on first pass. Allow deletion with Delete button
            If (!isset($_POST['delete']))
            {
                If (isset($_SESSION['Admin']))   //Allow administrator to view all articles
                {
                    $sql_select = "SELECT tb_user.firstName, "
                        . "tb_user.lastName, blog.* "
                        . "FROM blog INNER JOIN tb_user "
                        . "ON blog.user_ID=tb_user.user_ID";
                    //echo ("<br>$sql_select<br>"); //For testing
                }
                else  // Allow user only to manage only their own articles
                {
                    $sql_select = "SELECT tb_user.firstName, "
                        . "tb_user.lastName, blog.* "
                        . "FROM blog LEFT JOIN tb_user "
                        . "ON blog.user_ID=tb_user.user_ID "
                        . "And blog.user_ID='".$_SESSION['user_ID']."'";
                }
                //echo ("<br>$sql_select<br>"); //For testing
                $result = $pdo->query($sql_select);

                // Check to see if articles were returned
                if ($result->rowCount() > 0)
                {
                    while ($row = $result->fetch()) // Display articles in a form
                    {
                        echo ('<form method="POST" action="entry_delete.php">');
                        echo ('<fieldset class = "article">');
                        echo ("<b>Title: </b>".$row['title']."<br>");
                        echo ("<b>Author: </b>".$row['firstName']." ".$row['firstName']."<br>");
                        echo ("<b>Date Added: </b>".$row['blog_date']."<br>");
                        echo ("<b>Article: </b>".$row['content']."<br>");
                        echo ('</fieldset>');
                        // Save articleID as POST so it can be used as key in DELETE statement
                        echo ('<input type="hidden" name="edit_ID" value="'.$row['blog_id'].'">');
                        echo ('<input type="submit" class="button" name="delete" value="Delete">');
                        echo ('</form>');
                        echo ('<br><br>');
                    }
                } else
                {
                    echo ('Sorry. No articles found under your user login.<br>');
                }
            }
            else  // --- Display article to be delete and get confirmation (Second Pass) ----
            {
                //echo("BlogID: ".$_POST['editID']);  // For testing

                // Find article that was picked for deletion
                $sql_select = "SELECT tb_user.firstName, "
                    . "tb_user.lastName, blog.* "
                    . "FROM blog LEFT JOIN tb_user "
                    . "ON blog.user_ID=tb_user.user_ID "
                    . "And blog.user_ID='".$_SESSION['edit_ID']."'";
                //echo ("<br>$sql_select<br>"); //For testing

                $result = $pdo->query($sql_select);
                // Display the article to be deleted
                while ($row = $result->fetch())
                {
                    echo ('<form method="POST" action="entry_delete.php">');
                    echo ('<fieldset class = "article">');
                    echo ("<b>Title: </b>".$row['title']."<br>");
                    echo ("<b>Author: </b>".$row['firstName']." ".$row['firstName']."<br>");
                    echo ("<b>Date Added: </b>".$row['blog_date']."<br>");
                    echo ("<b>Article: </b>".$row['content']."<br>");
                    echo ('</fieldset>');
                    echo ('<input type="hidden" name="edit_ID" value="'.$row['blog_id'].'">');
                    // Show confirm buttons for whether to delete or cancel
                    echo ('Are you sure you want to delete? ');
                    echo ('<input type="submit" name="blog_delete" value="Okay">');
                    echo ('&nbsp;&nbsp;&nbsp;');
                    echo ('<input type="submit" class="button" name="cancel" value="Cancel">');
                    echo ('</form>');
                    echo ('<br><br>');
                }
            }  // Go to confirmation for deletion (second pass)
            ?>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>

<script src="js/owl.carousel.js"></script>

<!-- Javascripts
================================================== -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

