<body onload="prof_load1()">
    <!--<div id="prof_dis" style="width:764px;">-->
    <div id="profile-body" style="width:764px;display:none;">
        <div id="pimg" style="background-color:#808080">
            <div id="cpimg"></div>
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
        
        <form id="myForm_n" action="test.php" method="post">
        <input type="hidden" name="f_recv" value="<?php echo $_GET['user_name'];?>"/>
        </form>
        <input type="button" id="smsg" onclick="msgload('n')" value="Send Message"/>
        <input type="button" id="photo_v" onclick="loadDoc('test_photo.php?user=<?php echo $_GET['user_name'];?>');" value="View Photos"/>
        <div id="Junk" style="display:none;"><?php echo $_GET['user_name'];?></div>
    </div>
    <div id="friend-body" style="width:764px;">
        <div id="frnd-i" style="background-color:#808080; display:block;">
            <h3>Hello Friend</h3>
            <input type="button" id="snd_req" onclick="snd_req()" value="Send Req"/>
        </div>
        </div>
    
    
</body>