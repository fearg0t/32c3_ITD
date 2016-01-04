<p>Welcome back Master!</p><br/><?php
require_once 'sess.php';
require_once '../load.php';

if(isset($_GET['lang']) and (is_string($_GET['lang']))){
  $_SESSION['lang'] = filter($_GET['lang']);
}
if(isset($_GET['act']) and (is_string($_GET['act']))){
  $act = $_GET['act'];
  if ($act === 'get'){
    if(isset($_GET['key']) and (is_string($_GET['key']))){
      $key = $_GET['key'];
      $ret = shell_exec('./main ' . md5($key));
      if(preg_match('/LOOSE/',$ret))
        echo "You lost, All Roads They Lead To Shame :> ";
      else {
	echo "Hello, it's flag: ";
	echo shell_exec('./get');
	exit();
      }
    }
  }
}
?>
<form action=''>
<input name='key' placeholder='key'/>
<input name='act' value='get' type='hidden' />
<input type='submit' value='STRONG Auth ' />

</form>
