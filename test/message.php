<?php

session_start();
echo "<h6>From:".$_SESSION['User']."<br>To:".$_POST['f_recv']."</h6>";

?>
<!DOCTYPE >
<html>
    <head>
        <title>Message</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="chat">
            <div class="messages">
            </div>
            <textarea class="entry" id="entry" value=""></textarea>
        </div>
    </body>
</html>