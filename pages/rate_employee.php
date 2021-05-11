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
        body{
            background-color: lightgray;
            color: silver;
            

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
            border: 1px solid black;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .lang{
            margin-left: 350px;
            margin-top: 150px;
            max-width: 650px;
            font: 17px Georgia, serif;
            background-color: darkslategray;
            border-style: solid;
            border-width: 1px;
            padding-top: 20px;
            padding-bottom: 25px;
            padding-right: 25px;
            padding-left: 25px;
            box-shadow: 5px 5px 5px grey;
            border-radius: 15px;
        }
        .rek{
            padding-top: 40px;
            padding-right: 10px;
        }

        .rek, button {
            margin: auto;
            border-radius: 5px;
        }
        .rek, textarea{
            color: silver;

        }
    </style>
</head>

<body>
    <div class="lang">
        <?php
        $q = $con->query("SELECT * FROM users WHERE id=$_GET[user_id]");
        $res = $q->fetch_object();
        ?>
        <label>Rate Employee  <?php echo strtoupper("$res->fname $res->lname") ?></label>

        <form action="../back/rate.php" method="POST">
            <input type="text" value="<?php echo $_GET['id'] ?>" name="id" readonly hidden>
            <input type="text" value="<?php echo $_GET['user_id'] ?>" name="user_id" readonly hidden>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <div class="rek">
            <label>Comment</label>
            <textarea name="comment" cols="30" rows="10" placeholder="Your comment" required style="background-color:silver; color: black;"></textarea>

            <button type="submit" style="background-color:silver; color: darkslategray;">Submit</button>
            <button type="button" onclick="return(window.history.back())" style="background-color:silver; color: darkslategray;">Cancel</button>
        </div>
        </form>

    </div>

</body>

</html>