<?php $conn = oci_connect('ShopUp', 'ShopUp@123', '//localhost/xe'); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit; }
// else {
//    print "Connected to Oracle!"; 
// } 
//     oci_close($conn); 

?>