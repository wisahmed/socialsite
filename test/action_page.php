<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "MyDB";

$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if (Isset($_POST['uname']) && !empty($_POST['uname']) && Isset($_POST['psw']) && !empty($_POST['psw'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['psw'];
    $sql = "SELECT * FROM Users WHERE uname='$uname' AND pass='$pass'";
    echo "<br/>$sql<br/>";

$result = $con->query($sql);

$row = mysqli_fetch_assoc($result);

if ($row) {
    session_start();
    $_SESSION["User"] = $uname;
    $_SESSION["ID"] = rand(10000000,99999999);
    header('location:index.php');
}
else {
    echo "wrong creds fuck off ...";
}
}
else if (Isset($_POST['fname']) && !empty($_POST['fname']) && Isset($_POST['lname']) && !empty($_POST['lname']) && Isset($_POST['uname']) && !empty($_POST['uname']) && Isset($_POST['psw1']) && !empty($_POST['psw1']) &&Isset($_POST['psw2']) && !empty($_POST['psw2'])) {
//echo "<script>alert('sending sign-up data');</script>";    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $psw1=$_POST['psw1'];
    $psw2=$_POST['psw2'];
    
    if ($psw1 == $psw2)
    {
        //echo "<script>alert('password matched');</script>";
        $sql="INSERT INTO Users (`uname`, `pass`, `fname`, `lname`) VALUES ('$uname', '$psw1', '$fname', '$lname')";
        $result = $con->query($sql);
        $row = mysqli_fetch_assoc($result);
        echo "Go login now";
    } else {
        echo "<script>alert('password mismatched');</script>";
    }
}
else if (Isset($_POST['feed']) && !empty($_POST['feed'])) {
    $feed=$_POST['feed'];
    $uname=$_SESSION['User'];
    $sql="INSERT INTO comment (`uname`, `text`, `time`) VALUES ('$uname', '$feed', CURRENT_TIMESTAMP)";
    //echo $sql."</br>";
    $result = $con->query($sql);
    //echo var_dump($result);
    header('location:home.php');
}
else if (Isset($_POST['feedc']) && !empty($_POST['feedc']) && Isset($_POST['postID']) && !empty($_POST['postID'])){
    $feedc=$_POST['feedc'];
    $uname=$_SESSION['User'];
    $postID=$_POST['postID'];
    $sql2="INSERT INTO comment_cmnt (`ID`, `uname`, `text`, `time`) VALUES ('$postID', '$uname', '$feedc', CURRENT_TIMESTAMP)";
    
    $result = $con->query($sql2);
    header('location: home.php');
} 
else if (Isset($_POST['tpDP']) & !empty($_POST['tpDP']) & Isset($_POST['tpname']) & !empty($_POST['tpname']) & Isset($_POST['tpDOB']) & !empty($_POST['tpDOB']) & Isset($_POST['tpwork']) & !empty($_POST['tpwork']) & Isset($_POST['tpinterest']) & !empty($_POST['tpinterest']) & Isset($_POST['tpAbout']) & !empty($_POST['tpAbout'])) {
    
    $uname=$_SESSION['User'];
    $tpDP1=$_POST['tpDP'];
    $tpDP=$uname.'/data/dp/'.$tpDP1;
    $tpDP_thumb=$uname.'/data/thumb/thumb_'.$tpDP1;
    $tpname=$_POST['tpname'];
    $tpwork=$_POST['tpwork'];
    $tpDOB=$_POST['tpDOB'];
    $tpinterest=$_POST['tpinterest'];
    $tpAbout=$_POST['tpAbout'];
    $fname=$uname.".txt";
    echo $fname;

    $str="".$tpDP."\n#".$tpname."#\n#".$tpDOB."#\n#".$tpwork."#\n#".$tpinterest."#\n#".$tpAbout."#";
    echo $str;
    $myfile=fopen($fname,"w");
    fwrite($myfile,$str);
    fclose($myfile);
    
    $sql="UPDATE `Users` SET `dp`='$tpDP_thumb' WHERE `uname`='$uname'";
        $result = $con->query($sql);
} 
else if (Isset($_POST['profld']) & !empty($_POST['profld']) ){
    if ($_POST['profld'] == $_SESSION['User'])
    {
        $str=$_POST['profld'].".txt";

        $myfile=fopen($str,"r");
        //echo fread($myfile, filesize($str));
        $i=0;
        $a[]=0;
        $tp=array("cpimg","cpname","cpwork","cpDOB","cpinterest","cpAbout");
        while (!feof($myfile)) {
            $a[$i]=fgets($myfile);
            echo "$tp[$i],$a[$i]";
            $i++;
        }
        fclose($myfile);
    }
} 
else if (Isset($_POST['profld1']) & !empty($_POST['profld1']) ){
        $strng=$_POST['profld1'].".txt";
        if (file_exists($strng)){
            $str=$strng;
        }else
        {
            $str="NA.txt";
        }
        $myfile=fopen($str,"r");
        $i=0;
        $a[]=0;
        $tp=array("cpimg","cpname","cpwork","cpDOB","cpinterest","cpAbout");
        while (!feof($myfile)) {
            $a[$i]=fgets($myfile);
            echo "$tp[$i],$a[$i]";
            $i++;
        }
        fclose($myfile);
        
} 
else if (Isset($_POST['f1']) & !empty($_POST['f1']) & Isset($_POST['f2']) & !empty($_POST['f2'])) { 
    $f1 = $_POST['f1'];
    $f2 = $_POST['f2'];//runner - reciever
    
    if ($f1==$f2){
        echo "true";
    }
    else                                                                                               
    {
    $n=0;
    $fc_array=array();
    
    $sqlc1="SELECT init FROM friend_req WHERE recv='$f2'";
    $resultc1=$con->query($sqlc1);
    $sqlc2="SELECT recv FROM friend_req WHERE init='$f2'";
    $resultc2=$con->query($sqlc2);
    
    while($rowc1 = $resultc1->fetch_assoc()){
    array_push($fc_array,$rowc1['init']);
    $n++;
    }
    while($rowc2 = $resultc2->fetch_assoc()) {
    array_push($fc_array,$rowc2['recv']);
    $n++;
    }

    $numc = count($fc_array);

    $n=0;
    $flag="false";
    while ($n<$numc){
        $fc_array["$n"];
    if ($f1 == $fc_array["$n"])
        $flag="true";
    $n++;
    }
    if ($flag=="true") {
        echo "False2";
    }
    else
    {//if no pending frnd reqs are available:
    $i=0;
    $f_array=array();
    
    $sql1="SELECT f2 FROM frnd_tbl WHERE f1='$f2'";
    $result1=$con->query($sql1);
    $sql2="SELECT f1 FROM frnd_tbl WHERE f2='$f2'";
    $result2=$con->query($sql2);
    
    while($row1 = $result1->fetch_assoc()){
    array_push($f_array,$row1['f2']);
    $i++;
    }
    while($row2 = $result2->fetch_assoc()) {
    array_push($f_array,$row2['f1']);
    $i++;
    }

    $num = count($f_array);

    $i=0;
    $flag="false";
    while ($i<$num){
        $f_array["$i"];
    if ($f1 == $f_array["$i"])
        $flag="true";
    $i++;
    }
    echo $flag;
    }
    }

}
else if (Isset($_POST['f_init']) & !empty($_POST['f_init']) & Isset($_POST['f_recv']) & !empty($_POST['f_recv'])) {
    $init=$_POST['f_init'];
    $recv=$_POST['f_recv'];
    
    $sql="INSERT INTO friend_req (`init`, `recv`) VALUES ('$init', '$recv')";

    $result = $con->query($sql);
    
    echo $init." has sent friend request to ".$recv;
}
else if (Isset($_POST['f_user']) & !empty($_POST['f_user']) & Isset($_POST['f_resp']) & !empty($_POST['f_resp'])) {
    //echo $_POST['f_resp']."<br/>";
    $f1=$_POST['f_user'];
    $f2=$_SESSION['User'];
    
    if ($_POST['f_resp']=='Y') {
    $sql1="INSERT INTO `frnd_tbl` (`f1`, `f2`) VALUES ('$f1','$f2')";
    $result1=$con->query($sql1);
      //  echo $sql1;
    }
    $sql="DELETE FROM `friend_req` WHERE init='$f1' AND recv='$f2'";
    $result=$con->query($sql);
    //echo $sql;
}
else if (isset($_POST['f_recv_chat']) && !empty($_POST['f_recv_chat'])){

    $tuser=$_POST['f_recv_chat'];
    header('location:test.php?tuser='.$tuser);
    
}
else {
    echo var_dump($_POST);
}

$con->close();

?>