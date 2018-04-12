<?php
session_start();

$ubase=$_SESSION['User'];
$base="$ubase/data";
$thumbn="$base/thumb";
if (isset($_POST['folder'])) {
    $fname=$_POST['folder'];
    mkdir($base."/".$fname);
    header("Location: photo.php");
}

if (isset($_POST['file'])) {
    $upld=$_POST['file'];
}

include('image.inc.php');

if (isset($_FILES['upload'])) {
    $files=$_FILES['upload'];

    for($x=0;$x<count($files['name']);$x++) {
        $name=$files['name'][$x];
        $tmp_name=$files['tmp_name'][$x];
        move_uploaded_file($tmp_name, $base.'/'.$upld.'/'.$name);
        create_thumb($base.'/'.$upld.'/'.$name, $base.'/thumb/'.$name , 120 , 80 );
    }    
    
}

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <style>
        

/* The Modal (background) */
.out .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.out .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.out .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.out .close:hover,
.out .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

        
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
    </head>
    <body>
    <?php
        
        if (isset($_SESSION) && !empty($_SESSION))
        {
            //echo var_dump($_SESSION);
        }
        else
        {
            header('location:login.html');
        }
        $page=$_SERVER['PHP_SELF'];
        $container=2;
        $thumb="thumb";

        if (isset($_GET['album'])&&!empty($_GET['album'])){
        $get_album=$_GET['album'];}
        else {$get_album=0;}
        if ( is_dir($ubase) )
        {
            if (!($get_album)) {
            echo "Select an Album:";
            echo "<input type=\"button\" value=\"ADD\" onclick=\"open_div('0');\" style=\"float:right;\"/>";
            echo "<div id=\"upld_0\" style=\"display:none;\"><form action=\"album.php\" method=\"post\"><input type=\"textarea\" name=\"folder\"/><input type=\"submit\" value=\"Upload\"/></form></div>";
            echo "<br/><br/>";
            $handle=opendir($base);
            while (($file=readdir($handle))!==FALSE) {
                if (is_dir($base."/".$file)){
                    if ($file=="." || $file==".." || $file==$thumb) {
                    //echo "";
                    }
                    else {
                        echo "<div id=\"album_$file\" style=\"width:764px;background-color:#808080;font-size:150%\">";
                        echo "<a href='$page?album=".$file."'>".$file."</a>";
                        echo "<button id=\"img_add_$file\" style=\"float: right;\" onclick=\"open_div('$file')\">Add</button>";
                        echo "<div id=\"upld_$file\" style=\"display:none;\">";
                        echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\"><input type=\"file\" name=\"upload[]\" multiple /><input type=\"hidden\" name=\"file\" value=\"$file\"/><input type=\"submit\" value=\"Upload\"/></form>";
                        echo "</div>";
                        echo "</div><br/>";
                    }
                }
            }
        } else { //strstr for directory traversal
            if (!is_dir($base."/".$get_album) || strstr($get_album,".")!=NULL || strstr($get_album,"/")!=NULL || strstr($get_album,"\\")!=NULL) {
                echo "Album doesnt Exist";
                echo "<br/><a href='$page'>Back to Page...</a><br/>";
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
                echo "<br/><a href='$page'><h4>Back to Albums</h4></a>";
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
        } else { 
        mkdir($ubase);
        mkdir($base);
        mkdir($thumbn);
        header("Location: photo.php");
        }
    ?>     
</body>
<script>
function open_div(file) {
    //alert(file);
    var data = document.getElementById('upld_'+file);
    if ( data.style.display === "none" ) {
        data.style.display = "block";
    }else {
        data.style.display = "none";
    }
}
 // Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}   
</script>
</html>