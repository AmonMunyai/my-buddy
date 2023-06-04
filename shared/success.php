<?php

$success = array(
    "createpost",
    "notificationclear",
    "updatepost",
    "deletepost",
    "addanswer",
    "vote",
    "signup",
    "removefile",
    "uploadfile",
    "reset",
    "",
    "",
    "",
    "",
    "",
);

while (!isset($_GET[$success])) {
    echo "yay";
}


// if ($_GET[""] != "success") {
//     // do nothing
//     exit();
// }

$success_msg = array(
    ""=>""
);

?>
    <script defer>
        alert("<?php echo $success_msg[$success]; ?>");
    </script>