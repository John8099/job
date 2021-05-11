<?php
include "connect.php";
include "sms.php";

session_start();

$additional_message = $_POST["msg"];
$applicant_id = $_POST["applicant_id"];

$setHired = $con->query("INSERT INTO employment(`user_id`, employer_id) VALUES('$applicant_id', '$_SESSION[id]')");

if ($setHired) {
    $updateApplicant = $con->query("UPDATE users SET hiredby = '$_SESSION[id]' WHERE id ='$applicant_id'");

    if ($updateApplicant) {

        $q_applicant = $con->query("SELECT * FROM users WHERE id=$applicant_id");
        $applicant = $q_applicant->fetch_object();

        $q_employer = $con->query("SELECT * FROM users WHERE id=$_SESSION[id]");
        $employer = $q_employer->fetch_object();


        if ($additional_message == "") {
            $message = "You've been hire by $employer->fname $employer->lname.";
        } else {
            $message = "You've been hire by $employer->fname $employer->lname. Message from employer: \" $additional_message \"";
        }

        $itexMo = itexmo($applicant->cnum, $message);
        if ($itexMo == 0) {
            echo "
                <script>
                alert('Message sent to $applicant->fname $applicant->lname.')
                window.location.href = '../pages/applicant-list.php';
                </script>
            ";
        }
    } else {
        echo '
        <script>
            alert("Error sending message.\nPlease try again.")
            window.location.href = "../pages/additional-msg.php";
        </scritp>';
    }
} else {
    echo '
        <script>
            alert("Error sending message.\nPlease try again.")
            window.location.href = "../pages/additional-msg.php";
        </scritp>';
}