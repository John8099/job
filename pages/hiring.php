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
            border: 2px solid darkslategray;
            padding-bottom: 50px;



        }

        .min {
            border: 6px solid darkslategray;
            margin-top: 10px;
            border-right: transparent;
            border-bottom: transparent;
            border-left: transparent;
        }

        .mon {
            border: transparent;
            margin-top: 100px;
            padding-right: 70px;

        }

        .man {
            margin-left: 10px;
            border: transparent;
            font-size: 17px;
            padding-bottom: 70px;
            font-family: Georgia, serif;

        }

        .checked {
            color: orange;
        }
    </style>
</head>

<body>
    <?php include "applicant-nav.php" ?>
    <div class="min">
        <div class="mon">

            <br>
            <br>
            <br>
            <table id='myTable'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Job name</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Job Desc</th>
                        <th>Responsibiloty</th>
                        <th>Qualifications</th>
                        <th>Overview</th>
                        <th>Date Posted</th>
                        <th>Posted By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q2 = $con->query("SELECT * FROM hiring");
                    $count = 1;
                    while ($res = $q2->fetch_object()) {
                    ?>
                        <tr class="tr">
                            <td><?php echo $count ?></td>
                            <td><?php echo $res->job_name ?></td>
                            <td><?php echo $res->company ?></td>
                            <td><?php echo $res->location ?></td>
                            <td><?php echo $res->job_desc ?></td>
                            <td><?php echo $res->resp ?></td>
                            <td><?php echo $res->qualifications ?></td>
                            <td><?php echo $res->overview ?></td>
                            <td><?php echo date("M d, Y", strtotime(str_replace('-', '/', $res->date_posted))) ?></td>
                            <td>
                                <?php
                                $employer = $con->query("SELECT * FROM users WHERE id=$res->posted_by")->fetch_object();
                                echo strtoupper($employer->fname[0]) . substr($employer->fname, 1, strlen($employer->fname) - 1) . " " . strtoupper($employer->lname[0]) . substr($employer->lname, 1, strlen($employer->lname) - 1);;
                                ?>
                            </td>
                            <td>
                                <a href="apply.php?id=<?php echo $employer->id ?>">Apply</a>
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

</html>