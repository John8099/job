<?php
include "../back/connect.php";
session_start();
if (!isset($_SESSION["id"])) {
    header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant List</title>
    <style>
        body{
            background-color: lightgray;
        }
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            padding: 10px;
        }

        th,
        td {
            border: 1px solid darkslategray;
            padding-bottom: 50px;
            padding-right: 0px;
            border-width: 3px;
            font: 17px Georgia, serif;

        }

        .min{
            border: 6px solid darkslategray;
            margin-top: 10px;
            border-right: transparent;
            border-bottom: transparent;
            border-left: transparent;
        }
        .mon{
            border: transparent;
            margin-top: 100px;
            padding-left: 90px;
        }
        .man{
            margin-left: 800px;
            border: transparent;
            font: 25px Georgia, serif;
            padding-bottom:50px;

        }
    </style>
</head>

<body>
    <?php
    include_once("admin-nav.php");
    ?>
    <div class="min">
        <div class="mon">
            <div class="man">
        <label>Applicant List</label>
        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search">
    </div>
        <table id='myTable'>
            <thead>
                <tr>
                    <th style="font-weight: bold;">#</th>
                    <th style="font-weight: bold;">Fullname</th>
                    <th style="font-weight: bold;">Birthday</th>
                    <th style="font-weight: bold;">Age</th>
                    <th style="font-weight: bold;">Address</th>
                    <th style="font-weight: bold;">Contact Number</th>
                    <th style="font-weight: bold;">Expertise</th>
                    <th style="font-weight: bold;">Username</th>
                    <th style="font-weight: bold;">CreateAt</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = $con->query("SELECT * FROM users u LEFT JOIN category c ON u.expertise = c.cat_id WHERE u.usertype ='applicant'");
                $count = 1;
                while ($res = $q->fetch_object()) {
                ?>
                    <tr class="tr">
                        <td><?php echo $count ?></td>
                        <td><?php echo strtoupper($res->fname[0]) . substr($res->fname, 1, strlen($res->fname) - 1) . " " . strtoupper($res->lname[0]) . substr($res->lname, 1, strlen($res->lname) - 1);;  ?></td>

                        <td><?php echo date("M d, Y", strtotime(str_replace('-', '/', $res->bday))) ?></td>
                        <td>
                            <?php
                            $age = date("Y") - date("Y", strtotime(str_replace('-', '/', $res->bday)));
                            if ($age == 0) {
                                echo "";
                            } else {
                                echo $age;
                            }
                            ?>
                        </td>

                        <td><?php echo $res->address ?></td>
                        <td><?php echo $res->cnum ?></td>
                        <td><?php echo $res->expertise ?></td>
                        <td><?php echo $res->uname ?></td>
                        <td><?php echo date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $res->createAt))) ?></td>

                    </tr>

                <?php
                    $count++;
                } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
<script>
    function searchTable() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByClassName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

</html>