function dis_toggle(n) {
    if (n==1) {
    document.getElementById("friend-body").style.display="none";
    document.getElementById("profile-body").style.display="block";
    }
    else if(n==0) {
    document.getElementById("friend-body").style.display="block";
    document.getElementById("profile-body").style.display="none";
    } 
}
function frnd_check(f1,f2) {
    //alert("ill check if "+f1+" and "+f2+" are friends");
    //f2 is the current user:
    //f1 is the initiator:
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      if (this.responseText == "true") {
          prof_clk(f1,1);
      } else if (this.responseText == "False2"){
          alert("Friend Req is pending at some end ...");
      }
        else {
          prof_clk(f1,0);
          dis_toggle(0);
      }
    }
    };
    xhttp.open("POST", "action_page.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("f1="+f1+"&f2="+f2);

}
function parser2(code) {
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
    dis_toggle(1);
}
function prof_load1(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //document.getElementById("demo1").innerHTML = this.responseText;
    parser2(this.responseText);
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("profld1="+str);  
}
function prof_click(str) {
    //var phpstr ="<?php echo $_SESSION['User'];?>";
    frnd_check(str,phpstr);
    //f2 is the current user:
    //f1 is the initiator:
}
function prof_clk(str,n) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frame").innerHTML = this.responseText;
      if (n==1){prof_load1(str);}
    }
    };
    xhttp.open("GET", "profile_v.php?user_name="+str, true);
      //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}
function search() {
  var query= document.getElementById('search').value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frame").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "result.php?query="+query, true);
  xhttp.send();
  
}
function poster() {
  var str1=document.getElementById("feed").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frame2").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("feed="+str1);
}
function cmnt_poster(n) {
  var str1=document.getElementById("feed"+n).value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frame").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("feedc="+str1+"&postID="+n);
  loadDoc('home.php');
}
function cdisp(n) {
    if (document.getElementById("feed_comment"+n).style.display=="block")
        document.getElementById("feed_comment"+n).style.display = "none"; 
    else
        document.getElementById("feed_comment"+n).style.display = "block";
}
function loadDoc(x) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("frame").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", x, true);
  xhttp.send();
}
function snd_req() {
    //var frnd1 ="<?php echo $_SESSION['User'];?>";
    var frnd2 =document.getElementById('Junk').innerHTML;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frame").innerHTML = this.responseText;
    }
    };
    xhttp.open("POST", "action_page.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("f_init="+frnd1+"&f_recv="+frnd2);
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
function f_req(user,str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("frame").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "action_page.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("f_user="+user+"&f_resp="+str);
}
function msgload(str) {
    document.getElementById('myForm_'+str).submit();
}
//lightbox stuff
function openModal() {
  document.getElementById('myModal').style.display = "block";
}
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
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
