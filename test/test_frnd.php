<!DOCTYPE html>
<?php
session_start();
if (!Isset($_SESSION['User']) && empty($_SESSION['User'])) {
    header('location: login.html');
}
?>
<html>
<body>

<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "MyDB";

$con = mysqli_connect($servername, $username, $password, $dbname);
$user=$_SESSION['User'];
$sql="SELECT * FROM friend_req WHERE recv='$user'";
$result=$con->query($sql);
//$row=$result->fetch_assoc();
    $i=0;
 while($row = $result->fetch_assoc()){
    //echo $row['init'];
echo '  <div id="friend-body" style="width:764px;">
        <div id="frnd-r" style="background-color:#808080; display:block;">
            <h3>'.$row['init'].'</h3>
            <input type="button" id="accept'.$i.'" onclick="f_req(\''.$row['init'].'\',\'Y\')" value="accept"/>
            <input type="button" id="reject'.$i.'" onclick="f_req(\''.$row['init'].'\',\'N\')" value="reject"/>
        </div>
        <div id="frnd-d" style="background-color:#808080; display:none;" onclick="">
            <h3>'.$row['init'].'</h3>
        </div>
    </div>';
     $i++;
 }
    $i=0;
    //$f_array=array();
    
    echo "<h2>My Friends</h2><br/>";
    $u=$_SESSION['User'];
    
    $sql1="SELECT f2 FROM frnd_tbl WHERE f1='$u'";
    $result1=$con->query($sql1);
    
    $sql2="SELECT f1 FROM frnd_tbl WHERE f2='$u'";
    $result2=$con->query($sql2);
    
    while($row1 = $result1->fetch_assoc()){
    echo "<h3>".$row1['f2']."</h3>";
    //array_push($f_array,$row1['f2']);
    $i++;
    }
    
    while($row2 = $result2->fetch_assoc()) {
    echo "<h3>".$row2['f1']."</h3>";
    //array_push($f_array,$row2['f1']);
    $i++;
    }
    
    
 ?>

<p id="frame">
 
</p>
 


</body>
</html>
