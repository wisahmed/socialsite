<?php
echo "<pre>";
echo var_dump($_FILES);
echo "</pre>";
?>
<body>
    <form>
    <input type="text" name="feed" id="feed" style="width: 676px;"/>
    <input type="button" onclick="poster()" value="GO"/>
    <input type="button" onclick="poof1();" value="image"/>
    </form>
    <form id="form1" action="test.php" method="POST" enctype="multipart/form-data" style="display:none;">
        <input type="file" id="post_img" name="post_img"/>
        </form>
</body>
<script>
function poster() {
    document.getElementById("form1").submit();
    //var temp = document.getElementById("post_img").files[0].tmp_name;
    //document.getElementById("form1").submit();
    //alert(Object.keys(document.getElementById("post_img").files[0]));
}
function poof1() {
    if (document.getElementById("form1").style.display=="block") {
        document.getElementById("form1").style.display = "none"; 
    }
    else {
        document.getElementById("form1").style.display = "block";
    }
}
</script>