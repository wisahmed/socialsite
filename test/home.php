<?php
function imgpull($str) {
    
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "MyDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql="SELECT `dp` FROM Users WHERE uname='$str'";
    //echo $sql;
    $result=$con->query($sql);
    $row = $result->fetch_assoc();
    
    return $row['dp']; 
}
?>
<body>
    <input type="text" name="feed" id="feed" style="width: 676px;"/>
    <input type="button" onclick="poster()" value="GO"/>
    <?php
    session_start();
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "MyDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    $i=0;
    $f_array=array();
    
    $u=$_SESSION['User'];
    
    $sql1="SELECT f2 FROM frnd_tbl WHERE f1='$u'";
    $result1=$con->query($sql1);
    
    $sql2="SELECT f1 FROM frnd_tbl WHERE f2='$u'";
    $result2=$con->query($sql2);
    
    while($row1 = $result1->fetch_assoc()){
    //echo "<h3>".$row1['f2']."</h3>";
    array_push($f_array,$row1['f2']);
    $i++;
    }
    
    while($row2 = $result2->fetch_assoc()) {
    //echo "<h3>".$row2['f1']."</h3>";
    array_push($f_array,$row2['f1']);
    $i++;
    }
    array_push($f_array,$_SESSION['User']);
    
    //echo var_dump($f_array);
    $imploded = implode("','", $f_array);    
// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql="SELECT * FROM comment WHERE uname IN ('{$imploded}') ORDER BY ID DESC";
    $result=$con->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br/>";
    echo '<div id="feed_body" style="width:764px;">
    <div id="feed_post" style="background-color:#808080">
        <img src="'.imgpull($row['uname']).'"/><h5>'.$row['uname'].' says </h5><h3>'.$row['text'].'<h3><h6> at '.$row['time'].'</h6>
        <button type="button" onclick="cdisp(\''.$row['ID'].'\')">cmnt</button>
    <input type="button" name="like" id="like_cnt" value="like" onclick=\'alert("liking ...");\'/>
    <div id="feed_comment'.$row['ID'].'" style="background-color:#C0C0C0; display:none;">
        <h5>';
        $sql2="SELECT * FROM comment_cmnt WHERE ID='".$row['ID']."'";
        $result2=$con->query($sql2);
        if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo $row2['uname'].' says '.$row2['text'].' at '.$row2['time'];
        echo "<br/><br/><hr>";
        }
    }
    echo '</h5>
        <form>
            <input type="text" id="feed'.$row['ID'].'" style="width: 672px;"/>
            <input type="button" onclick="cmnt_poster(\''.$row['ID'].'\')" Value="GO"/>
        </form>
        </div>
    </div>
</div>';
        }
    }
    ?>
</body>