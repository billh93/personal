<?php
    //Routes
    define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"]);
    require_once(ROOT_PATH . '/inc/phpmailer/PHPMailerAutoload.php');

    if(isset($_POST['submit'])){
        $name = ucwords($_POST['name']);
        $email = strtolower(trim($_POST['email']));
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $budget = $_POST['budget'];
        $output_form = false;
        
        if($name == "" OR $email == "" OR $subject == "" OR $msg == "" OR $budget == ""){ //Checks to see if values are empty
            $output_form = true;
            $tripped_error = true;
            $error = '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          You have some missing fields.
                      </div>';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //If email not valid(false) return error.
            $output_form = true;
            $tripped_error = true;
            $error = '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          Invalid Email Address
                      </div>';
        }
        else{
            // Contact form for visitors
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';                       // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  			// Specify main and backup SMTP servers
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            //$mail->SMTPDebug  = 1;					//Only turn on to debug
            $mail->Port = 465;                                    // Opened specific port 465 from namecheap TCP port to connect to 
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'example@gmail.com';                 // SMTP username
            $mail->Password = 'test';                           // SMTP password

            $email_body = "";
            $email_body = $email_body . "Name: " . $name . "<br>";
            $email_body = $email_body . "Email: " . $email . "<br>";
            $email_body = $email_body . "Subject: " . $subject . "<br>";
            $email_body = $email_body . "Budget: " . $budget . "<br>";
            $email_body = $email_body . "Message: " . $msg;

            $mail->SetFrom($email, $name);
            $address = "billh93@gmail.com";
            $mail->AddAddress($address, "Bill Hinostroza");
            $mail->Subject = "Bill's Contact Form | " . $name;
            $mail->MsgHTML($email_body);
			$mail->IsHTML(true);                            // set email format to HTML

            if(!$mail->send())
            {
                $output_form = true;
                $tripped_error = true;
                $error = '<div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Message could not be sent. Please contact the owner.
                          </div>';
            }
            else{
                $output_form = true;
                $success = '<div class="alert alert-dismissible alert-success">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              Thank you for contacting me. I will respond within the next 24-48 hours.
                            </div>';
            }
        }
        
    }
    else{
        $output_form = true;
    }

    if($output_form){
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Bill Hinostroza">
    <meta name="description" content="Bill Hinostroza Personal Site" />
    <meta name="keywords" content="Bill Hinostroza" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="14 days" />
    <title>Bill Hinostroza | Web Developer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.4/journal/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="custom.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <main class="container-fluid">
        <header id="intro-row" class="row center-text">
	        <?php
		    	if(isset($success)){
                    echo $success;
                }
                else{
	                if(isset($error)){
                        echo $error;
                    }
                    $output_form = true;
                }    
		    ?>
            <div class="col-sm-12">
	            <div id="img-load"></div>                
                <h1 class="white-text">Bill Hinostroza</h1>
                <h2 class="white-text">Web Developer</h2>
            </div>
            <div class="col-sm-12">
                <a target="_blank" href="https://fb.com/djhiphop23"><i id="facebook-icon" class="fa fa-facebook-square fa-3x social-icons"></i></a>
                <a target="_blank" href="https://github.com/billh93"><i class="fa fa-github fa-3x social-icons"></i></a>               
                <a target="_blank" href="https://linkedin.com/pub/bill-hinostroza/60/409/155"><i id="linkedin-icon" class="fa fa-linkedin-square fa-3x social-icons"></i></a>
				<a target="_blank" href="https://plus.google.com/+BillHinostroza"><i id="googleplus-icon" class="fa fa-google-plus-square fa-3x social-icons"></i></a>
            </div>
        </header>
    </main>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-inverse main-nav">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Bill Hinostroza</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about">About</a></li>
                            <!-- <li><a href="/blog">Blog</a></li> -->
                            <li><a href="#experience">Experience</a></li>
                            <li><a href="#talent">Talent</a></li>
                            <li><a href="#portfolio">Portfolio</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container main-container">
        <div id="about" class="row">
            <div class="col-sm-12 center-text">
                <div class="page-header">
                    <h1>About</h1>
                </div>
                <p>
                    Agile Web Developer with deep and wide-ranging IT experience from software all the way to hardware. Focused on building applications that is structurally, semantically and aesthetically intuitive for other developers and the end-user. Works collaboratively or independently to isolate problems and implement simple and repeatable solutions. Possesses a strong focus to detail, able to concentrate on multitude of tasks that are assigned.
                </p>
            </div>
        </div>
        <div id="experience" class="row">
            <div class="col-sm-12 center-text">
                <div class="page-header">
                    <h1>Experience</h1>
                </div>
                <h3>Education</h3>
            </div>
            <div class="col-sm-6 center-text">
                <h4>Udacity</h4>
                <small>(January 2017 - April 2017)</small>
            </div>
            <div class="col-sm-6 center-text">
                <p>
                    <a target="_blank" href="https://udacity.com">Udacity</a> is where Bill further expanded his skill as a Full Stack Web Developer. 
                    The program taught him everything from Front End & Back End Development all the way to some Dev Ops operations such as setting 
                    up a local and remote server with AWS LightSail and Virtual Box. Bill graduated from the program with a <a target="_blank" href="/img/nd-grad-cert.pdf">Full Stack Web Developer Nanodegree</a>.</p>
                <p>You can visit his profile <a target="_blank" href="https://profiles.udacity.com/p/1634818918">here</a>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 center-text">
                <h4>FreeCodeCamp</h4>
                <small>(December 2015 - Ongoing)</small>
            </div>
            <div class="col-sm-6 center-text">
                <p>
                    <a target="_blank" href="https://freecodecamp.com">FreeCodeCamp</a> is where Bill learned more about algorithms and data structures. 
                    The program consistently challenged him to think in creative and critical ways. He further expanded his knowledge on HTML5, CSS3, JavaScript,
                    jQuery, Bootstrap, AJAX and Responsive Design.
                </p>
                <p>You can visit his profile <a target="_blank" href="https://www.freecodecamp.com/billh93">here</a>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 center-text">
                <h4>Team Treehouse</h4>
                <small>(December 2013 - Ongoing)</small>
            </div>
            <div class="col-sm-6 center-text">
                <p>
                    <a target="_blank" href="https://treehouse.com">Treehouse</a> is where Bill learned the modern
                    techniques, tools and workflows for building web apps. This is where he was introduced to PHP, MYSQL,
                    jQuery, Bootstrap, AJAX and Responsive Design.
                </p>
                <p>You can visit his profile <a target="_blank" href="https://teamtreehouse.com/billhinostroza">here</a>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 center-text">
                <h4>Codecademy</h4>
                <small>(July 2012 - Ongoing)</small>
            </div>
            <div class="col-sm-6 center-text">
                <p>
                    <a target="_blank" href="http://codecademy.com">Codecademy</a> is where Bill learned the basic fundamentals
                    on how to make a web page. He started making static websites from scratch to get in the habit of how
                    a web hierarchy is structured. During, his time he learned HTML(5), CSS(3) and a little bit of Javascript. Every
                    now and then he visits Codecademy to see if there is anything else he can learn in the Front-End side.
                </p>
                <p>You can visit his profile <a target="_blank" href="http://codecademy.com/billh93">here</a>.</p>
            </div>
        </div>
        <div id="talent" class="row">
            <div class="col-sm-12 center-text">
                <div class="page-header">
                    <h1>Talent</h1>
                </div>
                <h3>Skills</h3>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">HTML5</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">CSS3</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Javascript & jQuery</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Python</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">PHP</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">React</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Meteor Framework</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">SEO</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Bootstrap, Semantic-UI, Material Design</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Terminal</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 center-text">
                <h3>Languages</h3>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">English (Native)</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">Spanish (Daily Use)</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 center-text">
                <h3>Tools</h3>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">Webkit Browsers</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Firefox</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Microsoft Office</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Mac</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Windows</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Coda 2</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="no-bullets">
                    <li class="talent-row">
                        <span class="talent-title">Sublime Text</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Codekit</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Pycharm</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Web & PHP Storm</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Microsoft Edge</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                    <li class="talent-row">
                        <span class="talent-title">Git</span>
                        <span class="talent-score">
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star filled-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div id="portfolio" class="row">
            <div class="col-sm-12 center-text">
                <div class="page-header">
                    <h1>Portfolio</h1>
                </div>
            </div>
            <div class="row">
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port1">
	                    <img class="img-circle" src="img/neighborhood_map1.png" alt="Babel"/>
	                    <figcaption class="img-title">
	                        <h5>Neighborhood Map <br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Neighborhood Map<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port1" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port1" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port1" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port1" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/neighborhood_map1.png" alt="Neighborhood Map 1">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/neighborhood_map2.png" alt="Neighborhood Map 2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/neighborhood_map3.png" alt="Neighborhood Map 3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port1" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port1" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>Neighborhood Map is a static web application that showcases a Chicago neighborhood with 7 
		                                        default markers provided with more information when clicked upon. It also has a search filter
		                                        which hides other results based on input.                                      
		                                    </p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML5, CSS3, Javascript, jQuery, Ajax, KnockoutJS, Foursquare and Google Maps API.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Atom, Chrome, Git and Mac</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/neighborhood-map-udacity">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="https://billh93.github.io/neighborhood-map-udacity/" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port1">
	                    <img class="img-circle" src="img/babel1.png" alt="Babel"/>
	                    <figcaption class="img-title">
	                        <h5>Babel <br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Babel<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port1" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port1" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port1" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port1" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/babel1.png" alt="Babel 1">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/babel2.png" alt="Babel 2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/babel3.png" alt="Babel 3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port1" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port1" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>Babel is a interesting concept that hopes to utilize the blockchain to implement a decentralized 
		                                        e-commerce platform where users can buy and sell without the middleman meddling in.	                                       
		                                    </p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), Javascript, jQuery and Google Material Design.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Atom, Chrome, Git and Mac</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/babel">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="https://billh93.github.io/babel/" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
            	</div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port1">
	                    <img class="img-circle" src="img/grubdecider.png" alt="GrubDecider"/>
	                    <figcaption class="img-title">
	                        <h5>GrubDecider <br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">GrubDecider<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port1" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port1" data-slide-to="0" class="active"></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/grubdecider.png" alt="GrubDecider">
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>GrubDecider is a fun little project I've made that helps users decide
		                                        what they should eat in a radius half a mile from them.  
	                                        </p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), Javascript, jQuery, <a target="_blank" href="https://github.com/zarocknz/javascript-winwheel">javascript-winwheel</a> and Google Places API.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Atom, Chrome, Git and Mac</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/GrubDecider">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="https://billh93.github.io/GrubDecider/" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
            	</div>
            </div>
            <div class="row">
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port1">
	                    <img class="img-circle" src="img/codersguide.png" alt="Coders Guide"/>
	                    <figcaption class="img-title">
	                        <h5>CodersGuide <br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Coders Guide<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port1" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port1" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port1" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port1" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/codersguide.png" alt="Coders Guide 1">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/codersguide2.png" alt="Coders Guide 2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/codersguide3.png" alt="Coders Guide 3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port1" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port1" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>Coders Guide is exactly what the name states it is a guide for coders.
		                                       Coders who are starting out but they don't know which language to learn.
		                                       This site is a basic resource which gives basic information and code syntax
		                                       on the top 8 languages that are used in the tech industry today. 
	                                        </p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Coda, Safari, Git, Mac, Ampps and Lorem Ipsum Generator</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/codersguide">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="https://billh93.github.io/Static-CodersGuide/" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port2">
	                    <img class="img-circle" src="img/mobileapp.jpg" alt="Mobile App"/>
	                    <figcaption class="img-title">
	                        <h5>Mobile App Marketing Site <br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Mobile App Marketing Site<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port2" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port2" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port2" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port2" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/mobileapp.jpg" alt="mobileapp">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/mobileapp2.jpg" alt="mobileapp2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/mobileapp3.jpg" alt="mobileapp3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port2" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port2" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>Mobile App Marketing site is the first marketing site I have done. As, you can tell
	                                        it is a generic one. My inspiration to creating it with this type of design
	                                        is something that Apple has always done that made their product sleek and elegant. Where
	                                        they put much more emphasis on the products design and features.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Webstorm, Safari, Git, Mac, Ampps and Lorem Ipsum Generator</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/mobile-app">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/mobileapp" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port3">
	                    <img class="img-circle" src="img/restaurant.jpg" alt="Restaurant Site"/>
	                    <figcaption class="img-title">
	                        <h5>Restaurant Site<br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Restaurant Site<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port3" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port3" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port3" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port3" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/restaurant.jpg" alt="restaurant">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/restaurant2.jpg" alt="restaurant2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/restaurant3.jpg" alt="restaurant3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port3" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port3" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>This restaurant site differs from traditional restaurant sites as its homepage focuses
	                                        on special deals and offers that they currently are offering. However, the first thing you
	                                        see on the page is a couple of entrees to give visitors an idea what's on the menu.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Webstorm, Safari, Git, Mac and Ampps</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/restaurant">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/restaurant" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port4">
	                    <img class="img-circle" src="img/webfirm.png" alt="Web Firm Site"/>
	                    <figcaption class="img-title">
	                        <h5>Web Firm Site<br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Web Firm Site<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port4" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port4" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port4" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port4" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/webfirm.png" alt="webfirm">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/webfirm2.png" alt="webfirm2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/webfirm3.png" alt="webfirm3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port4" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port4" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>This Web Firm site follows traditional web firm designs that showcases their work
	                                        on desktop, tablet and smartphones. It also showcases the services that they offer
	                                        along with attractive visuals that accompany it. The main focus on the site is it's
	                                        content and sleek design that is sure to give some interest.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery, FontAwesome, FontCDN and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Coda, Google Chrome, Git, Mac, Ampps and Lorem Ipsum Generator</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/web-firm">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/webfirm" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
            <div class="row">
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port5">
	                    <img class="img-circle" src="img/ecommerce.png" alt="Ecommerce Site"/>
	                    <figcaption class="img-title">
	                        <h5>Ecommerce Site<br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Ecommerce Site<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port5" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port5" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port5" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port5" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/ecommerce.png" alt="ecommerce">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/ecommerce2.png" alt="ecommerce2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/ecommerce3.png" alt="ecommerce3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port5" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port5" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>This e-commerce takes a simple approach and showcases their product right from the start.
	                                        Not only this cuts time for users but it also increases sale because it gives users what
	                                        they want right from the beginning.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Coda, Safari, Git, Mac, Ampps and Lorem Ipsum Generator</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/e-commerce">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/ecommerce" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port6">
	                    <img class="img-circle" src="img/portalhut.jpg" alt="Portalhut"/>
	                    <figcaption class="img-title">
	                        <h5>Portalhut<br/> <br/> Responsive, Full Stack <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Portalhut<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port6" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port6" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port6" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port6" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/portalhut.jpg" alt="portalhut">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/portalhut2.jpg" alt="portalhut2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/portalhut3.jpg" alt="portalhut3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port6" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port6" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>	
	                                        <p>Portalhut is a dynamic web app that is a combination of Facebook, Foursquare
	                                        and Monster. It is where jobseekers find local jobs near their area using Google
	                                        Map. It is also where employers find jobseekers based on the job positions the
	                                        jobseekers apply for. <br />
	                                        <strong>Update: I'm unable to find the final version of the project. So, I 
	                                        can only showcase my workflow and project structure.</strong>
	                                        </p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML5, CSS3, jQuery, PHP, MYSQL and AJAX.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Phpstorm, Safari, Git, Mac and Ampps</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/portalhut">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="http://portalhut.000webhostapp.com/" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port7">
	                    <img class="img-circle" src="img/webhost.png" alt="Webhost Site"/>
	                    <figcaption class="img-title">
	                        <h5>Webhost<br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Web Host Site<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port7" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port7" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port7" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port7" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/webhost.png" alt="webhost">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/webhost2.png" alt="webhost2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/webhost3.png" alt="webhost3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port7" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port7" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>This web hosting site follows traditional design schemes that showcases
	                                           features and services that they offer. It puts great focus in on 
	                                           why users should host with them.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery, FontAwesome, FontCDN and Bootstrap Framework.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Coda, Google Chrome, Git, Mac, Ampps and Lorem Ipsum Generator</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/webhost">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/webhost" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-3">
	                <figure class="gallery-item" data-toggle="modal" data-target="#port8">
	                    <img class="img-circle" src="img/gios.jpg" alt="Gios Bar"/>
	                    <figcaption class="img-title">
	                        <h5>Gios Bar<br/> <br/> Responsive, Front-End <br/> <br/> Open Source</h5>
	                    </figcaption>
	                </figure>
	                <!-- Modal -->
	                <div class="modal fade" id="port8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                    <div class="modal-dialog">
	                        <div class="modal-content">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Gio's Sports Bar<a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a></h4>
	                            </div>
	                            <div class="modal-body center-text">
	                                <div class="container-fluid">
	                                    <div id="carousel-port8" class="carousel slide" data-ride="carousel">
	                                        <!-- Indicators -->
	                                        <ol class="carousel-indicators">
	                                            <li data-target="#carousel-port8" data-slide-to="0" class="active"></li>
	                                            <li data-target="#carousel-port8" data-slide-to="1" class=""></li>
	                                            <li data-target="#carousel-port8" data-slide-to="2" class=""></li>
	                                        </ol>
	                                        <!-- Wrapper for slides -->
	                                        <div class="carousel-inner" role="listbox">
	                                            <div class="item active">
	                                                <img src="img/gios.jpg" alt="gios">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/gios2.jpg" alt="gios2">
	                                            </div>
	                                            <div class="item">
	                                                <img src="img/gios3.jpg" alt="gios3">
	                                            </div>
	                                        </div>
	                                        <!-- Controls -->
	                                        <a class="left carousel-control" href="#carousel-port8" role="button" data-slide="prev">
	                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	                                            <span class="sr-only">Previous</span>
	                                        </a>
	                                        <a class="right carousel-control" href="#carousel-port8" role="button" data-slide="next">
	                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	                                            <span class="sr-only">Next</span>
	                                        </a>
	                                    </div>
	                                    <div class="col-sm-12">
	                                        <h3>About</h3>
	                                        <p>Gios is a site I did for my local bar. If you visit their current site it is
	                                        not responsive. In my own implementation I changed that and made it accessible
	                                        to all devices. I also use jquery and ajax to hide and show data in an instant.
	                                        It contains all the necessary information for users to know more about the bar.</p>
	                                        <h3>Languages Used</h3>
	                                        <p>HTML(5), CSS(3), jQuery and AJAX.</p>
	                                        <h3>Tools Used</h3>
	                                        <p>Webstorm, Safari, Git, Mac and Ampps</p>
	                                        <h3>Github Repository</h3>
	                                        <a target="_blank" href="https://github.com/billh93/gios">Source Code</a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <a target="_blank" href="sites/gios" class="btn btn-primary">Visit Site</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
        <div id="contact" class="row center-text">
            <div class="col-sm-12">
                <div class="page-header">
                    <h1>Contact</h1>
                </div>
                <div class="alert alert-info" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Notice:</span>
				  You can contact me using one of the social networks listed at the top of the page.	
				</div>
            </div>
        </div>     
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-38641310-2', 'auto');
	  ga('send', 'pageview');
	
	</script>
    <?php } ?>
</body>
</html>