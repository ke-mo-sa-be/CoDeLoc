<?php
include("Header_Admin.php");
include("DBConnect.php");
?>

<style>
    .customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    .customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<center>
    <table border="1" class="customers">
        <tr>
            <th>Complaint</th>
            <th>Details</th>
            <th>Date</th>
            <th>Public Name</th>
            <th>Status</th>
            <th>Action</th>

            <br />
            <br />
            <br />
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM `tb_complaint` C , `tb_public` P WHERE P.`pub_id`=C.`pub_id`");
        while ($rs = mysqli_fetch_array($res)) {
            echo "<tr><td>$rs[subject]</td><td>$rs[content]</td><td>$rs[date]</td><td>$rs[name]</td><td>$rs[status]</td></tr>";
        }
        ?>
    </table>
</center>
<?php
include("Footer.php");
?>