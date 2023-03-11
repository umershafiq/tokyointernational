<?php
function pr($arr)
{
    echo '<pr>';
    print_r($arr);
}
function prx($arr)
{
    echo '<pr>';
    print_r($arr);
    die();
}
function get_safe_value($con, $str)
{
    if ($str != '') {
        $str = trim($str);
        return strip_tags(mysqli_real_escape_string($con, $str));
    }
}
function get_product($con, $limit = '', $brand_id = '', $stock_id = '', $search_query = '', $sorting_order = '', $is_best = '', $year = '')
{
    // var_dump($limit, $brand_id, $stock_id, $sorting_order);
    $sql = "select vehicle.*,brand.name,model.model from vehicle,brand,model where vehicle.brand_id=brand.id and vehicle.model_id=model.id";
    if ($brand_id != '') {
        $sql .= " and vehicle.brand_id=$brand_id";
    }
    if ($stock_id != '') {
        $sql .= " and vehicle.id=$stock_id";
    }
    if ($is_best != '') {
        $sql .= " and vehicle.best_seller=1";
    }
    $sql .= " and vehicle.brand_id=brand.id";
    if ($search_query != '' || $year != '') {
        $sql .= " and (model.model like '%$search_query%' or brand.name like '%$search_query%' or vehicle.man_year > '%$year%')";
    }
    if ($sorting_order != '') {
        $sql .= $sorting_order;
    } else {
        $sql .= " order by vehicle.id desc";
    }
    if ($limit != '') {
        $sql .= " limit $limit";
    }
    // echo $sql;
    $res = mysqli_query($con, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
