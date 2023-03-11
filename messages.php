<?php
require('header.inc.php');
if (isset($_GET["type"]) && $_GET["type"] != '') {
    $type = get_safe_value($con, $_GET["type"]);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET["id"]);
        $delete_comment = "delete from contact_us where id=$id";
        mysqli_query($con, $delete_comment);
    }
}
$sql = "select * from contact_us order by id desc ";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Contact Leads</h4>

                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Contact</th>
                                        <th>Time</th>
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
                                            <td> <span class="name"><?php echo $row['name']; ?></span> </td>
                                            <td> <span class="name"><?php echo $row['email']; ?></span> </td>
                                            <td> <span class="name"><?php echo $row['phone']; ?></span> </td>
                                            <td> <span class="name"><?php echo $row['comment']; ?></span> </td>
                                            <td> <span class="name"><?php echo $row['added_on']; ?></span> </td>
                                            <td><?php echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>&nbsp;";
                                                ?></td>
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