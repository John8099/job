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
    <title>Category List</title>
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
            border-width: 3px;
            padding-bottom: 50px;
            padding-left: 60px;
            padding-right: 70px;
            

        }
        .min{
            border: 6px solid darkslategray;
            margin-top: 10px;
            border-bottom: transparent;
            border-left: transparent;
            border-right: transparent;
            font: 17px Georgia, serif;
        }
        .mon{
            border: transparent;
            margin-top: 80px;
            padding-left: 380px;
        }
        .man{
            margin-left: 600px;
            border: transparent;
            font: 25px Georgia, serif;
            padding-bottom:70px;

        }

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
        <label>Category List</label>
        <input id='myInput' onkeyup='searchTable()' type='text' placeholder="Search">
    </div>
        <table id='myTable'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = $con->query("SELECT * FROM category");
                $count = 1;
                while ($res = $q->fetch_object()) {
                ?>
                    <tr class="tr">
                        <td><?php echo $count ?></td>
                        <td><?php echo $res->expertise ?></td>
                        <td>
                            <a href="edit-category.php?id=<?php echo $res->cat_id ?>">edit</a>
                            <a href="../back/delete.php?category&&id=<?php echo $res->cat_id ?>">delete</a>
                        </td>
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