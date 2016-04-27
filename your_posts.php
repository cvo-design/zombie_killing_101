<?php
require ('db_connect.php');

if (isset($_POST)) {

    if (!empty($_POST['action'])) {
        if ($_POST['action'] === 'Delete') {
            $cID = filter_var($_POST['car_id'], FILTER_SANITIZE_STRING);
            $sql_delete = "DELETE FROM tb_cars WHERE car_id = " . $cID;
            $pdo->exec($sql_delete);
        }
        require ('db_connect.php');

        if (isset($_POST)) {

            if (!empty($_POST['action'])) {
                if ($_POST['action'] === 'Delete') {
                    $cID = filter_var($_POST['car_id'], FILTER_SANITIZE_STRING);
                    $sql_delete = "DELETE FROM tb_cars WHERE car_id = " . $cID;
                    $pdo->exec($sql_delete);
                }

                if ($_POST['action'] === 'Edit')
                {
                    //NOTE: you cannot send any output to the current page (Display_Edit.php
                    //You must go directly to the new page.
                    $_SESSION['carEditID'] = filter_var($_POST['car_id'], FILTER_SANITIZE_NUMBER_INT);
                    header("Location:data_edit.php");
                }

            }


        }







        $sql_selectEdit = "SELECT FirstName, LastName, Make, Model, c_Year, car_pix, car_id "
            . " FROM tb_cars "
            . " ORDER BY FirstName";


        $sql_selectEdit = "SELECT * "
            . " FROM tb_cars "
            . " ORDER BY FirstName";

        $result_edit = $pdo->query($sql_selectEdit);

        ?>

        <html>
        <head>
            <title></title>
        </head>
        <body>
        <?php
        include 'menu.php';
        ?>


        <table border="1">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Car Pic</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result_edit->fetch()) {
                echo('<tr>'
                    . '<td>' . $row['FirstName'] . "</td>"
                    . "<td>" . $row['LastName'] . "</td>"
                    . "<td>" . $row['Make'] . "</td>"
                    . "<td>" . $row['Model'] . "</td>"
                    . "<td>" . $row['c_Year'] . "</td>"
                    . '<td><img src="pics//' . $row['car_pix']. '" width="50px"></td>'
                    . '<td><form method="POST" action="edit_display">'
                    . '<input type="hidden" name="car_id" value="'
                    . $row['car_id'] . '"/>'
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
            $_SESSION['carEditID'] = filter_var($_POST['car_id'], FILTER_SANITIZE_NUMBER_INT);
            header("Location:data_edit.php");
        }

    }


}







$sql_selectEdit = "SELECT FirstName, LastName, Make, Model, c_year, car_pix, car_id "
    . " FROM tb_cars "
    . " ORDER BY FirstName";


$sql_selectEdit = "SELECT * "
    . " FROM tb_cars "
    . " ORDER BY FirstName";

$result_edit = $pdo->query($sql_selectEdit);

?>

<html>
<head>
    <title></title>
</head>
<body>
<?php
include 'menu.php';
?>


<table border="1">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Car Pics</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result_edit->fetch()) {

        echo('<tr>'
            . '<td>' . $row['FirstName'] . "</td>"
            . "<td>" . $row['LastName'] . "</td>"
            . "<td>" . $row['Make'] . "</td>"
            . "<td>" . $row['Model'] . "</td>"
            . "<td>" . $row['c_Year'] . "</td>"
            . '<td><img src="pics//' . $row['car_pix']. '" width="50px"></td>'
            . '<td><form method="POST" action="edit_display.php">'
            . '<input type="hidden" name="car_id" value="'
            . $row['car_id'] . '"/>'
            . '<input type="submit" value="Edit" name="action" />&nbsp;&nbsp;'
            . '<input type="submit" value="Delete" name="action" />'
            . '</form></td></tr>');
    }
    ?>

    </tbody>
</table>

</body>
</html>