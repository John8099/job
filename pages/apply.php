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
    <div class="min">
        <?php include "applicant-nav.php" ?>
        <div class="mon">
            <label class="hak">Apply</label>
            <?php
            if (isset($_GET['apply'])) {
                $uploads_dir = "../images";
                $tmp_name =  $_FILES["pic"]["tmp_name"];
                $name = uniqid() . "_" . basename($_FILES["pic"]["name"]);
                if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
                    $q = mysqli_query($con, "INSERT INTO `apply` VALUES(NULL, $_POST[id], $_SESSION[id], '$name')");
                    if ($q) {
                        echo '
                        <script>
                            alert("Applied Successfuly")
                            window.location.href = "hiring.php"
                        </script>
                        ';
                    } else {
                        unlink("$uploads_dir/$name");
                        echo '
                        <script>
                            alert("Error uploading images.\nPlease try again.");
                            window.location.href = "../pages/apply.php?id=' . $_POST['id'] . '"
                        </script>';
                    }
                }
            }
            ?>
            <form action="?apply" method="POST" enctype="multipart/form-data">
                <br><br>
                <label>Picture</label><br>
                
                <input type="file" name="pic" accept="image/*" required>
                <input type="text" name="id" value="<?php echo $_GET['id'] ?>" readonly hidden>
                <br><br>
                <button type="submit" style="background-color:silver; color: darkslategray; margin-left: 100px;">Submit</button>

            </form>
        </div>
    </div>

</body>

</html>