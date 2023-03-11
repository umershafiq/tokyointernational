<?php
require('header.inc.php');
// $msg = '';
// $vehicle_name = '';

// if (isset($_GET['id']) && $_GET['id'] != '') {
//     $id = get_safe_value($con, $_GET["id"]);
//     $res = mysqli_query($con, "select * from vehicle where id='$id'");
//     $check = mysqli_num_rows($res);
//     if ($check > 0) {
//         $row = mysqli_fetch_assoc($res);
//         $vehicle_name = $row['name'];
//     } else {
//         header("location: vehicles.php");
//         die();
//     }
// }
// if (isset($_POST['submit'])) {
//     $vehicle_name = get_safe_value($con, $_POST['vehicle']);
//     $res = mysqli_query($con, "select * from vehicle where name='$vehicle_name'");
//     $check = mysqli_num_rows($res);
//     if ($check > 0) {
//         if (isset($_GET['id']) && $_GET['id'] != '') {
//             $getData = mysqli_fetch_assoc($res);
//             if ($id == $getData['id']) {
//             } else {
//                 $msg = "vehicle already exist";
//             }
//         } else {
//             $msg = "vehicle already exist";
//         }
//     }

//     if ($msg == '') {
//         if (isset($_GET['id']) && $_GET['id'] != '') {
//             mysqli_query($con, "update vehicle set name='$vehicle_name' where id='$id'");
//         } else {
//             mysqli_query($con, "insert into vehicle(name,status) values('$vehicle_name','1')");
//         }
//         header("location: vehicles.php");
//         die();
//     }
// }


$msg = '';
if (isset($_POST['submit'])) {
    $region = get_safe_value($con, $_POST['region']);
    $place = get_safe_value($con, $_POST['place']);
    $res = mysqli_query($con, "select * from destinations where place='$place'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $msg = "Destination already exist";
    } else {
        $flag = rand(111111111, 99999999) . '_' . $_FILES['flag']['name'];
        move_uploaded_file($_FILES['flag']['tmp_name'], DESTINATION_IMAGE_SERVER_PATH . $flag);
        mysqli_query($con, "insert into destinations(region,place,flag) values('$region','$place','$flag')");
        header("location: destinations.php");
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add a</strong><small> Destination</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="region" class=" form-control-label">Region</label>
                                <select class="form-control" name="region">
                                    <option>
                                        Select Region
                                    </option>
                                    <option value="oceania">Oceania</option>
                                    <option value="africa">Africa</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="place" class=" form-control-label">Destination</label>
                                <input type="text" name="place" placeholder="Enter Destination" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="flag" class="form-control-label">Flag</label>
                                <input type="file" name="flag" class="form-control">
                            </div>
                            <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>