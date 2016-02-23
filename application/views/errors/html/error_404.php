<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #51984F; color: white; }
::-moz-selection { background-color: #51984F; color: white; }

body {
    background-image: url('<?=base_url();?>assets/images/404-error.png');
    background-repeat: no-repeat;
    background-color: #51984F;
    background-position: center 40%;
}


</style>
</head>
<body>
        <div style="font-family: Gotham;margin: 0 auto;width: 500px;text-align: center;margin-top: 30%;color: white;font-size: 22px;">
                <p>The page you were looing for doesn't exist.</p>
                <p>Return to <a href="<?=base_url();?>" style="color:#ff5722;text-decoration:none">homepage</a></p>
            </div>
</body>
</html>
