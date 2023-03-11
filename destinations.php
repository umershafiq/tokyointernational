<?php
require('header.inc.php');
if (isset($_GET["type"]) && $_GET["type"] != '') {
    $type = get_safe_value($con, $_GET["type"]);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET["operation"]);
        $id = get_safe_value($con, $_GET["id"]);
        if ($operation == 'available') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status = "update destinations set status='$status' where id=$id";
        mysqli_query($con, $update_status);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET["id"]);
        $delete_brand = "delete from destinations where id=$id";
        mysqli_query($con, $delete_brand);
    }
}
$sql = "select * from destinations order by id asc";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Manage Destinations</h4>
                        <h4 class="box-link"><a href="manage_destinations.php">Add a Destination</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>

                                        <th>ID</th>
                                        <th>Flag</th>
                                        <th>Country</th>
                                        <th>Region</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td> <span class="name"><img src="<?php echo DESTINATION_IMAGE_SITE_PATH . $row['flag']; ?>" alt=""></span> </td>
                                            <td> <span class="name"><?php echo $row['place']; ?></span> </td>
                                            <td> <span class="name"><?php echo $row['region']; ?></span> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>