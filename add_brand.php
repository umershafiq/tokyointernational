<?php
require('header.inc.php');
$msg = '';
if (isset($_POST['submit'])) {
    $brand_name = get_safe_value($con, $_POST['brand']);
    $res = mysqli_query($con, "select * from brand where name='$brand_name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $msg = "Brand already exist";
    } else {
        mysqli_query($con, "insert into brand(name,status) values('$brand_name','1')");
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
                                <input type="text" name="brand" placeholder="Enter a brand name" class="form-control" required>
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