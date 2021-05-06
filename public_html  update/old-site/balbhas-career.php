<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->

<head>
    <!-- Page Title -->
	<title>BALBHAS BUSINESS SYSNOMICS - optimization specialist</title>
	<meta name="description" Content="BALBHAS Business Sysnomics provides IT Services on Business Service Management approach. A BSM approach can be used to understand the impact of business needs on IT Services and infrastructure.">
	<meta itemprop="description" content="BALBHAS initiative will offer you a shift in maturity for an IT department towards a more proactive and predictive operating model rather than the reactive and fire-fighting behavior which has been common in many IT operations. IT departments and Service Providers who reach this level of maturity often report improved relationships with their customers and business colleagues, being recognized as 'Trusted Business Partners' and 'Competent Suppliers' who deliver added business value rather than being considered a commodity.">
	<meta name="keywords" content="IT Infrastructure Management, Datacenter & Cloud Services, IT Consulting Services, IT Architectural Design Services, Facility Management Services">
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="css/style.css">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="css/updates.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
	<style>
	.Plain-Content
	{
            width: 100%;
            float: left;
			background-color: #FFF;
            <!-- background-size: cover; -->
            <!-- -webkit-shape-outside: polygon(0 0, 100% 0, 100% 100%, 30% 100%); -->
            <!-- shape-outside: polygon(33% 100%, 100% 15%, 27% 100%, 100% 100%); -->
            <!-- -webkit-clip-path: polygon(40% 100%, 100% 10%, 100% 100%, 100% 100%); -->
            <!-- -webkit-shape-margin: 20px; -->
	}
	.center_align{
	    width:1000px;
        }
	.content_about {
        text-align: justify;
        }
    input{
    display: block;
    font-size: 14px;
    line-height: initial;
    margin: 9px 0px 0px 0px;
    padding: 10px 15px 10px 15px;
    border-width: 1px;
    border-style: solid;
    border-radius: 5px;
    font-weight: normal;
    border: 1px solid #ccc;
    width: 60%;
}
    </style>
    <?php
    extract($_REQUEST);
    if(isset($_POST['careersubmit']))
{
 $from=$_POST['name'];
 $email=$_POST['eid'];
 $phonenu=$_POST['phone'];


$upload_name=$_FILES["filename"]["name"];
$upload_type=$_FILES["filename"]["type"];
$upload_size=$_FILES["filename"]["size"];
$upload_temp=$_FILES["filename"]["tmp_name"];
$attachment=$_REQUEST["filename"];
	 $fileatt = $upload_temp; // Path to the file   
	 $attachment=$upload_name;
	                
	$fileatt_type = "application/octet-stream"; // File Type 
        $start=	strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
	$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the attachment 
	$email_from = $from; // Who the email is from
        $subject = "Resume From balbhas.com website";
	$email_subject =  $subject; // The Subject of the email 
	$email_txt = $message; // Message that the email has in it 
	
$email_to='rajesh@balbhas.com, hr@balbhas.com';

	$headers = "From: ".$from;

	$file = fopen($fileatt,'rb'); 
	$data = fread($file,filesize($fileatt)); 
	fclose($file); 
	//$msg_txt="\n\n You have recieved a new attachment message from $from";
	
	 $msg_txt="
	 <table  width=70%  align='center' cellspacing='5' cellpadding=5>
<tr>
	  <td colspan='2'>
	 <img  src='http://balbhas.com/Beta/images/Balbhas-Logo.png' border=0 title=''>
	 </td>
	 </tr>
 <tr>
		  <td>Name</td><td><b>$name</b></td>
		  </tr>
		<tr> 
          <td >Email</td><td><b>$email</b></td> 
		  </tr>
		  <tr > 
          <td >Phone</td><td><b>$phonenu</b></td> 
		  </tr>
		  </table>  
 ";
	 $semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	$headers .= "\nMIME-Version: 1.0\n" . 
            "Content-Type: multipart/mixed;\n" . 
            " boundary=\"{$mime_boundary}\""; 
	$email_txt .= $msg_txt;
	$email_message .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
	$email_txt . "\n\n"; 
	$data = chunk_split(base64_encode($data)); 
	$email_message .= "--{$mime_boundary}\n" . 
                  "Content-Type: {$fileatt_type};\n" . 
                  " name=\"{$fileatt_name}\"\n" . 
                  //"Content-Disposition: attachment;\n" . 
                  //" filename=\"{$fileatt_name}\"\n" . 
                  "Content-Transfer-Encoding: base64\n\n" .
                 $data . "\n\n" . 
                  "--{$mime_boundary}--\n";

	$ok = mail($email_to, $email_subject, $email_message, $headers);
}
?>
	
	
</head>
<body>
    
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div class="main-header">
                
                <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
                    Mobile Menu Toggle
                </a>

                <div class="container">
                    <h1 class="logo navbar-brand" style="width:125px; height: 100px; float:left; margin: 10px 0 !important;">
                        <a href="index.html" title="balbhas - home">
                            <img src="images/Balbhas-Logo.png" alt="balbhas logo" />
                        </a>
                    </h1>
                    
                    <nav id="main-menu" role="navigation" style="margin-top: 20px !important; font-size: 15px;">
                        <ul class="menu">
                            <li class="menu-item-has-children"><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><a href="about-balbhas.html">About Us</a></li>
                            <li class="menu-item-has-children"><a href="unique-offering.html">Unique Offerings</a></li>
                            <li class="menu-item-has-children" style="border-top:5px solid #0033ff; text-align:center;">
                                <a href="balbhas-career.php">Careers</a></li>
                            <li class="menu-item-has-children"><a href="contact-balbhas.html">Contact us</a></li>
                        </ul>
                    </nav>
                </div>
                
                <nav id="mobile-menu-01" class="mobile-menu collapse">
                    <ul id="mobile-primary-menu" class="menu">
                            <li class="menu-item-has-children"><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><a href="about-balbhas.html">About Us</a></li>
                            <li class="menu-item-has-children"><a href="unique-offering.html">Unique Offerings</a></li>
                            <li class="menu-item-has-children"><a href="balbhas-career.php">Careers</a></li>
                            <li class="menu-item-has-children"><a href="contact-balbhas.html">Contact us</a></li>
                    </ul>
                </nav>
            </div>

    </header>
		<div class="topstrip" style="background: url(images/Career-Banner.jpg) no-repeat; background-size: 100% 100%;">
		<div class="col-md-12">
                <h1 class="subcont_head col-md-12 col-xs-12 sort-by-title block-sm" style="margin:50px 20px 10px 0; text-align:left; color:#fff;">Careers</h1>
		</div>
		</div>
		
        <div id="slideshow">

	<div class="Plain-Content">
		<div class="col-md-12 col-xs-12">
				<div class="col-md-6 col-xs-12" style="padding: 2% 4%;">
				<p align="justify">
                    We are one of the fastest growing Automation IT services companies in Chennai.
                    Since inception, we attribute to our service excellence and we owe it to our people who are extremely passionate about what they do. They are our biggest asset.
                </p>
                <b><u>CURRENT OPENINGS</u></b>
                <ul style="padding-left: 20px;">
                    <li><b style="color:#0033ff">» Sales Manager – Bangalore (2 Openings)</b><br>
                    <u>Prerequisites:</u> Min 2 Years of Experience in Services Sale<br>
                    <u>KRA:</u>
                    Vertical based Approach. Handle 02 Verticals for particular location. CxO Handling, Negotiation Skills, Capable to close the deals. 
                    Report to Regional Sales Manager<br>&nbsp;
                    </li>
                    <li><b style="color:#0033ff">» Sales Manager – Chennai (2 Openings)</b><br>
                    <u>Prerequisites:</u> Min 2 Years of Experience in Services Sale<br>
                    <u>KRA:</u>
                    Vertical based Approach. Handle 02 Verticals for particular location. CxO Handling, Negotiation Skills, Capable to close the deals. 
                    Report to Regional Sales Manager<br>&nbsp;
                    </li>
                    <li><b style="color:#0033ff">» Sales Manager – Hyderabad (1 Opening)</b><br>
                    <u>Prerequisites:</u> Min 2 Years of Experience in Services Sale<br>
                    <u>KRA:</u>
                    Vertical based Approach. Handle 02 Verticals for particular location. CxO Handling, Negotiation Skills, Capable to close the deals. 
                    Report to Regional Sales Manager<br>&nbsp;
                    </li>
                    <!--<li><b style="color:#0033ff">» Regional Sales Manager (DGM): Bangalore</b><br>
                    <u>Prerequisites:</u><br>
                    - Minimum 8-10 Years of Experience in Service Sales<br>
                    - Datacenter, Managed Services, & Project Management Services experience preferred<br>
                    <u>KRA:</u><br>
                    Responsible for Sales & Sales operations for that region. Top Line & Bottom Line Target. Responsible for 03 LOB. Enable team to close deals. Strong Negotiation Skills<br>&nbsp;
                    </li>
                    <li><b style="color:#0033ff">» Regional Sales Manager (DGM): Chennai</b><br>
                    <u>Prerequisites:</u><br>
                    - Minimum 8-10 Years of Experience in Service Sales<br>
                    - Datacenter, Managed Services, & Project Management Services experience preferred<br>
                    <u>KRA:</u><br>
                    Responsible for Sales & Sales operations for that region. Top Line & Bottom Line Target. Responsible for 03 LOB. Enable team to close deals. Strong Negotiation Skills<br>&nbsp;
                    </li>-->
                    
                    <li><b style="color:#0033ff">» Dev Ops Engineer – Linux: Chennai</b><br>
                    <u>Prerequisites:</u><br>
                    - Around 3+ Years of relevant experience<br>
                    - Linux system administrator, installing, configuring, and administering any *nix platform<br>
                    <u>KRA:</u><br>
                    -	Ability to confidently support production environments, with minimal impact to operations.<br>&nbsp;
                    </li>                    
                </ul>
				</div>
				<div class="col-md-6 col-xs-12" style="padding: 2% 4%;">
				<h2 style="color:#0033ff;">Send your CV here...</h2>
				<form method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Your name" required />
                <input type="text" name="eid" id="name" placeholder="Email ID" required />
                <input type="text" name="phone" id="name" placeholder="Phone #" required />
                <input type="file" name="filename" value="fileupload" id="fileupload" required> <label for="fileupload"> Upload your CV</label>
                <input type="submit" value="SUBMIT CV" name="careersubmit"></form>
				</div>
		</div>
		</div> 
		            <div class="fullwidthbanner-container">
		<div class="col-md-3" style="padding:2%; background-color:#131ef9;"> 
		 <a href="about-balbhas.html"><div class="col-md-4"><img src="images/About-icon.png"/></div><div class="col-md-8" ><h3 style="margin:15px 20px 0 0;color:#fff;" class="sort-by-title block-sm">ABOUT BALBHAS</h3></div></a>
		</div>
		<div class="col-md-3" style="padding:2%;background-color:#303af9">
		<a href="methodology.html"><div class="col-md-4"><img src="images/Tech-icon.png"/></div><div class="col-md-8" ><h3 style="margin:15px 20px 0 0;color:#fff;" class="sort-by-title block-sm">BALBHAS METHODOLOGY</h3></div></a>
		</div>
		<div class="col-md-3" style="padding:2%;background-color:#4b54f9">
		<a href="white-paper.html"><div class="col-md-4"><img src="images/Area-icon.png"/></div><div class="col-md-8" ><h3 style="margin:15px 20px 0 0;color:#fff;" class="sort-by-title block-sm">WHITE PAPER</h3></div></a>
		</div>
		<div class="col-md-3" style="padding:2%;background-color:#7e84f9;">
		<a href="unique-offering.html"><div class="col-md-4"><img src="images/Service-icon.png"/></div><div class="col-md-8" ><h3 style="margin:15px 20px 0 0;color:#fff;" class="sort-by-title block-sm">UNIQUE OFFERINGS</h3></div></a>
		</div>
		
        </div>
<footer id="footer" style="background-color:#000;color:#fff;">
            <div class="footer-wrapper" style="padding: 20px 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <h2 style="color: #FFF;"><a href="methodology.html">Balbhas Methodology</a></h2>
                            <ul class="discover triangle hover row">
                                <li class="col-xs-12"><a href="b1-desk.html">B-1 Desk</a></li>
                                <li class="col-xs-12"><a href="b-bots.html">B-Bots</a></li>
                                <li class="col-xs-12"><a href="b-nsure.html">B-NSure</a></li>
                                <li class="col-xs-12"><a href="b-propel.html">B-Propel</a></li>
                                <li class="col-xs-12"><a href="b-swift.html">B-Swift</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <h2 style="color: #FFF;"><a href="unique-offering.html">Unique Offerings</a></h2>
                            <ul class="discover triangle hover row">
                                <li class="col-xs-12"><a href="service-desk.html">Managed Service Desk</a></li>
                                <li class="col-xs-12"><a href="managed-services.html">Managed Services</a></li>
                                <li class="col-xs-12"><a href="managed-devops.html">Managed DevOps Services</a></li>
                                <li class="col-xs-12"><a href="consulting-services.html">Consulting Services</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-sm-6 col-md-3">
                            <h2 style="color: #FFF;"><a href="about-balbhas.html">About Us</a></h2>
                            <h2 style="color: #FFF;"><a href="white-paper.html">White Papers</a></h2>
                            <h2 style="color: #FFF;"><a href="balbhas-career.php">Career</a></h2>
                        </div>
                        
                        <div class="col-sm-6 col-md-3">
                            <h2 style="color: #FFF;"><a href="contact-balbhas.html">Contact Us</a></h2>
                            <address class="contact-details">
                            <span class="contact-phone" style="color: #FFF;"><i class="soap-icon-phone" style="color: #FFF;"></i> +91 44 6691 5140</span>
                        </address>
                        <address class="contact-details">
                            <span class="contact-phone" style="color: #FFF;"><i class="soap-icon-phone" style="color: #FFF;"></i> +91 80 6743 1390</span>
                        </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left" style="color:#000;">
                        <p>Copyright &copy; 2018 BALBHAS BUSINESS SYSNOMICS</p>
                    </div>
                    
					<div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                        
						<ul class="social-icons clearfix">
                                <li class="twitter"><a title="twitter" href="https://twitter.com/balbhas" target="_new" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                <li class="facebook"><a title="facebook" href="https://www.facebook.com/Balbhas-Business-Sysnomics-261462737702851" target="_new" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                <li class="linkedin"><a title="linkedin" href="https://www.linkedin.com/groups/10357070/profile" target="_new" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                 </ul>
                    </div>
                </div>
            </div>
        </footer>		
        </div>
    
    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="js/jquery-ui.1.10.4.min.js"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Flex Slider -->
    <script type="text/javascript" src="components/flexslider/jquery.flexslider-min.js"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="components/jquery.bxslider/jquery.bxslider.min.js"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="js/jquery.stellar.min.js"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="js/theme-scripts.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
            {
                dottedOverlay:"none",
                delay:9000,
                startwidth:1200,
                startheight:646,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on",
            });
        });
    </script>
</body>
</html>

