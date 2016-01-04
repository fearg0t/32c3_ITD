<?php
function filter($v){
  $w = array('<','>','\.\.','^/+.*','file:///','php://','data://','zip://','ftp://','phar://','zlib://','glob://','expect://');
  $w = implode('|',$w);
  if(preg_match('#' . $w . '#i',$v) !== 0){
    die("Die, Die My Darling");
    exit();
  }
  return $v;
}

function disable_wrappers(){
    $wrappers=array("php","http","https","ftp","ftps","compress.zlib","compress.bzip2","zip","glob","data");
    foreach($wrappers as $v){
    stream_wrapper_unregister($v);
    }
}
function get_posts(){
    $dir=scandir(".");
    $dir = array_filter(scandir('.'), function($item) {
        return !is_dir('./' . $item);
    });
    $posts=array();
    foreach($dir as $v){
      if($v!=="." && $v!==".." && (strpos($v,'.php')===false)){
        $posts[]=array($v,substr(file_get_contents("$v"),0,100));
      }
    }
    return $posts;
}

function get_post($name){
    disable_wrappers();
    return array($name,@file_get_contents(filter($name)));
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>ITD</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css" media="all">
@import "images/style.css";
</style>
</head>
<body>
<div class="content">
  <div class="toph"></div>
  <div class="center">
  <h1>Impeccable Tales of Donger</h1>
    <?php
      if(!@$_GET['p']){
        foreach(get_posts() as $v){
          echo '
            <h2><a href="?p='.$v[0].'">'.$v[0].'</a></h2>
            '.$v[1].'
            <p class="date"><img src="images/more.gif" alt="" /> <a href="?p='.$v[0].'">Read more</a> <img src="images/comment.gif" alt="" /> <img src="images/timeicon.gif" alt="" /> 21.02.</p>
            <br />
          ';
        }
      }elseif($v=get_post(@$_GET['p'])){
        echo '
            <h2>'.$v[0].'</h2>
            '.$v[1].'
            <p class="date"><img src="images/more.gif" alt="" /> <a href="./">Back</a> </p>
            <br />
          ';
      }
    ?>
  </div>
  <div class="footer"></div>
</div>
</body>
</html>
