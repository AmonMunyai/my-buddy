<?php

if (!isset($_GET["error"])) {
    // no errors
    exit();
}

$error = $_GET["error"];

$error_msg = array(
    "emptyfields"=>"Field(s) cant be blank",
    "invalidusername"=>"Please enter a valid username (no spaces)",
    "invalidmail"=>"Please enter a valid email address",
    "passwordtooshort"=>"Use atleast 8 characters",
    "passwordnouppercase"=>"Use uppercase and lowercase characters",
    "passwordnolowercase"=>"Use uppercase and lowercase characters",
    "passwordnonumber"=>"Use 1 or more numbers",
    "sqlerror"=>"Cannot connect to SQL server",
    "mailalreadytaken"=>"Email already in use",
    "passwordnomatch"=>"Passwords do not match",
    "error"=>"",
    "uploadfile"=>"Failed to upload your file",
    "removefile"=>"Failed to remove your profile image",
    "invalid"=>"Sorry, something went wrong",
    "invalidtitle"=>"Invalid title request",
    "invaliduser"=>"Illegal operation",
    "invalidinput"=>"Question contains invalid or unexpected content",
    "nouser"=>"There is no user record corresponding to this email",
    "reset"=>"Unable to reset password due an unknown error. Please try again."
);

?>
    <script defer>
        alert("<?php echo $error_msg[$error]; ?>");
    </script>