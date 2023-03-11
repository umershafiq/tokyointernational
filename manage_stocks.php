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
    $brand_id = get_safe_value($con, $_POST['brand_id']);
    $model_id = get_safe_value($con, $_POST['model_id']);
    $chassis = get_safe_value($con, $_POST['chassis']);
    $man_year = get_safe_value($con, $_POST['stock_manyear']);
    $price = get_safe_value($con, $_POST['price']);
    $desc = get_safe_value($con, $_POST['desc']);
    $best = get_safe_value($con, $_POST['best']);



    $res = mysqli_query($con, "select * from vehicle where chassis='$chassis'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $msg = "Vehicle already exist";
    } else {
        $image = rand(111111111, 99999999) . '_' . $_FILES['stock_image']['name'];
        move_uploaded_file($_FILES['stock_image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
        mysqli_query($con, "insert into vehicle(brand_id,model_id,chassis,man_year,fob,description,images,best_seller) values('$brand_id','$model_id','$chassis','$man_year','$price','$desc','$image','$best')");
        header("location: stocks.php");
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add</strong><small> Stock</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="brand" class=" form-control-label">Make</label>
                                <select class="form-control" name="brand_id" id="brand_id" onchange="get_models()" required>
                                    <option>
                                        Select Make
                                    </option>
                                    <?php
                                    $res = mysqli_query($con, "select id,name from brand order by id asc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "   <option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="model_id" class=" form-control-label">Model</label>
                                <select class="form-control" name="model_id" id="model_id" required>
                                    <option>
                                        Select Model
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="chassis" class=" form-control-label">Chassis No.</label>
                                <input type="text" name="chassis" placeholder="Enter Chassis" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="best" class=" form-control-label">Best Selling</label>
                                <select class="form-control" name="best">
                                    <option value="">Is stock a best seller?</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="stock_image" class=" form-control-label">Pictures</label>
                                <input type="file" name="stock_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="stock_manyear" class=" form-control-label">Manufacture Year</label>
                                <input type="text" name="stock_manyear" placeholder="Manufacture year" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price" class=" form-control-label">Price</label>
                                <input type="text" name="price" placeholder="FOB Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc" class="form-control-label">Description</label>
                                <textarea class="form-control" name="desc"></textarea>
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
<script>
    function get_models() {
        var brand_id = jQuery('#brand_id').val();
        jQuery.ajax({
            url: 'get_models.php',
            type: 'post',
            data: 'brand_id=' + brand_id,
            success: function(result) {
                jQuery('#model_id').html(result);
            }
        });
    }
</script>
<?php
require('footer.inc.php');
?>