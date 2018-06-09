<?php
session_start();

session_unset();//清空数组

session_destroy();

setcookie(session_name(),"",time()-3600,"/");

echo "<script>location='../../login.html'</script>";

?>