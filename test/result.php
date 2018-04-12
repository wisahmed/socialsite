<?php
session_start();
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "MyDB";
    $qry=$_GET['query'];
    
    $con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    echo "<h3>Users ...</h3><br>";
    $sql_u="SELECT * FROM Users WHERE uname LIKE '%$qry%'  OR fname LIKE '%$qry%'  OR lname LIKE '%$qry%'"; 
    $result=$con->query($sql_u);
    //echo var_dump($result);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row_u = $result->fetch_assoc()) {
        echo '<div id="frnd-d" style="background-color:#808080" onclick="prof_click(\''.$row_u['uname'].'\')">';
        echo "<h3>".$row_u['fname']." ".$row_u['lname']."</h3><br>";
        echo "</div>";
    }
    } else {
        echo "No Users found...<br>";
    }
    echo "<h3>Posts ...</h3><br>";
    $sql_p="SELECT * FROM comment WHERE text LIKE '%$qry%'"; 
    $result=$con->query($sql_p);
    //echo var_dump($result);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row_p = $result->fetch_assoc()) {
        echo "User-name   : ".$row_p['uname']."<br>";
        echo "Text        : ".$row_p['text']."<br>";
        echo "Time        : ".$row_p['time']."<br><br><hr>";
    }
    }
    echo "<h3>Comments ...</h3><br>";
    $sql_c="SELECT * FROM comment_cmnt WHERE text LIKE '%$qry%'";
    
    $result=$con->query($sql_c);
    //echo var_dump($result);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row_p = $result->fetch_assoc()) {
        $sql_pc="SELECT * FROM comment WHERE ID='".$row_p['ID']."'";
        $result=$con->query($sql_pc);
        $row_pc = $result->fetch_assoc();
        echo "User-name   : ".$row_p['uname']."<br>";
        echo "Post-Text   : ".$row_pc['text']."<br>";
        echo "Text        : ".$row_p['text']."<br>";
        echo "Time        : ".$row_p['time']."<br><br><hr>";
    }
    }

?>