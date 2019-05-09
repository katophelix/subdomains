// Initialize your app
var myApp = new Framework7({
	externalLinks: '.external',
});

// Export selectors engine
var $$ = Dom7;

// Add view
var mainView = myApp.addView('.view-main', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true,
	
});

// Callbacks to run specific code for specific pages, for example for About page:
myApp.onPageInit('about', function (page) {
    // run createContentPage func after link was clicked
    $$('.create-page').on('click', function () {
        createContentPage();
    });
});
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
var num = getRandomInt(1000, 9999);
 myApp.onPageInit('index', function (page) {
	var number = getRandomInt(1000, 9999);
	
jQuery(document).ready(function($){
	var temp1 = $('.weather_font tr:eq(2)');
	var temp = $('td:eq(1)',temp1).text();
	//var temp = temp.substring(0,2);
	//temp = Number(temp);
	temp = Math.round(parseInt(temp));
	$('#temp').html(' ' + temp + '&deg;');
	var wind2 = $('td:eq(3)',temp1).text();
	$('.wind2').html('<span style="font-size:14px">Wind ' + wind2 + '</span>');
});

 });
 myApp.onPageInit('splash', function (page) {




				   console.log(number);
				    setTimeout(function(){
 document.getElementById("newimg").src="http://saltydog.com/src/image-" + number + ".jpg";
    },1000);
	$('.download').on('click',function(e) {
		e.preventDefault();
    myApp.alert('To save - touch and hold the image with your finger, then select the appropriate option.', 'Save My Selfie');
})


	var target = $('iframe').attr('src');
	$('iframe').attr('src','http://saltydog.com/selfie/dev/dl.php?image=http://saltydog.com/src/image-' + number + '.jpg');
			  
//setTimeout(function(){
// $('.ups').text('Great Shot!');
//},4000);


jQuery(document).ready(function($){
var url="index.php";
$('.discard').on('click',function(e){
	e.preventDefault();     
mainView.router.loadPage('http://saltydog.com/selfie/dev/index.php');

})

});

})
 myApp.onPageInit('email', function (page) {
document.getElementById("photo").src="http://saltydog.com/src/image-" + number + ".jpg";

jQuery(document).ready(function($){
$('#email-image').attr('value','image-' + number);
var url="index.php";
$('.cancel').on('click',function(e){
	e.preventDefault();     
mainView.router.back();
});
});
function test4(){
	var postData = $('#webshot').serialize();
	var message = $('textarea[name=message]').value;
	if ($('.message').val().length === 0 ){
		$('.message').val('No Message');
	}
	$.ajax({
           type: "POST",
           url: 'http://saltydog.com/test4.php',
           data: $("#webshot").serialize(), // serializes the form's elements.
           success: function(data)
           {
			 console.log(data);
			 console.log(postData);
			 
           // window.location.href = '/selfie-test.php/';
			//$('#webshot').find("input[type=text]").val("");
           }
         });
};
function test6(){
	var postData = $('#webshot').serialize();
	var message = $('textarea[name=message]').value;
	if ($('.message').val().length === 0 ){
		$('.message').val('No Message');
	}
	$.ajax({
           type: "POST",
           url: 'http://saltydog.com/test6.php',
           data: $("#webshot").serialize(), // serializes the form's elements.
           success: function(data)
           {
			 console.log(data);
			 console.log(postData);
			 
           // window.location.href = '/selfie-test.php/';
			//$('#webshot').find("input[type=text]").val("");
           }
         });
};
function test2(){
	var url = 'http://saltydog.com/test2.php';
    var postData = $('#webshot').serialize();
	var message = $('textarea[name=message]').value;
	if ($('.message').val().length === 0 ){
		$('.message').val('No Message');
	}
    var formURL = url;
    $.ajax({
           type: "POST",
           url: formURL,
           data: $("#webshot").serialize(),
           success: function(data)
           {
			 console.log(data);
			 console.log(postData);
		 $('input[type=text],input[type=email],textarea').each(function(){
				 $(this).val('');
			 });
			// mainView.router.back($('#success').fadeIn().delay(1500).fadeOut());
           }
         });
   
}

jQuery(document).ready(function(){
	$("#webshot").on('click','#submit',function(e)
{
 e.preventDefault();
test2();
test4();
//test6();
mainView.router.back($('#success').fadeIn().delay(1500).fadeOut());
});
$("#webshot").submit();

});

 });
 
 
  myApp.onPageInit('contest', function (page) {
$('#email-image').attr('value','image-' + number);
document.getElementById("photo").src="http://saltydog.com/src/image-" + number + ".jpg";
$('.cancel').on('click',function(e){
	e.preventDefault();     
mainView.router.loadPage('http://saltydog.com/selfie/dev/index.php');
});
jQuery(document).ready(function(){
	$("#webshot").on('click','#submit',function(e)
{
	e.preventDefault();
	mainView.router.loadPage('http://saltydog.com/selfie/dev/index.php');
    var url = 'http://saltydog.com/test3.php';
    var postData = $('#webshot').serialize();
    var formURL = url;
    $.ajax({
           type: "POST",
           url: formURL,
           data: $("#webshot").serialize(), // serializes the form's elements.
           success: function(data)
           {
			 console.log(data);
			 console.log(postData);
			 $('input[type=text],input[type=email],textarea').each(function(){
				 $(this).val('');
			 });
			// mainView.router.back($('#success2').fadeIn().delay(1500).fadeOut());
			mainView.router.loadPage('http://saltydog.com/selfie/dev/index.php');
           // window.location.href = '/selfie-test.php/';
			//$('#webshot').find("input[type=text]").val("");
           }
         });
    e.preventDefault();
    e.unbind();
});
//$("#webshot").submit();

});
 });
// Generate dynamic page
var dynamicPageIndex = 0;
function createContentPage() {
	mainView.router.loadContent(
        '<!-- Top Navbar-->' +
        '<div class="navbar">' +
        '  <div class="navbar-inner">' +
        '    <div class="left"><a href="#" class="back link"><i class="icon icon-back"></i><span>Back</span></a></div>' +
        '    <div class="center sliding">Dynamic Page ' + (++dynamicPageIndex) + '</div>' +
        '  </div>' +
        '</div>' +
        '<div class="pages">' +
        '  <!-- Page, data-page contains page name-->' +
        '  <div data-page="dynamic-pages" class="page">' +
        '    <!-- Scrollable page content-->' +
        '    <div class="page-content">' +
        '      <div class="content-block">' +
        '        <div class="content-block-inner">' +
        '          <p>Here is a dynamic page created on ' + new Date() + ' !</p>' +
        '          <p>Go <a href="#" class="back">back</a> or go to <a href="services.html">Services</a>.</p>' +
        '        </div>' +
        '      </div>' +
        '    </div>' +
        '  </div>' +
        '</div>'
    );
	return;
}
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76096124-1', 'auto');
  ga('send', 'pageview');
