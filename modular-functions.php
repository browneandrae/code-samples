<?php

/**************************************
This page includes all fixed elements 
for a responsive modular template loaded
from a SQL database on amfasoft.com
**************************************/

 include 'breadcrumbsMake.php';
 
 include 'metaMake.php';
 
$breadCrumbVar = newBreadcrumb();
//Automatic breadcumb retrieved from database depending on page id
function newBreadcrumb() {
	$breadCrumbObject = new breadcrumbsMake();
	$breadCrumb = $breadCrumbObject->makeBread() ;
	return $breadCrumb;
}

//Automatic meta tag retrieved from database depending on page id
$metaTagVar = newMetaTag();
function newMetaTag() { 
	$metaTagObject = new metaMake();
	$metaTag = 	$metaTagObject->makeTags() ;
	return $metaTag;
}

function time_to_variable() {
return time();
}

$time_echo = time_to_variable();
$styles_side = $metaTagVar.' 	
	<link rel="shortcut icon" href="http://amfasoft.com/images/favicon/amfafavi.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/reset-base.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="flexslider/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/unsemantic/unsemantic-grid-responsive-tablet.css" type="text/css" media="screen" />
	<!--convert to unsemantic remove boostrap hurting content slider -->
	<!--<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="css/ukstyles.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/mltf.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/customStyleDev.css?'.$time_echo.'" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/appStyles.css" type="text/css" media="screen" /> ' ;
	
$styles_side_modular ='	<link rel="stylesheet" href="../../css/reset-base.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../flexslider/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/unsemantic/unsemantic-grid-responsive-tablet.css" type="text/css" media="screen" />
	<!--convert to unsemantic remove boostrap hurting content slider -->
	<!--<link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="../../css/ukstyles.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/mltf.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/customStyleDev.css?'.$time_echo.'" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../css/appStyles.css" type="text/css" media="screen" /> ' ;
	
$logo_inside = '<div class="logoRow ele_bottom_row left">
					<div class="logo-section">
						<a href="index.php">
							<img src="mages/logo-red.png" />
						</a>
					</div>
				</div>';
$second_menu_inside = '						<ul class="second_menu right">
							<li class="second_menu_li"><a href="contactus.php">Contact</a></li>
							<li class="second_menu_li"><a href="tel:18009942632">1-800-994-2632</a></li>
						</ul>';
						
$menu_inside = '<ul id="nav">
						<!--This html was written by Andrae Browne using a PHP template -->
							<!--<li><a href="index.php">Home</a></li>-->
							<li><a href="#s1">Company</a>
								<span id="s1"></span>
								<ul class="subs">
									<li><a href="company.php">Company</a>
										<ul>
											<li><a href="mission.php">Mission</a></li>
											<li><a href="aboutus.php">About Us</a></li>
											<li class="red-highlight"><a href="contactus.php">Contact Us</a></li>
											 <li><a href="locations_directions.php">Locations and Directions</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="active"><a href="#s2">Services</a>
								<span id="s2"></span>
								<ul class="subs">
									<li><a href="services.php">Services</a>
										<ul>
											<li><a href="accounting_payroll.php" class="">Accounting & Payroll</a></li>
											<li><a href="it_consulting.php">IT Consulting</a></li>
											<li><a href="it_outplacement.php">IT Outplacement</a></li>
											<li><a href="app_development.php">Application Development</a></li>
											<li><a href="technical_support.php">Techinical Support</a></li>
											<li><a href="corporate_training.php">Corporate Training</a></li>
							 
										</ul>
									</li>
									<li><a href="erp_services.php">ERP Services</a>
										<ul>
											<li><a href="sap-app.php">SAP Applications</a></li>
											<li><a href="oracle-app.php">Oracle Applications</a></li>
				 
										</ul>
									</li>
									<li><a href="quickbooks.php">Quickbooks</a>
									<ul>
											<li><a href="outsourcing_services.php">Outsourcing Services</a></li>
					
				 
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#s3">Education</a>
											   <span id="s3"></span>
								<ul class="subs">
									<li><a href="education.php">Education</a>
										<ul>
					   
											<li><a href="orientation.php">Orientation</a></li>
											<li class="red-highlight"><a href="schedule.php">Schedule</a></li>
											<li><a href="bootcamps.php">Bootcamps</a></li>
											<li><a href="testimonials.php">Testimonials</a></li>
											<li><a href="enquiry.php">Send Enquiry</a></li>
										</ul>
									</li>
									<li class=""><a href="training.php">Training</a>
										<ul>
											<li class="red-highlight"><a href="courses.php">Courses</a></li>
												<ul>
												<li><a href="courses.php">Regular Courses</a></li>
												<li><a href="wdp-courses.php">Oracle Certification</a></li>
												</ul>
											<li><a href="packages.php">Packages</a></li>
										   
										   </ul>
									</li>
								</ul>
							</li>
							<li><a class="hideIpadOnly" href="news_events.php">News &amp; Events</a><a class=" hide showIpadOnly" href="news_events.php">News</a></li>
							<li><a class="hideIpadOnly" href="jobs_careers.php">Jobs &amp; Careers</a><a class="hide showIpadOnly" href="jobs_careers.php">Jobs</a></li>
							<li id="sitemapLi"><a href="sitemap.php">Site Map</a></li>
						</ul>' ;
$analytics = "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60070703-1', 'auto');
  ga('send', 'pageview');

</script>";						

$header = '<div class="contentWrapAll row"><header>
		'.$analytics.'
		<div id="socialMedia"> 
				<ul>
					<li><a href="http://blogs.amfasoft.com/"><img alt="Skillsoft Blog" src="images/mindleaders/borders/blogRss.png"></a></li>
					<li><a href="http://www.facebook.com/amfasoft"><img alt="Skillsoft Facebook" src="images/mindleaders/borders/fbookicon.png"></a></li>
					<li><a href="http://twitter.com/amfasoft"><img alt="Skillsoft Twitter" src="images/mindleaders/borders/twittericon.png"></a></li>
					<li><a href="http://www.youtube.com/user/amfasoft"><img alt="Skillsoft YouTube" src="images/mindleaders/borders/youtubeicon.png"></a></li>
					<li><a href="http://www.linkedin.com/company/amfasoft"><img alt="Skillsoft LinkedIn" src="images/mindleaders/borders/linkedInIcon.png"></a></li>
				</ul>
		</div>
		<div class="row ">
				<div class="responsive_bg group"> 
			'.$second_menu_inside.'
				</div>	
		</div>
			<div class="clear"></div> 
		<div class="row">
			<!--logo goes here -->		
			'.$logo_inside.'
				<div class="ele_bottom_row group right">
			<!--main menu goes here -->
			'.$menu_inside.'			
				</div>
		</div>
</header>';
 
$header_home = '<header>  
		'.$analytics.'
		<!--<div id="socialMedia"> 
				<ul>
					<li><a href="http://blogs.amfasoft.com/"><img alt="Skillsoft Blog" src="images/mindleaders/borders/blogRss.png"></a></li>
					<li><a href="http://www.facebook.com/amfasoft"><img alt="Skillsoft Facebook" src="images/mindleaders/borders/fbookicon.png"></a></li>
					<li><a href="http://twitter.com/amfasoft"><img alt="Skillsoft Twitter" src="images/mindleaders/borders/twittericon.png"></a></li>
					<li><a href="http://www.youtube.com/user/amfasoft"><img alt="Skillsoft YouTube" src="images/mindleaders/borders/youtubeicon.png"></a></li>
					<li><a href="http://www.linkedin.com/company/amfasoft"><img alt="Skillsoft LinkedIn" src="images/mindleaders/borders/linkedInIcon.png"></a></li>
				</ul>
		</div>-->
			<div class="grid-container ">
				<div class="responsive_bg group"> 
			<!--second menu goes here -->
			'.$second_menu_inside.'
				</div>
			</div>
			<div class="grid-container ">
			<!--logo goes here -->
			'.$logo_inside.'
				<div class="ele_bottom_row right">
			<!--main menu goes here -->
			'.$menu_inside.'			
				</div>
		</div>
</header>';



$company_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/company.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$services_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/services.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$education_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/education.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$news_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/news_events.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$jobs_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/jobs.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$sitemap_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="slider_images/side_page_flash_images/sitemap.jpg" alt="Amfasoft Authorized Vendor of Educational IT Services  Banner Image"/></div></section>';
$map_image_banner = '<section id="section-banner"><div class="row"><img class="banner-image" src="images/enroll/world-flat-blue.jpg" alt="Amfasoft Blue Map of the World"/></div></section>';

$courses_menu = '<div class="courses-menu group">
	<strong>
	<div class="course-link-wrap">
		<a href="wdp-courses.php?type=WDP Oracle Courses">WDP Oracle Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php?type=Regular Courses">Regular Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php?type=Online Courses">Online Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php">All Courses</a>
	</div>
	</strong>
</div>';

$courses_menu_sub = '<div class="courses-menu margin-top-20 margin-bottom-20 group">
	<strong>
	<div class="course-link-wrap">
		<a href="wdp-courses.php?type=WDP Oracle Courses">WDP Oracle Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php?type=Regular Courses">Regular Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php?type=Online Courses">Online Courses</a>
	</div>
	<div class="course-link-wrap">
		<a href="courses.php">All Courses</a>
	</div>
	</strong>
</div>';

$contentWrap70 = '<section id="section-content" class="section-content">
			<!--This html was written by Andrae Browne using a PHP template -->
			<div class="row content-inner">
				<div class="grid-70
				">'.$breadCrumbVar .'
				';

$contentWrap100 = '		<section id="section-content" class="section-content">
		<!--This html was written by Andrae Browne using a PHP template -->
			<div class="row content-inner">
				<div class="grid-100 courses-header-wrap">'.$breadCrumbVar .'
				';

$side_panel_html = '</div><!--close out grid -->
				<div id="side-panel" class="grid-30 side-content  ">
				<!--place small square widths in percent --> 
					<div class="grid-100">
						<div class="customer-header">Most Visited</div>
						<div class="clear"></div>
						<div style="" class="grid-container group side-container-first">
						
					<ul id="importantLinks">
						<li class="importantLinksLi"><a href="courses.php" title="">Courses</a></li>
						<li class="importantLinksLi"><a href="wdp-courses.php" title="">Oracle Certification</a></li>
						<li class="importantLinksLi"><a href="schedule.php" title="">Schedule</a></li>
						<li class="importantLinksLi"><a href="locations_directions.php" title="">Locations</a></li>
						<li class="importantLinksLi"><a href="testimonials.php" title="">Testimonials</a></li>
						<li class="importantLinksLi"><a href="news_events.php" title="">News</a></li>
						<li class="importantLinksLi"><a href="jobs_careers.php" title="">Jobs</a></li>
						<li class="importantLinksLi"><a href="contactus.php" title="">Contact Us</a></li>	
					</ul>
					</div></div>
					<div class="grid-100">
					<div  id="title02" class="customer-header">Featured Customers</div>
					<div class="clear"></div>
					<div style="" class="grid-container side-container-second">
					
					<img src="mages/logo_animation1.gif" width="205" >
					<p class="margin-top-20"><a href="testimonials.php">Customer Testimonials </a></p>
					</div>
					
					</div>
					<div class="grid-100">
					<div  id="title02" class="customer-header">Rating</div>
					<div class="clear"></div>
					<div style="" class="grid-container side-container-third"><a id="bbblink" class="ruvtbul" href="http://www.bbb.org/greater-san-francisco/business-reviews/computers-training/amfasoft-corporation-in-fremont-ca-375772#bbblogo" title="Amfasoft Corporation, Computers - Training, Fremont, CA" style="padding: 0px; margin: 0px;"><img style="padding: 0px; border: none;" id="bbblinkimg" src="https://seal-goldengate.bbb.org/logo/ruvtbul/amfasoft-corporation-375772.png" width="160" height="144" alt="Amfasoft Corporation, Computers - Training, Fremont, CA"></a>
					
					</div>
					</div>
					<!--div class clear margin bottom 20 fixes space between border problem -->
					</div><!--end side panel --> </div>  <!--close out row --> </section>  ';

$side_panel_home_html = '<div id="side-panel" class="grid-100 side-content ">
				<!--place small square widths in percent -->
					<div class="grid-25">
						<div class="customer-header">Login</div>
						<div class="clear"></div>
						<div style="" class="grid-container group side-container-first">
						
			 <form name="login" action="" method="post"></form>
			 
				<label id="usernameLabel">Username</label>
				<div id="usernameBlock"><input name="login_name" type="text" id="login_name" ></div>

				<label id="passwordLabel">Password</label>
				<div id="passwordBlock"><input name="password" type="password" id="password" ></div>
				<div class="bottom-login margin-top-20">
				<span class="left  register-and-help"><a href="javascript:(void);">Help?</a></span>
				
				<span class="right"><input type="image" name="imageField2" src="mages/submit_btn.gif"></span>
				 <span class="right register-and-help"><a href="javascript:(void);">Register</a>&nbsp;&nbsp;</span>
				</div>	
					</div></div>
					<div class="grid-25">
					<div  id="title02" class="customer-header">Featured Customers</div>
					<div class="clear"></div>
					<div style="" class="grid-container side-container-second">
					
					<img src="mages/logo_animation1.gif" width="205" >
					<p class="margin-top-20"><a href="testimonials.php">Customer Testimonials </a></p>
					</div>
					
					</div>
					<div class="grid-25">
					<div  id="title02" class="customer-header">Rating</div>
					<div class="clear"></div>
					<div style="" class="grid-container side-container-third"><a id="bbblink" class="ruvtbul" href="http://www.bbb.org/greater-san-francisco/business-reviews/computers-training/amfasoft-corporation-in-fremont-ca-375772#bbblogo" title="Amfasoft Corporation, Computers - Training, Fremont, CA" style="padding: 0px; margin: 0px;"><img style="padding: 0px; border: none;" id="bbblinkimg" src="https://seal-goldengate.bbb.org/logo/ruvtbul/amfasoft-corporation-375772.png" width="160" height="144" alt="Amfasoft Corporation, Computers - Training, Fremont, CA"></a>
					
					</div>
					</div>
					<div class="grid-25">
						<div class="customer-header">Company Documents</div>
						<div class="clear"></div>
						<div style="" class="grid-container group side-container-first">
						
					<ul id="importantLinks">
						<li class="importantLinksLi"><a href="Catalog.pdf" target="_blank" title="">Catalog</a></li>
						<li class="importantLinksLi"><a href="PerfFactSheet.pdf" target="_blank" title="">Performance Fact Sheet</a></li>
						<li class="importantLinksLi"><a href="AnnualReport.PDF" target="_blank" title="">Annual Report</a></li>
						<li class="importantLinksLi"><a href="http://www.bppe.ca.gov" target="_blank"  title="">BPPE Webs</a></li>
						<li class="importantLinksLi"><a href="SchoolBrochure1.pdf" target="_blank" title="">School Brochure</a></li>
					</ul>
					</div></div>
					<!--div class clear margin bottom 20 fixes space between border problem -->
					</div><!--end side panel --> </div>  <!--close out row --> </section>  ';
					
					
$go_back_insert = '				<a class="" href="https://www.amfasoft.com/enroll.php?class_id='.$_GET['id'].'"><img class="right" src="mages/enroll.jpg"  alt="Enroll in this Amfasoft Course Now"/></a>'; 

$static_footer_menu = '								<p id="footerp2" class="group"><a href="Catalog.pdf" id="footer" target="_blank">Catalog</a> 
<a href="sitemap.php" id="footer">Site Map</a>
<a href="PerfFactSheet.pdf" id="footer" target="_blank">Performance Fact Sheet</a> 
<a href="AnnualReport.PDF" id="footer" target="_blank">Annual Report</a>
<a href="http://www.bppe.ca.gov" id="footer" target="_blank">BPPE Website</a> 
<a href="SchoolBrochure1.pdf" id="footer" target="_blank">School Brochure</a> 
 <a href="privacy.php" id="footer">Privacy Policy</a>
  <a href="attributions.php" id="footer">Attributions</a>
 </p>
								<p   id="footerp3">© 2014 Amfasoft Corporation, All rights reserved.</p>';
								
$footer_section = '
<footer id="section-footer" class="section-footer">
				<div id="footer" class="grid-container">	
					<div id="footer-border">
				
						<p></p>
						<p id="footerp1"><b id="footer-b"class="">For further information about ERP Training contact us on  800 994 AMFA  or info@amfasoft.com. Apart from Amfasoft all other names and terms are trademarks or registered trademarks of their respective companies.</b></p>
						
						<div id="footerLeft">
							<p  ></p>
								'.$static_footer_menu.'	
						</div>
						<div id="footerRight">
							<a href="http://www.facebook.com/amfasoft" target="_blank"><div id="facebookIcon"></div></a><a href="https://twitter.com/amfasoft" target="_blank"><div id="twitterIcon"></div></a><a href="http://www.youtube.com/user/erptraininguk" target="_blank"><div id="youtubeIcon"></div></a><a href="http://www.linkedin.com/amfasoft" target="_blank"><div id="linkedinIcon"></div></a>
							</div>
							<div id="clearDiv"></div>
							 <br>
						</div>
				</div>
</footer>
';
$footer_section_sub = '
<footer id="section-footer" class="section-footer">
				<div id="footer" class="grid-100">
						
									<div style="text-align:center;padding-top:5px;">
								  	  <p class="sub-company-logos" style="text-align:center;"><img src="images/sap2.png">
								  <img src="images/oracle-blue.png">
								  <img src="images/microsoft-blue.png">
								  <img src="images/cisco-blue.png">
								  <img src="images/comptia-blue.png">
								 </p>
								  
								  
								
								<p></p>
					<div id="footer-border" class="alignLeft">
						<p></p>
						<p id="footerp1"><b id="footer-b" >For further information about ERP Training contact us on  800 994 AMFA  or info@amfasoft.com. Apart from Amfasoft all other names and terms are trademarks or registered trademarks of their respective companies.</b></p>
						
						<div id="footerLeft">
							<p></p>
								'.$static_footer_menu.'
						</div>
						<div id="footerRight">
							 <a href="http://www.facebook.com/amfasoft" target="_blank"><div id="facebookIcon"></div></a><a href="https://twitter.com/amfasoft" target="_blank"><div id="twitterIcon"></div></a><a href="http://www.youtube.com/user/erptraininguk" target="_blank"><div id="youtubeIcon"></div></a><a href="http://www.linkedin.com/amfasoft" target="_blank"><div id="linkedinIcon"></div></a>
						</div>
						<div id="clearDiv"></div>							  
						<br>
					</div>
				</div>
</footer></div>
';


$scripts_home = ' <!-- jQuery -->
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
  <script src="js/jquery.min.js"></script>
  
 <!--mind leaders-->
 <script src="js/custommind.js?'.$time_echo.'">\</script>
 <!-- FlexSlider -->
  <script defer src="flexslider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
      $(".flexslider").flexslider({
        animation: "slide",
        start: function(slider){
          $("body").removeClass("loading");
        }
      });
    });
  </script>
   <script src="js/amfaJS.js?'.$time_echo.'"></script>
  <script src="js/bbb.js?'.$time_echo.'" type="text/javascript"></script>
   <script src="http://seal-goldengate.bbb.org/logo/amfasoft-corporation-375772.js" type="text/javascript"></script>';
 
 $scripts_footer = '   <script src="js/bbb.js?'.$time_echo.'" type="text/javascript"></script>
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
   <script src="js/jquery.min.js"></script>
  <script src="http://seal-goldengate.bbb.org/logo/amfasoft-corporation-375772.js" type="text/javascript"></script>
  ';





   
   