<html>
    <head>
    </head>
    <style>
.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 8%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
</style>
    <body>
    <?php
        
        $user=$_GET['user'];
        $page=$_SERVER['PHP_SELF'];
        $container=2;
        $base="$user/data";
        $thumb="thumb";
        if (isset($_GET['album'])&&!empty($_GET['album'])){
        $get_album=$_GET['album'];}
        else {$get_album=0;}
        
        if (!($get_album)) {
            echo "Select an Album:<br/><br/>";
            $handle=opendir($base);
            while (($file=readdir($handle))!==FALSE) {
                if (is_dir($base."/".$file)){
                    if ($file=="." || $file==".." || $file==$thumb) {
                    //echo "";
                    }
                    else {
                        echo "<a onclick=\"loadDoc('$page?user=".$user."&album=".$file."');\">".$file."</a><br/>";
                    }
                }
            }
        } else { //strstr for directory traversal
            if (!is_dir($base."/".$get_album) || strstr($get_album,".")!=NULL || strstr($get_album,"/")!=NULL || strstr($get_album,"\\")!=NULL) {
                echo "Album doesnt Exist";
                echo "<br/><a onclick=\"loadDoc('$page?user=".$user."');\">Back to Page...</a><br/>";
            } else {
                $i=1;
                $x=0;
                echo "<b>$get_album</b><br><br />";
                echo "<div class=\"row\"><table><tr>";
                $handle=opendir($base."/".$get_album);
                while (($file=readdir($handle))!==FALSE) {
                    if ($file!=="." && $file!=="..") {
                echo '<div class="column">
                <td><img src="'.$base.'/'.$thumb.'/'.$file.'" onclick="openModal();currentSlide('.$i++.')" class="hover-shadow"></td>
                </div>';
                }}
                echo "</div></tr></table>";
                echo "<br/><a onclick=\"loadDoc('$page?user=".$user."');\"><h4>Back to Albums</h4></a>";
                ?>        
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
                <?php
                $i=1;
                $handle=opendir($base."/".$get_album);
                    while (($file=readdir($handle))!==FALSE) {
                        if ($file!=="." && $file!=="..") {
                echo '<div class="mySlides">
                <img src="'.$base.'/'.$get_album.'/'.$file.'" style="width:100%">
                </div>';}}
                ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
      
<div class="caption-container">
      <p id="caption"></p>
    </div>
  </div>
</div>
    <?php        }
        }
    ?>     
</body>
</html>