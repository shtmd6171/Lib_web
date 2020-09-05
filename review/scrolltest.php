
<script type="text/javascript">
$(function() {
  $(window).scroll(function() {
      var scrollHeight = $(window).scrollTop()+$(window).height();
      var documentHeight = $(document).height();
      if (scrollHeight == documentHeight ) {
        $("body").append("???");
      }
  });
});

</script>


<?php
  function aa() {
    echo "<div>???</div>";
  }
 ?>
