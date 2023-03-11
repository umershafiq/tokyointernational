<?php
require('connection.inc.php');
require('functions.inc.php');
// if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
// } else {
//     header('location: anwar_login.php');
//     die();
// }
$brand_id = get_safe_value($con, $_POST["brand_id"]);
$res = mysqli_query($con, "select * from model where brand_id='$brand_id'");
if (mysqli_num_rows($res) > 0) {
    $html = '';
    while ($row = mysqli_fetch_assoc($res)) {
        $html.= "<option value=" . $row['id'] . ">" . $row['model'] . "</option>";
    }
    echo $html;
} else {
    echo "<option value=''>No Models found</option>";
}
