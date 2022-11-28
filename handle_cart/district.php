<?php
include "../admin/handle/database.php";
echo '<option value="">--Chọn quận/huyện--</option>';
if (isset($_POST['province_id'])) {
    $sql = "SELECT * FROM `quanhuyen` WHERE `matp` = '{$_POST['province_id']}'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($district = $result->fetch_assoc()) {
?>
<option value='<?php echo $district['maqh'] ?>'><?php echo $district['name']; ?></option>
<?php } } } ?>