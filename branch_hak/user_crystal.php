<?php
include "../lib/db.php";
$user_id = $_SESSION['user_id'];

$sql = mq("select * from user where user_id ='".$user_id."'");
$codecheck = $sql->fetch_array();

$email = $codecheck['email'];
$name = $codecheck['name'];
$addr = $codecheck['addr'];
$tel = $codecheck['tel'];
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">

    <?php if($codecheck['code'] == 'A'):?>

    <?php else : ?>
    <?php endif; ?>


                </tr>
                <tr>
                  <td>tell</td>
                  <td colspan="9">
                    <input type="text" size="35" name="tel" placeholder="<?php echo $tel ?>" readonly></td>








