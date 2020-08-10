 <?php
  session_start();
  
  $db = new mysqli("localhost","yunji","1234","movie_info");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>