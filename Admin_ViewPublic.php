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
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>District</th>
            <th>Locality</th>
            <th>health</th>
            <br />
            <br />
            <br />
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM `tb_public` p , `tb_district` d, `tb_locality` l WHERE p.`district`=d.`dist_id` AND d.`dist_id`=l.`district` AND p.`locality`=l.`loc_id`");
        while ($rs = mysqli_fetch_array($res)) {
            echo "<tr><td>$rs[name]</td><td>$rs[contact]</td><td>$rs[email]</td><td>$rs[district]</td><td>$rs[locality]</td><td>$rs[health]</td><td><a href='PublicReportProcess.php?pub_id=$rs[pub_id]&locality=$rs[locality]'>Report</a></td></tr>";
        }
        ?>
    </table>
</center>
<?php
include("Footer.php");
?>