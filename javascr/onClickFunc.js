
  $(function() {
    $(".s").on('click',function() {
      $("#mform").submit();
    });
    $(".m").on('click',function() {
      $(location).attr('href',"./member.php" );
    });

    $("#chk").on('click',function(){
      var id = $("#uid").val();
      if(id){
        id = "check.php?userid="+id;
        window.open(id,"_blank","width=300,height=100");
        }else{
          alert("이메일을 입력세요");
        }
    });

    $(".r").on('click',function() {
      $("#mform").submit();
    });

    $(".re").on('click',function() {
      $(location).attr('href',"./member.php" );
    });

    $(".b").on('click',function() {
      $(location).attr('href',"./login.php" );
    });

    $('.wb').hover(function() {
    $(this).css('cursor','Pointer');
    });

    $('.wb').children("a").css('text-decoration','none').css('color','black');

    $("a").css('text-decoration','none').css('color','black');


  });
