<?php
include "../back/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="Stylesheet" type="text/css" href="Style-reg.css">
</head>

<body>
    <div class="reg">
        <div class="us">
            <form action="../back/register.php" method="POST" enctype="multipart/form-data">
                <label>User Type</label>
                <select name="userType" id="type">
                    <option value="">- Are you an? -</option>
                    <option value="applicant">Applicant</option>
                    <option value="employer">Employer</option>
                </select>
                <br>
                <br>
                <label>Fist name</label>
                <input id="type" type="text" name="fname" placeholder="Enter Firstname" required>
                <br>
                <br>
                <label>Last name: </label>
                <input id="type" type="text" name="lname" placeholder="Enter Lastname" required>
                <br>
                <br>
                <label>Birth day: </label>
                <input id="type" type="date" name="bday" required>
                <br>
                <br>
                <label>Address: </label>
                <input id="type" type="text" name="address" placeholder="Enter Address" required>
                <br>
                <br>
                <label>Contact number: </label>
                <input id="type" type="text" name="cnum" placeholder="Enter Contact Number" required>
                <br>
                <br>
                <div id="forApplicants">
                    <label>Attachment</label>
                    <input type="file" name="attach"> <br>
                    <label>Expertise</label>
                    <select name="expertise">
                        <?php
                        $q = $con->query("SELECT * FROM category");
                        while ($row = $q->fetch_object()) :
                        ?>
                            <option value="<?php echo $row->cat_id ?>"><?php echo $row->expertise ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <label>Username: </label>
                <input id="type" type="text" name="uname" placeholder="Enter Username" required>
                <br>
                <br>
                <label>Password: </label>
                <input id="type" type="password" name="pass" placeholder="Enter Passsword" required>
                <br>
                <br>
                <button id="type1" type="submit">Register</button>
                <p>
                    Have account?
                    <a href="../">Login here.</a>
                </p>
            </form>
        </div>
    </div>
</body>
<script>
    let divExpertise = document.getElementById("forApplicants")
    let userType = document.getElementById("type")

    window.onload = () => {
        if (userType.value !== "applicant") {
            divExpertise.style.display = "none"
        } else {
            divExpertise.style.display = "block"
        }
    }

    userType.addEventListener("change", () => {
        if (userType.value !== "applicant") {
            divExpertise.style.display = "none"
        } else {
            divExpertise.style.display = "block"
        }
    })
</script>

</html>