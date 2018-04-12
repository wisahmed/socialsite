<?php

function create_thumb($path, $save, $width, $height) {
    $info = getimagesize($path);
    $size=array($info[0],$info[1]);
    
    if ($info['mime'] == 'image/png') {
        $src=imagecreatefrompng($path);
    } else if ($info['mime'] == 'image/jpeg') {
        $src=imagecreatefromjpeg($path);
    } else if ($info['mime'] == 'image/gif') {
        $src=imagecreatefromgif($path);
    } else {
        return false;
    }
    
    $thumb = imagecreatetruecolor($width,$height);
    
    $src_aspect = $size[0]/$size[1];
    $thumb_aspect = $width/$height;
    
    if ($src_aspect < $thumb_aspect ) {
        //narrower
        $scale = $width/$size[0];
        $new_size = array($width, $width / $src_aspect);
        $src_pos = array(0, ($size[1]*$scale - $height)/$scale / 2);
        
    } else if ($src_aspect > $thumb_aspect ) {
        //wider
        $scale = $height/$size[0];
        $new_size = array($height*$src_aspect, $height);
        $src_pos = array(($size[0]*$scale - $width)/$scale/2, 0);
    } else {
        //same shape
        $new_size=array($width,$height);
        $src_pos=array(0,0);
    }
    
    $new_size[0] = max($new_size[0],1);
    $new_size[1] = max($new_size[1],1);
    
    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
    
    if ($save === false) {
        return imagejpeg($thumb);
    } else {
        return imagejpeg($thumb, $save);
    }
    
}

?>