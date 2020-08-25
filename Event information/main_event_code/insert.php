<?php
    include "../connect_db.php";
 
    session_start();
 
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $name = $_SESSION['userNAME'];
 
    // 제목하고 글 내용이 비어있는지 확인 후 insert 쿼리 실행
    if($title == NULL){
        echo "Fail:title";
    }else if($contents == NULL){
        echo "Fail:contents";
    }else{
        $datetime = date_create()->format('Y-m-d H:i:s');
        $sql = "INSERT INTO board VALUES (NULL,'$title','$name','$contents','$datetime',0)";
 
        $result = $db->query($sql);
        if($result){
            echo "success";
        }else{
            echo "Fail:save";
        }
    }
?>
