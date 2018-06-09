<?php
   $conn = mysqli_connect("localhost","root","12345678","myfishtank");
   if(!$conn){
     die("连接错误".mysqli_connect_error());
   }
?>