<?php
require ('dConnect.php');

if (isset($_POST)) {

    if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'Delete') {
            $cID = filter_var($_POST['blog_id'], FILTER_SANITIZE_STRING);
            $sql_delete = "DELETE FROM blog WHERE blog_id = " . $cID;
            $pdo->exec($sql_delete);
        }

        if (isset($_POST)) {

            if (!empty($_POST['action'])) {
                if ($_POST['action'] === 'Delete') {
                    $cID = filter_var($_POST['blog_id'], FILTER_SANITIZE_STRING);
                    $sql_delete = "DELETE FROM blog WHERE blog_id = " . $cID;
                    $pdo->exec($sql_delete);
                }

                if ($_POST['action'] === 'Edit')
                {
                    //NOTE: you cannot send any output to the current page (Display_Edit.php
                    //You must go directly to the new page.
                    $_SESSION['blogEditID'] = filter_var($_POST['blog_id'], FILTER_SANITIZE_NUMBER_INT);
                    header("Location:data_edit.php");
                }

            }


        }







       $sql_selectEdit = "SELECT blog.title, blog.summary, blog.content, blog.blog_date, blog.blog_id, blog.user_ID "
        . " FROM tb_user LEFT JOIN blog ON tb_user.user_ID = blog.user_ID "
        . " ORDER BY blog_date";


        $sql_selectEdit = "SELECT * "
            . " FROM blog "
            . " ORDER BY title";

        $result_edit = $pdo->query($sql_selectEdit);

        ?>

        <html>
        <head>
            <title>Your Posts</title>
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
        include 'menu.php';
        ?>


        <table border="1">
            <thead>
            <tr>
                <th>Title</th>
                <th>Summary</th>
                <th>Content</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result_edit->fetch()) {
                echo('<tr>'
                    . '<td>' . $row['title'] . "</td>"
                    . "<td>" . $row['summary'] . "</td>"
                    . "<td>" . $row['content'] . "</td>"
                    . "<td>" . $row['blog_date'] . "</td>"
                    . '<td><form method="POST" action="your_posts.php">'
                    . '<input type="hidden" name="user_ID" value="'
                    . $row['user_ID'] . '"/>'
                    . '<input type="submit" value="Edit" name="action" />&nbsp;&nbsp;'
                    . '<input type="submit" value="Delete" name="action" />'
                    . '</form></td></tr>');
            }
            ?>

            </tbody>
        </table>

        </body>
        </html>
        <?php
        if ($_POST['action'] === 'Edit')
        {
            //NOTE: you cannot send any output to the current page (Display_Edit.php
            //You must go directly to the new page.
            $_SESSION['blogEditID'] = filter_var($_POST['blog_id'], FILTER_SANITIZE_NUMBER_INT);
            header("Location:data_edit.php");
        }

    }


}







$sql_selectEdit = "SELECT title, summary, content, blog_date, blog_id, user_ID "
    . " FROM blog "
    . " ORDER BY blog_date";


$sql_selectEdit = "SELECT * "
    . " FROM blog "
    . " ORDER BY blog_date";

$result_edit = $pdo->query($sql_selectEdit);

?>

<html>
<head>
    <title>Your Posts</title>
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
include 'menu.php';
?>


<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Summary</th>
        <th>Content</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result_edit->fetch()) {

        echo('<tr>'
            . '<td>' . $row['title'] . "</td>"
            . "<td>" . $row['summary'] . "</td>"
            . "<td>" . $row['content'] . "</td>"
            . "<td>" . $row['blog_date'] . "</td>"
            . '<td><form method="POST" action="your_posts.php">'
            . '<input type="hidden" name="blog_id" value="'
            . $row['blog_id'] . '"/>'
            . '<input type="submit" value="Edit" name="action" />&nbsp;&nbsp;'
            . '<input type="submit" value="Delete" name="action" />'
            . '</form></td></tr>');
    }
    ?>

    </tbody>
</table>

</body>
</html>