<?php
require('header.inc.php');
$msg = '';
$brand_name = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET["id"]);
    $res = mysqli_query($con, "select * from brand where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $brand_name = $row['name'];
    } else {
        header("location: brands.php");
        die();
    }
}
if (isset($_POST['submit'])) {
    $brand_name = get_safe_value($con, $_POST['brand']);
    $res = mysqli_query($con, "select * from brand where name='$brand_name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Brand already exist";
            }
        } else {
            $msg = "Brand already exist";
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update brand set name='$brand_name' where id='$id'");
        } else {
            mysqli_query($con, "insert into brand(name,status) values('$brand_name','1')");
        }
        header("location: brands.php");
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Brands</strong><small> Form</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="brand" class=" form-control-label">Company</label>
                                <input type="text" name="brand" placeholder="Enter a brand name" class="form-control" value="<?php echo $brand_name ?>" required>
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