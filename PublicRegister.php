<?php
session_start();
include("Header.php");
include("DBConnect.php")
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function testfun(id) {
        // alert(id);
        $('#chooselocality').load("LocalityAJAX.php?id=" + id);
    };
</script>
<center>
    </br>
    <h1> Register Yourself</h1>
    <div class="contact-bottom" weight="800px">
        <form>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="contact" placeholder="Contact">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="pass" placeholder="Password">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM `tb_district`"); // Run your query
            echo '<select name="District" onchange="testfun(this.value)">'; // Open your drop down box
            echo '<option>Select District</option>';
            // Loop through the query results, outputing the options one by one
            while ($row = mysqli_fetch_assoc($query)) {

                echo '<option value="' . $row['dist_id'] . '">' . $row['dist_name'] . '</option>';
            }
            echo '</select>'; // Close your drop down box
            ?>
            <br>
            <br>
            <div id="chooselocality">
            </div>
            <br>
            <br>
            <input type="submit" name="regbtn" value="Register">
        </form>
    </div>
</center>

<?php

if (isset($_REQUEST['regbtn'])) {

    $uname = $_REQUEST['name'];
    $uemail = $_REQUEST['email'];
    $ucontact = $_REQUEST['contact'];
    $upass = $_REQUEST['pass'];
    $district = $_REQUEST['District'];
    $locality = $_REQUEST['Locality'];

    $res = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM `tb_login` WHERE `user_phone`='$ucontact'");
    $rs = mysqli_fetch_array($res);

    if ($rs['cnt'] > 0) {
        echo "<script>alert('User Already Exists')</script>";
        echo "<script>window.location.href='customerRegistration.php';</script>";
    } else {
        $qry = "INSERT INTO `tb_public` (`name`,`email`,`contact`,`locality`,`district`,`password`)VALUES('$uname','$uemail','$ucontact','$locality','$district','$upass')";
        // echo $qry;
        mysqli_query($conn, $qry);
        $QRY2 = "INSERT INTO `tb_login` (`reg_id`,`usertype`,`user_phone`,`user_pass`)values((SELECT max(`pub_id`) from `tb_public`),'PUBLIC','$ucontact','$upass')";
        // echo $QRY2;
        mysqli_query($conn, $QRY2);
        echo "<script>alert('REGISTRATION SUCCESSFULL')</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
}
?>
<?php
include("Footer.php");
?>