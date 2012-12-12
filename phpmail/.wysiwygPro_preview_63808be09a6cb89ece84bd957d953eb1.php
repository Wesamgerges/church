<?php
if ($_GET['randomId'] != "XNF_HFaHrqSjWob9EVd_xaPxxsqD1ddrGD1PSRRvDPtnUN60ucPmBR6spVCc6f6G") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
