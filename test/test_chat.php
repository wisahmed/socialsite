<?php

session_start();
$from=$_SESSION['User'];
$to=$_POST['f_recv'];

?>
<!DOCTYPE >
<html>
    <head>
        <title>AJAX chat</title>
        <link rel="stylesheet" href="css/style.css">
        <script>
        var f1="<?php echo $from; ?>";
        var f2="<?php echo $to; ?>";
        </script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/chat.js"></script>
    </head>
    <body>
        <div class="chat">
            <div class="messages">
            </div>
            <textarea class="entry" id="entry" value=""></textarea>
        </div>
    </body>
</html>