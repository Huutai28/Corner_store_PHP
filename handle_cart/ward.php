<?php
include "../admin/handle/database.php";
echo '<option value="">--Chọn xã/phường--</option>';
if (isset($_POST['district_id'])) {
    $sql = "SELECT * FROM `xaphuongthitran` WHERE maqh = '{$_POST['district_id']}'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($district = $result->fetch_assoc()) {
?>
<option value='<?php echo $district['xaid'] ?>'><?php echo $district['name']; ?></option>
<?php } } } ?>