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
    <title>Admin List</title>
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
    <?php
    include_once("admin-nav.php");
    ?>
    <div>
        <label>Admin List</label>
        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search">
        <table id='myTable'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>CreateAt</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = $con->query("SELECT * FROM users WHERE usertype ='admin'");
                $count = 1;
                while ($res = $q->fetch_object()) {
                ?>
                    <tr class="tr">
                        <td><?php echo $count ?></td>
                        <td><?php echo $res->uname ?></td>
                        <td><?php echo date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $res->createAt))) ?></td>
                        <td>
                            <a href="edit-admin.php?id=<?php echo $res->id ?>">edit</a>
                            <a href="../back/delete.php?admin&&id=<?php echo $res->id ?>">delete</a>
                        </td>
                    </tr>
                <?php
                    $count++;
                } ?>
            </tbody>
        </table>
    </div>
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
</body>

</html>