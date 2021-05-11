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
    <title>My Profile</title>
</head>
<style>
    body {
        background-color: lightgray;
    }

    .min {
        border: 6px solid darkslategray;
        border-bottom: transparent;
        border-right: transparent;
        border-left: transparent;
    }

    .mon {
        border: 2px solid darkslategray;
        margin-top: 115px;
        margin-right: 450px;
        margin-left: 450px;
        padding-left: 90px;
        padding-top: 40px;
        padding-bottom: 20px;
        font: 17px Georgia, serif;

    }

    .hak {
        font: 30px Georgia, serif;
        margin-left: 50px;

    }
</style>

<body>
    <div class="min">
        <?php include_once("employer-nav.php") ?>
        <div class="mon">
            <label class="hak">Post Hiring</label>
            <?php
            if (isset($_GET['post_hiring'])) {
                $job_name = $_POST['job_name'];
                $company = $_POST['company'];
                $location = $_POST['location'];
                $job_desc = $_POST['job_desc'];
                $resp = $_POST['resp'];
                $qualifications = $_POST['qualifications'];
                $overview = $_POST['overview'];

                $q = mysqli_query($con, "INSERT INTO hiring VALUES(NULL, '$job_name','$company','$location','$job_desc','$resp','$qualifications','$overview', NULL, '$_SESSION[id]')");

                if ($q) {
                    echo '
                    <script>
                        alert("Job Posted Successfuly")
                        window.location.href = "post-hiring.php"
                    </script>
                    ';

                }
            }

            ?>
            <form action="?post_hiring" method="POST">
                <br><br>
                <label>Job name</label>
                <input type="text" name="job_name" placeholder="Enter Job name" required>
                <br><br>
                <label>Company</label>
                <input type="text" name="company" placeholder="Company" required>
                <br><br>
                <label>Location</label>
                <input type="text" name="location" placeholder="Location" required>
                <br><br>
                <label>Job description</label>
                <input type="text" name="job_desc" placeholder="Job description" required>
                <br><br>
                <label>Responsibilities</label>
                <input type="text" name="resp" placeholder="Responsibilities" required>
                <br><br>
                <label>Qualifications</label>
                <input type="text" name="qualifications" placeholder="Qualifications" required>
                <br><br>
                <label>Company overview</label>
                <input type="text" name="overview" placeholder="Company overview" required>
                <br><br>
                <button type="submit" style="background-color:silver; color: darkslategray; margin-left: 100px;">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>