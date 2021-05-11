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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
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
            padding-bottom: 40px;
            padding-right: 40px;
            color: black;
            background-color: lightgray;
            font: 17px Georgia, serif;
        }




        .checked {
            color: orange;
        }

        .min {
            border: 6px solid darkslategray;
            border-bottom: transparent;
            border-right: transparent;
            border-left: transparent;


        }

        .mon {
            border: transparent;
            margin-top: 100px;
            padding-left: 50px;
        }

        .man {
            margin-left: 880px;
            border: transparent;
            font: 25px Georgia, serif;
            padding-bottom: 70px;

        }
    </style>
</head>

<body>
    <?php include_once("employer-nav.php") ?>
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
                        <th style="font-weight: bold;">Attachment</th>
                        <th style="font-weight: bold;">Fullname</th>
                        <th style="font-weight: bold;">Birthday</th>
                        <th style="font-weight: bold;">Age</th>
                        <th style="font-weight: bold;">Address</th>
                        <th style="font-weight: bold;">Contact Number</th>
                        <th style="font-weight: bold;">Expertise</th>
                        <th style="font-weight: bold;">Ratings</th>
                        <th style="font-weight: bold;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = $con->query("SELECT * FROM `apply` WHERE applied_to = $_SESSION[id]");
                    $count = 1;
                    while ($res = $q->fetch_object()) {
                    ?>
                        <tr class="tr">
                            <td><?php echo $count ?></td>
                            <td><img src="../images/<?php echo $res->attach ?>" onclick="return window.open('../images/<?php echo $res->attach ?>', 'myWindow' , 'width=800,height=800')" style="width: 200px;"></td>
                            <?php $applicant = $con->query("SELECT * FROM users WHERE id = $res->applied_by")->fetch_object() ?>
                            <td><?php echo strtoupper($applicant->fname[0]) . substr($applicant->fname, 1, strlen($applicant->fname) - 1) . " " . strtoupper($applicant->lname[0]) . substr($applicant->lname, 1, strlen($applicant->lname) - 1);;  ?></td>

                            <td><?php echo date("M d, Y", strtotime(str_replace('-', '/', $applicant->bday))) ?></td>
                            <td>
                                <?php
                                $age = date("Y") - date("Y", strtotime(str_replace('-', '/', $applicant->bday)));
                                if ($age == 0) {
                                    echo "";
                                } else {
                                    echo $age;
                                }
                                ?>
                            </td>

                            <td><?php echo $applicant->address ?></td>
                            <td><?php echo $applicant->cnum ?></td>
                            <td><?php echo $con->query("SELECT expertise FROM category WHERE cat_id = $applicant->expertise")->fetch_object()->expertise ?></td>
                            <td>
                                <?php
                                $getRatings = $con->query("SELECT * FROM employment WHERE `user_id`=$applicant->id");

                                if ($getRatings->num_rows == 0) {
                                    echo "no ratings yet.";
                                } else {

                                    $star5 = 0;
                                    $star4 = 0;
                                    $star3 = 0;
                                    $star2 = 0;
                                    $star1 = 0;

                                    while ($row = $getRatings->fetch_object()) {
                                        if ($row->ratings == "5") {
                                            $star5++;
                                        } else if ($row->ratings == "4") {
                                            $star4++;
                                        } else if ($row->ratings == "3") {
                                            $star3++;
                                        } else if ($row->ratings == "2") {
                                            $star2++;
                                        } else if ($row->ratings == "1") {
                                            $star1++;
                                        }
                                    }

                                    $weight = (5 * $star5 + 4 * $star4 + 3 * $star3 + 2 * $star2 + 1 * $star1);
                                    $total = $weight / ($star5 + $star4 + $star3 + $star2 + $star1);

                                    $loop = intval($total);
                                    $count = 1;
                                    while ($count <= 5) :
                                        if ($count <= $loop) :
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
                                    echo "($loop)";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="additional-msg.php?id=<?php echo $applicant->id ?>">Message</a>
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