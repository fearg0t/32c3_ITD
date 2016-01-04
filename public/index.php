<?php

if(isset($_COOKIE['admin'])){
  if($_COOKIE['admin'] === 'yES, i AM.'){
    header('Location: Ube3rS4xureAdmin/');
    exit();
  }
}

header('Location: posts/');
exit();

