<html>
<?php
include("DBConnect.php");
$dist_id = $_REQUEST['id'];


?>
<!-- <select name="District" onchange="testfun()">
    <option>after District</option>
    <option>after District</option>

</select> -->


<?php
// echo "SELECT * FROM `tb_locality` where `district`='$dist_id'";
$query = mysqli_query($conn, "SELECT * FROM `tb_locality` where `district`='$dist_id'"); // Run your query
echo '<select name="Locality" >'; // Open your drop down box
echo '<option>Select Locality</option>';
// Loop through the query results, outputing the options one by one
while ($row = mysqli_fetch_assoc($query)) {

    echo '<option value="' . $row['loc_id'] . '">' . $row['locality'] . '</option>';
}
echo '</select>'; // Close your drop down box
?>


</html>