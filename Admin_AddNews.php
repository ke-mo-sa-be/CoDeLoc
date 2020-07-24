<?php
session_start();
include("Header_Admin.php");
include("DBConnect.php")
?>
<style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
    <!-- <h4>GET IN TOUCH</h4>
    <p>Our goal is to provide the best customer service and to answer all of your questions in a timely manner.</p> -->
    <div class="form_section">
        <br />
        <br />
        <br />
        <br />
        <form class="contact-bottom">
            <center>

                <input class="field_custom" placeholder="News Title" type="text" required name="title" />
                <br />



                <textarea class="field_custom" placeholder="Content" name="content"></textarea>
                <br />

                <div><input type="submit" class="button" value="ADD NEWS" name="regbtn"></div>
                <br />
                <br />
                <br />
                <br />
                <!-- </div> -->
            </center>
        </form>
    </div>
</div>

<?php

if (isset($_REQUEST['regbtn'])) {

    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $date = date('d/m/y  H:m a');



    mysqli_query($conn, "INSERT INTO `tb_news` (`title`,`content`,`date`) VALUES('$title','$content','$date')");

    echo "<script>alert('News Added')</script>";
    echo "<script>window.location.href='AdminHome.php';</script>";
}

?>
<?php
include("Footer.php");
?>