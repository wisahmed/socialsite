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

?>
<body onload="profload()">
    <div id="test_p" style="width:764px;">
    <div id="profile-body" style="display:block;">
        <div id="pimg" style="background-color:#808080">
            <div id="cpimg"><img src="" /></div>
            <hr>
        </div>
        <div id="pname" style="background-color:#808080">
            <div id="cpname"><h3>Name:</h3></div>
            <hr>
        </div>
        <div id="pDOB" style="background-color:#808080">
            <div id="cpDOB"><h3>DOB:</h3></div>
            <hr>
        </div>
        <div id="pwork" style="background-color:#808080">
            <div id="cpwork"><h3>Work:</h3></div>
            <hr>
        </div>
        <div id="pinterest" style="background-color:#808080">
            <div id="cpinterest"><h3>Interest:</h3></div>
            <hr>
        </div>
        <div id="pAbout" style="background-color:#808080">
            <div id="cpAbout"><h3>About You:</h3></div>
            <hr>
        </div> 
    </div>
    <div id="test" style="display:none;">
        <form id="form1" action="profile.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="1tpDP" name="tpDP">
        </form>
    <form>
        <input type="text" id="1tpname" name="1tpname" value="" placeholder="name"/><br/>
        <input type="text" id="1tpDOB" name="1tpDOB" value="" placeholder="DOB"/><br/>
        <input type="text" id="1tpwork" name="1tpwork" value="" placeholder="work"/><br/>
        <input type="text" id="1tpinterest" name="1tpinterest" value="" placeholder="interest"/><br/>
        <input type="text" id="1tpAbout" name="1tpAbout" value="" placeholder="about"/><br/>
    </form>
    </div>
        <div id="test1">
        <br/>
<?php
        $user=$_SESSION['User'];
        $dp="$user/data/dp";
        $thumb="$user/data/thumb";
    if (isset($_FILES) && !empty($_FILES)) {
        if (!is_dir($dp)){
            mkdir($dp);
        }
        include('image.inc.php');
        $temp=$_FILES['tpDP']['tmp_name'];
        $name=$_FILES['tpDP']['name'];
        create_thumb($temp, $dp.'/'.$name, 300,300);
        create_thumb($temp, $thumb.'/thumb_'.$name, 100,100);
    }
?>
        </div>
    <input type="button" onclick="poof()" value="Update"/>
    </div>
</body>
<script>
function parser(code) {
    var cpdata=code.split('\n');
    var i=0;
    var res;
    var len=cpdata.length;
    while(i<len){
        res = cpdata[i].split(',');
        if (i === 0) {
            document.getElementById(res[0]).innerHTML="<img src=\""+res[1]+"\"/>";
        } else {
        document.getElementById(res[0]).innerHTML=res[1];
        }
        i++;
    }
}
function profload() {
  var str='<?php echo $_SESSION['User'];?>';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    parser(this.responseText);
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("profld="+str);  
}
function loader() {
  var img=document.getElementById("1tpDP").files[0].name;
  var name=document.getElementById("1tpname").value;
  var DOB=document.getElementById("1tpDOB").value;
  var work=document.getElementById("1tpwork").value;
  var interest=document.getElementById("1tpinterest").value;
  var About=document.getElementById("1tpAbout").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test1").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhttp.send("tpDP="+img+"&tpname="+name+"&tpDOB="+DOB+"&tpwork="+work+"&tpinterest="+interest+"&tpAbout="+About);
}
function poof() {
    if (document.getElementById("test").style.display=="block") {
        document.getElementById("test").style.display = "none"; 
        document.getElementById("profile-body").style.display = "block";
        document.getElementById("form1").submit();
        loader();
    }
    else {
        document.getElementById("test").style.display = "block";
        document.getElementById("profile-body").style.display = "none";
    }
}
</script>