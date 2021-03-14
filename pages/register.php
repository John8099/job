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
</head>

<body>
    <form action="../back/register.php" method="POST">
        <label>User Type</label>
        <select name="userType" id="type">
            <option value="">- Are you an? -</option>
            <option value="applicant">Applicant</option>
            <option value="employer">Employer</option>
        </select>
        <label>Fist name</label>
        <input type="text" name="fname" placeholder="Enter First name" required>
        <label>Last name: </label>
        <input type="text" name="lname" placeholder="Enter Last name" required>
        <label>Birth day: </label>
        <input type="date" name="bday" placeholder="Enter Birthday" required>
        <label>Address: </label>
        <input type="text" name="address" placeholder="Enter Address" required>
        <label>Contact number: </label>
        <input type="text" name="cnum" placeholder="Enter Contact number" required>
        <div id="forApplicants">
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
        <input type="text" name="uname" placeholder="Enter username" required>
        <label>Password: </label>
        <input type="password" name="pass" placeholder="Enter password" required>
        <button type="submit">Register</button>
        <p>
            Have account?
            <a href="../">Login here.</a>
        </p>
    </form>

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