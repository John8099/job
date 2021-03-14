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
    <title>My Employee</title>
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
    </style>
</head>

<body>
    <?php include_once("employer-nav.php") ?>
    <div>
        <label>My Employee</label>
        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search">
        <table id='myTable'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Birth day</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Hired On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = $con->query("SELECT * FROM employment e LEFT JOIN users u ON u.id = e.user_id WHERE e.employer_id='$_SESSION[id]' and u.hiredby IS NOT NULL and e.ratings IS NULL");
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
                        <td><?php echo date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $res->hired_on))) ?></td>
                        <td>
                            <a href="rate_employee.php?id=<?php echo $res->employment_id ?>&&user_id=<?php echo $res->user_id ?>">Rate</a>
                        </td>

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
</script>

</html>