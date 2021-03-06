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
            <th>Squad Name</th>
            <th>Contact</th>
            <th>Password</th>
            <th>Squad Locality</th>
            <th>District</th>
            <br />
            <br />
            <br />
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM `tb_squad`s,`tb_district` d ,`tb_locality` l WHERE s.`dist_id`=d.`dist_id` AND s.`loc_id`=l.`loc_id`");
        while ($rs = mysqli_fetch_array($res)) {
            echo "<tr><td>$rs[sqname]</td><td>$rs[sqcontact]</td><td>$rs[sqpass]</td><td>$rs[locality]</td><td>$rs[dist_name]</td></tr>";
        }
        ?>
    </table>
</center>
<?php
include("Footer.php");
?>