<?php
session_start();
if (isset($_SESSION) && !empty($_SESSION))
{
    //echo var_dump($_SESSION);
}
else
{
    header('location:login.html');
}


function uidf($user1) {

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "MyDB";
    //$user1 = $_SESSION['User'];
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql ="SELECT ID FROM Users WHERE uname='$user1'";
    $result = $con->query($sql);
    $rowID = mysqli_fetch_assoc($result);
    return $rowID['ID'];

}

$uid=uidf($_SESSION['User']);
$f1=uidf($_POST['f1']);
$f2=uidf($_POST['f2']);
//$tuser=uidf($_POST['f_recv']);
//echo var_dump($row);
////////////////////////////////////////////////////////

require '../Core/init.php';

if (isset($_POST['method']) === true && !empty($_POST['method'])) {
    
    $chat = new chat();
    $method= trim($_POST['method']);
    
    if ( $method === 'fetch') {
        
        $messages = $chat->fetchmsg($f1,$f2);
        
        if (empty($messages) === true) {
            echo "No messages for you...";
        } else {
            foreach ($messages as $msg1) {
                ?>

<div class="message">
    <a href="#"><?php echo $msg1['fname']; ?></a> says:
    <p><?php echo $msg1['message']; ?></p>
</div>

                <?php
            }
        }
        
    } else if ( $_POST['method']=='throw' && isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['f1']) && !empty($_POST['f1']) && isset($_POST['f2']) && !empty($_POST['f2'])) {
        $chat->throwmsg($f1,$_POST['message'],$f2);
    }
    
} else {
    
}

?>