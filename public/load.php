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

