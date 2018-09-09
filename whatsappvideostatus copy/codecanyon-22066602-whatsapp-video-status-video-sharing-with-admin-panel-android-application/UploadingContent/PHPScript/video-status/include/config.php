<?php
@ob_start();
$conn = mysqli_connect("tech41645117343.db.41645117.f46.hostedresource.net","tech41645117343","dmu+PO@Pg{m.1","tech41645117343","3311");
mysqli_set_charset($conn,"utf8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
define("button", "Active");
?> 