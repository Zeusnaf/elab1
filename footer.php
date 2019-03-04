
<div class="well" style="background:#1e90ff;color:white;text-align:center">
<p>Designed by Naftaly||All right reserved &copy;<?php echo date('Y'); ?></p>
</div>
<script src="jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
  $(document).ready(function(){
      $(".hover").hover(function(){
         
          $(this).css({"color":"rgb(255, 88, 33)","background":"#cccccc"});
      },function(){
         
          $(this).css({"color":"black","background":""});
      });

      $('.dropdown').hover(function(){
          $('.dropdown-menu').show();
      },function(){
          $('.dropdown-menu').hide();
      });
      $('.unique').hover(function(){
        $(this).css({"color":"rgb(255, 88, 33)"});  
      },function(){
        $(this).css({"color":"#cccccc"}); 
      });
  });
 
    
  </script>
</body>
</html>