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
        $update_status = "update model set status='$status' where id=$id";
        mysqli_query($con, $update_status);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET["id"]);
        $delete_model = "delete from model where id=$id";
        mysqli_query($con, $delete_model);
    }
}
$sql = "select model.*,brand.name from model,brand where model.brand_id=brand.id order by model.id asc ";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Manage Models</h4>
                        <h4 class="box-link"><a href="manage_models.php">Add a Model</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>

                                        <th>ID</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td> <span class="name"><?php echo $row['model']; ?></span> </td>
                                            <td>
                                                <?php
                                                echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>&nbsp;";
                                                echo "<span class='badge badge-edit'><a href='manage_models.php?type=edit&id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                ?>
                                            </td>
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