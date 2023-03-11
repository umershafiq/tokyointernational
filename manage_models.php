<?php
require('header.inc.php');
$msg = '';
$brand_name = '';
$model = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET["id"]);
    $res = mysqli_query($con, "select * from model where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $brand_name = $row['brand_id'];
        $model = $row['model'];
    } else {
        header("location: models.php");
        die();
    }
}
if (isset($_POST['submit'])) {
    $brand_id = get_safe_value($con, $_POST['brand_id']);
    $model = get_safe_value($con, $_POST['model']);
    $res = mysqli_query($con, "select * from model where brand_id='$brand_id' and model='$model'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Model already exist";
            }
        } else {
            $msg = "Model already exist";
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update model set brand_id='$brand_id', model='$model' where id='$id'");
        } else {
            mysqli_query($con, "insert into model(brand_id,model) values('$brand_id','$model')");
        }
        header("location: models.php");
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Models</strong><small> Form</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="brand_id" class=" form-control-label">Make</label>
                                <select class="form-control" name="brand_id">
                                    <option>
                                        Select Brand
                                    </option>
                                    <?php
                                    $res = mysqli_query($con, "select id,name from brand order by id asc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if ($row['id'] == $brand_name) {
                                            echo "   <option value=" . $row['id'] . " selected>" . $row['name'] . "</option>";
                                        } else {
                                            echo "   <option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="model" class=" form-control-label">Model</label>
                                <input type="text" name="model" placeholder="Enter a model name" class="form-control" value="<?php echo $model ?>" required>
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