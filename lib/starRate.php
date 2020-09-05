<?php
function starrate($value){
   $items = "";
   if($value == 0) {
   $items = '<span class="starR1" value="0.5"></span>
    <span class="starR2" value="1"></span>
    <span class="starR1" value="1.5"></span>
    <span class="starR2" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if($value<=0.5){
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2" value="1"></span>
    <span class="starR1" value="1.5"></span>
    <span class="starR2" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if (0.5<=$value && $value<1) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2" value="1"></span>
    <span class="starR1" value="1.5"></span>
    <span class="starR2" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(1<=$value && $value<1.5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1" value="1.5"></span>
    <span class="starR2" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(1.5<=$value && $value<2) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(2<=$value && $value<2.5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(2.5<=$value && $value<3) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(3<=$value && $value<3.5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2 on" value="3"></span>
    <span class="starR1" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(3.5<=$value && $value<4) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2 on" value="3"></span>
    <span class="starR1 on" value="3.5"></span>
    <span class="starR2" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(4<=$value && $value<4.5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2 on" value="3"></span>
    <span class="starR1 on" value="3.5"></span>
    <span class="starR2 on" value="4"></span>
    <span class="starR1" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if(4.5<=$value && $value<5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2 on" value="3"></span>
    <span class="starR1 on" value="3.5"></span>
    <span class="starR2 on" value="4"></span>
    <span class="starR1 on" value="4.5"></span>
    <span class="starR2" value="5"></span>';
  } else if($value == 5) {
    $items = '<span class="starR1 on" value="0.5"></span>
    <span class="starR2 on" value="1"></span>
    <span class="starR1 on" value="1.5"></span>
    <span class="starR2 on" value="2"></span>
    <span class="starR1 on" value="2.5"></span>
    <span class="starR2 on" value="3"></span>
    <span class="starR1 on" value="3.5"></span>
    <span class="starR2 on" value="4"></span>
    <span class="starR1 on" value="4.5"></span>
    <span class="starR2 on" value="5"></span>';
  }
  return $items;
} ?>
