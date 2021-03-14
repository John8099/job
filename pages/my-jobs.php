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
    <title>My Jobs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
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
            border: 1px solid black;
        }

        .checked {
            color: orange;
        }
    </style>
</head>

<body>
    <?php include "applicant-nav.php" ?>
    <div>
        <label>Current Job</label>
        <input id='myInput1' onkeyup='searchTable1()' type='text' placeholder="Search">
        <?php
        $q = $con->query("SELECT * FROM employment e LEFT JOIN users u ON e.user_id = u.id WHERE u.id = $_SESSION[id] and comment = '' and ratings IS NULL");
        if ($q->num_rows > 0) :
        ?>

            <table id='myTable1'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employer</th>
                        <th>Date Hired</th>
                        <th>Employer Address</th>
                        <th>Employer Contact Number</th>
                        <th>Job</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $count = 1;
                    while ($res = $q->fetch_object()) {
                    ?>
                        <tr class="tr1">
                            <td><?php echo $count ?></td>
                            <td>
                                <?php
                                $employer = $con->query("SELECT * FROM users WHERE id=$res->employer_id")->fetch_object();
                                echo strtoupper($employer->fname[0]) . substr($employer->fname, 1, strlen($employer->fname) - 1) . " " . strtoupper($employer->lname[0]) . substr($employer->lname, 1, strlen($employer->lname) - 1);;
                                ?>
                            </td>
                            <td><?php echo date("M d, Y", strtotime(str_replace('-', '/', $res->hired_on))) ?></td>
                            <td><?php echo $employer->address ?></td>
                            <td><?php echo $employer->cnum ?></td>
                            <td><?php echo $con->query("SELECT * FROM category WHERE cat_id=$res->expertise")->fetch_object()->expertise ?></td>
                        </tr>

                    <?php
                        $count++;
                    } ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No Job yet.</p>
        <?php
        endif;
        ?>

        <label>Previous Jobs</label>
        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search">
        <table id='myTable'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employer</th>
                    <th>Date Hired</th>
                    <th>Employer Address</th>
                    <th>Employer Contact Number</th>
                    <th>Job</th>
                    <th>Ratings</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q2 = $con->query("SELECT * FROM employment e LEFT JOIN users u ON e.user_id = u.id WHERE id = $_SESSION[id] and comment != '' and ratings IS NOT NULL");
                $count = 1;
                while ($res = $q2->fetch_object()) {
                ?>
                    <tr class="tr">
                        <td><?php echo $count ?></td>
                        <td>
                            <?php
                            $employer = $con->query("SELECT * FROM users WHERE id=$res->employer_id")->fetch_object();
                            echo strtoupper($employer->fname[0]) . substr($employer->fname, 1, strlen($employer->fname) - 1) . " " . strtoupper($employer->lname[0]) . substr($employer->lname, 1, strlen($employer->lname) - 1);;
                            ?>
                        </td>
                        <td><?php echo date("M d, Y", strtotime(str_replace('-', '/', $res->hired_on))) ?></td>
                        <td><?php echo $employer->address ?></td>
                        <td><?php echo $employer->cnum ?></td>
                        <td><?php echo $con->query("SELECT * FROM category WHERE cat_id=$res->expertise")->fetch_object()->expertise ?></td>
                        <td>
                            <?php
                            $count = 1;
                            while ($count <= 5) :
                                if ($count <= $res->ratings) :
                            ?>
                                    <span class="fa fa-star checked"></span>

                                <?php
                                else :
                                ?>
                                    <span class="fa fa-star"></span>

                            <?php
                                endif;
                                $count++;
                            endwhile;
                            echo "($res->ratings)";
                            ?>
                        </td>
                        <td><?php echo $res->comment ?></td>
                    </tr>

                <?php
                    $count++;
                } ?>
            </tbody>
        </table>
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

    function searchTable1() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable1");
        tr = table.getElementsByClassName("tr1");
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