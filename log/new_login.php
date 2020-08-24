<?php
include "../lib/db.php";
 ?>

 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name = "google-signin-client_id"content = "802907034805-ckgp6p4h7di1vbp8g2c2s0v2mmhbmpap.apps.googleusercontent.com">
     <script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <title></title>
   </head>
   <body>
     <div class="g-signin2" data-onsuccess="onSignIn"></div>
   <script>
     function init() {
     var Auth = gapi.auth2.init ({ client_id : '802907034805-ckgp6p4h7di1vbp8g2c2s0v2mmhbmpap.apps.googleusercontent.com' });

     Auth.then(function() {
       var User = Auth.currentUser.get ()
       var me = User.getBasicProfile();
       console.log(me);
       $(function() {
         $('p').html(me.getName());
       })
     }),
     function() {
     }

  }


   </script>
   <p></p>
   </body>
 </html>
