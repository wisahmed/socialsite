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
<!DOCTYPE html>
<html>
<body>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="photo.php">Photo</a>
  <a href="profile.php">Profile</a>
  <a href="logout.php">Log-out</a>
</div>

<div id="main">
    <div id="demo">
        <button type="button" onclick="openNav()">Menu</button><h2>Good Day <i><?php echo $_SESSION['User'];?></i>, How is it going ?</h2>
        <button type="button" onclick="loadDoc('home.php')">Home</button>
        <button type="button" onclick="loadDoc('msg.php')">Messages</button>
        <button type="button" onclick="loadDoc('test_frnd.php')">Friends</button>
        <button type="button" onclick="loadDoc('notify.html')">Notification</button>
        <button type="button" onclick="loadDoc('r_page.html')">Settings</button>
        <input type="text" name="text" id="search" value="" placeholder="Search ..."/>
        <button type="button" onclick="search()">GO</button>
        <hr/>
    </div>
    <p id="frame2"></p>
    <div id="frame">
    </div>
</div>
    <script type="text/javascript">
    var phpstr ="<?php echo $_SESSION['User'];?>";
    var frnd1 ="<?php echo $_SESSION['User'];?>";
    </script>
<script src="js/index.js"></script>
</body>
</html> 
