<?php
session_start();

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "MyDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    $i=0;
    $frnds=array();
    $u=$_SESSION['User'];
    
    $sql1="SELECT f2 FROM frnd_tbl WHERE f1='$u'";
    $result1=$con->query($sql1);
    
    $sql2="SELECT f1 FROM frnd_tbl WHERE f2='$u'";
    $result2=$con->query($sql2);
    
    while($row1 = $result1->fetch_assoc()){
    $frnds[$i++]=$row1['f2'];
    }
    
    while($row2 = $result2->fetch_assoc()) {
    $frnds[$i++]=$row2['f1'];
    }
   
?>
<html>
    <body>
        <h1>messages</h1>
<?php 
        
foreach($frnds as $key => $item) {
echo <<<EOD
<div id="msg_user" style="width:764px;background-color:#808080;height:50px;" onclick="msgload('$key')">
<form id="myForm_$key" action="test_chat.php" method="post">
<input type="hidden" name="f_recv" value="$item"/>
</form>
            <h3>$item</h3></div>
EOD;
}
?>        
    </body>
</html>