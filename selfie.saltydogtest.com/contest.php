
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class="navbar">
  <div class="navbar-inner">
    <div class="left"><a href="#" class="back link"> <i class="icon icon-back"></i><span>Back</span></a></div>
    <div class="center sliding">Form</div>
    <div class="right">
      <!-- Right link contains only icon - additional "icon-only" class--><a href="#" class="link icon-only open-panel"> <i class="icon icon-bars"></i></a>
    </div>
  </div>
</div>
<div class="pages" style="z-index:1;position:relative;">
  <!-- Page, data-page contains page name-->
  <div data-page="contest" class="page">
  
  <form id="webshot" name="webshot" action="http://saltydog.com/selfie-test.php/?v=<?php echo rand();?>" method="POST">
    <!-- Scrollable page content-->
    <div class="page-content" style="padding-bottom:44px;margin-bottom:0;">
    <div class="content-block-title">
      <div  style="color:#fff;width:58%;float:left;white-space:normal;line-height:22px;font-size:20px;">Salty Dog Photo of the Month Contest</div>
      <div style="width:40%;float:left;margin-left:2%;"><img id="photo" src="" alt="Hi From the Salty Dog Cafe" title="Hi From The Salty Dog Cafe" style="width:100%;"></div>
     
      </div>
      <div style="clear:both;"></div>
       <hr style="width:90%;margin:20px auto;opacity:.3;">
       <p style="padding:0 20px;">Submit your picture! Fill out this form and click Submit to enter the Photo of the Month contest.</p>
      <div class="list-block" style="margin-bottom:20px;margin-top:0;">
               <style>
			   .page{
				   overflow-y:scroll;
			   }
		  input[type="text"],input[type="email"],textarea{
			  border:1px solid #4c5f73 !important;
			  background:#3f5165 !important;
			  padding:10px !important;
			  border-radius:3px !important;
			  width:100% !important;
			  color:#fff !important;
		  }
		  .list-block li{
			  margin:10px 0 !important;
		  }
		  .list-block textarea{
			  height:70px !important;
		  }
		  .message{
			  max-width:100%;
		  }
		  </style>
        <ul>
          <li>
            <div class="item-content">
              <div class="item-media"><i class="icon icon-form-name"></i></div>
              <div class="item-inner"> 
               
                <div class="item-input">
                  <input type="text" name="fname" placeholder="First Name"/>
                </div>
              </div>
            </div>
          </li>
          <li>
           <li>
            <div class="item-content">
              <div class="item-media"><i class="icon icon-form-name"></i></div>
              <div class="item-inner"> 
               
                <div class="item-input">
                  <input type="text" name="lname" placeholder="Last Name"/>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="item-content">
              <div class="item-media"><i class="icon icon-form-email"></i></div>
              <div class="item-inner"> 
        
                <div class="item-input">
                  <input type="email" name="email" placeholder="E-mail Address"/>
                </div>
              </div>
            </div>
          </li>
          <li>
      <label class="label-checkbox item-content">
        <!-- Checked by default -->
        <input type="checkbox" name="my-checkbox" value="Subscribe" checked="checked">
        <div class="item-media">
          <i class="icon icon-form-checkbox"></i>
        </div>
        <div class="item-inner">
          <div class="item-title" style="white-space:normal;font-size:12px;">I would like to receive occasional special news and offers about The Salty Dog and South Beach Marina</div>
        </div>
      </label>
    </li>
        </ul>
      </div>
      <input type="hidden" id="email-image" name="image" value="">
      <div class="content-block" style="max-width:95%;margin:0 auto;">
        <div class="row">
          <div class="col-50"><a href="#" class="cancel button button-big button-fill">Cancel</a></div>
          <div class="col-50">
            <input type="submit" id="submit" value="Submit" class="button button-big button-fill color-green"/>
          </div>
        </div>
      </div>
   <p style="padding:0 20px;font-size:12px;margin:0">Jake's Privacy Guarantee: This information will not be shared with a third party and it will only be used to send your requested information.</p>
    </div>
    </form>
   
  </div>
</div>