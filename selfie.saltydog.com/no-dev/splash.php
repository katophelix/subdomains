<?php
if(isset($_POST['image'])){
	$image = $_POST['image'];
	
}
?>
<div class="pages" style="overflow-y:scroll;z-index:1;">
  <!-- Page, data-page contains page name-->
  <div data-page="splash" class="page">
  <div id="test" data-field=""></div>
  <div id="success" style="width: 80%;margin: 70px auto;background: rgba(255,255,255,.9);color: #3b3b3b;text-align: center;font-size: 16px;padding: 10px;border-radius: 4px;display: none;position: absolute;z-index: 9999;left: 50%;margin-left: -40%;">
  Your Photo Has Been Sent
  </div>
   <div id="success2" style="width: 80%;margin: 70px auto;background: rgba(255,255,255,.9);color: #3b3b3b;text-align: center;font-size: 16px;padding: 10px;border-radius: 4px;display: none;position: absolute;z-index: 9999;left: 50%;margin-left: -40%;">
  You've been Entered! Good Luck!
  </div>
    <!-- Scrollable page content-->
    <div class="page-content"  style="padding-bottom:244px;">
      <div class="content-block">
        <div class="content-block-inner">
   <div style="position:relative;width:100%;height:100%;text-align:center;color:#fff;font-size:30px;">
       
        <?php if($image != ''){?>
          <img src="http://saltydog.com/src/<?php echo $image;?>.jpg" style="width:100%;position:relative;top:0;z-index:9999999;left:0;" />
          <?php }else{?>
          
          <!--<img id="newimg" src="" style="width:100%;position:relative;top:0;z-index:9999999;left:0;max-width:640px;">-->
          <div class="frameWrapper">
          <iframe src="" style="width:100%;position:relative;top:0;z-index:9999999;left:0;max-width:640px;" frameborder="0" id="iframe1" marginheight="0" frameborder="0"></iframe>
         </div>
          <?php }?>
</div>
          
         
          </div>
          <div style="position:absolute;top:97%;width:100%;">
         <a href="email.php" class="button button-big  active" style="margin-top:10px;">Email Your Photo </a>
       
<!--<a href="contest.php" class="contest button button-big  active" style="margin-top:10px;">Enter in Photo Contest </a>-->
<a href="#" class="discard button button-big  active color-red" style="margin-top:0px;width:44%;float:left;margin-left:5%;">Discard</a>
<a href="#" class="download button button-big  active color-green" style="margin-top:0px;width:44%;float:left;margin-left:2%;margin-right:5%;">Save Photo</a>
<div style="width:100%;color:#fff;font-size:10px;text-align:center;padding:10px;"><div style="width:90%;text-align:left;text-align:center;">Salty Dog does not store or share your e-mail address.</div></div>
</div>

        </div>
        
      </div>
    </div>
    
  </div>
</div>
