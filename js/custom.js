function send_message() {
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var phone = jQuery("#phone").val();
  var message = jQuery("#message").val();

  if (name == "") {
    alert("Please insert your name");
  } else if (email == "") {
    alert("Please insert your email");
  } else if (phone == "") {
    alert("Please insert your phone");
  } else if (message == "") {
    alert("Please insert your message");
  } else {
    jQuery.ajax({
      url: "send_message.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&phone=" +
        phone +
        "&message=" +
        message,
      success: function (result) {
        alert(result);
      },
    });
  }
}
function sort_vehicle($brand_id = null, site_path) {
  var sort_vehicle=jQuery('#sort_vehicle').val();
  if($brand_id) {
    window.location.href=site_path+"brand.php?id="+$brand_id+"&sorting="+sort_vehicle;
  } else {
    window.location.href=site_path+"all_stock.php?&sorting="+sort_vehicle;
  }
}
