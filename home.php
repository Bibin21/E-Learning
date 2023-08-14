<!--#5FCF80 is color-->
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<?php
  session_start();
  if(isset($_SESSION["username"]))
  {
  $fname=$_SESSION["username"];
  $localhost = "localhost";
  $usernamew = "root";
  $passwordw = "";
     $db = "expdb";
 $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
  $sql = "select plan from propay where fname='$fname' order by id desc limit 1 ;";
  $result = mysqli_query($conn,$sql);
  $result = $result->fetch_array()[0];
  $plan=0;
  }
  if($result!=null)
  {
    echo "$result";
    if($result=="Pro Monthly")
    {
      $plan=1;
    }
    else if($result=="Pro Yearly")
    {
      $plan=2;
    }
   
  }
  else
  {
    $plan=0;
  }
  $_SESSION["plan"]=$plan;

?>
<style>
    .mouse
    {
        transform: rotate(90deg);
        background-color: black;
    }
    .price-table:hover
    {
       box-shadow: 5px 5px 5px lightgrey, -5px 0px 5px lightgrey;
    }
   .modal-header
    {
        background-color:#5FCF80;
        
    }
    .mybutton {
  border-radius: 0px 40px 40px 0px;
  background-color: #5FCF80;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.mybutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.mybutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.mybutton:hover span {
  padding-right: 25px;
}

.mybutton:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>connect+.com</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php"><span>Connect+</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#contactus">Contact Us</a></li>
            <li><a href="#courses">Courses</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="aboutus.php">About us</a></li>
          
</html>
<?php
if(isset($_SESSION["username"]))
{
  if($_SESSION["username"]=="admin")
  {
    echo  " <li><a href='adminpanel.php'>Welcome $_SESSION[username]</a></li> " ;
  }
  else
  {
    $sql = "select type from exptable where fname='$_SESSION[username]'";
    $result = mysqli_query($conn,$sql);
   $type= $result->fetch_array()[0];
if($type=='s')
  echo  " <li><a href=' myaccount.php'>Welcome $_SESSION[username]</a></li> " ;
  else
  echo  " <li><a href=' dashboard.php'>Welcome $_SESSION[username]</a></li> " ;
  }
  echo  " <li class='btn-trial'><a  href='logout.php'>Logout</a></li> " ;

}
else
{
?>

          <li><a href="#" data-target="#login" data-toggle="modal">Log in</a></li>
       

          <li class="btn-trial"><a href="#" data-target="#signin" data-toggle="modal">Sign in</a></li>
          <?php
        }
        ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:white;">Login</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Log in to start your session</p>
            <div class="form-group">
              <form  id="loginForm" action="loginltc.php" method="get" >
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pwd" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat"  >Log In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->
  <!--Banner-->
    
<!--    signup form-->
      <div class="modal fade" id="signin" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title text-center form-title" style="color:white;">Create Account</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="form-group">
              <form name="" id="loginForm" method="post" action="signupltc.php">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class=" form-control-feedback glyphicon glyphicon-user" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- mail -------------->
                  <input class="form-control" placeholder="E-mail"  type="text" autocomplete="off" name="email" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-envelope form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pass" required/>
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
                </div>
                <label for="teacher">Teacher:</label>
                <input type="radio" name="type" id="teacher" value="t">
                <label for="student">Student:</label>
                <input type="radio" name="type" id="student" value="s" >
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat" >Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
    
    
    
    
<!--    end of signup form-->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
<div class="modal-dialog modal-sm" id="cform" style="display:none;">

<!-- Modal content no 1-->
<div class="modal-content">
  <div class="modal-header">

    <h4 class="modal-title text-center form-title" style="color:white;">Payment Gateway</h4>            <button type="button"  class="close"  ><a href="#pricing"  onclick="document.getElementById('cform').style.display='none';window.onscroll = function() {};  " style='font-size: 30px;color:black;float:right;'>&times;</a></button>
  </div>
  <div class="modal-body padtrbl">

    <div class="login-box-body">
      <p class="login-box-msg">Please fill following deatils to procced</p>
      <div class="form-group">
        <form   action="payment.php" method="get" >
          <div class="form-group has-feedback">
            <!----- username -------------->
            <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" name="fname" required/>
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-user form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
<!--                  password-->
              <div class="form-group has-feedback">
           
            <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" name="pass" required/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-lock form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
            
            
            
          <div class="form-group has-feedback">
            <!----- credit card number -------------->
            <input class="form-control" placeholder="Credit card number" id="loginpsw" type="password" autocomplete="off" name="cred" min-length=6 required/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-credit-card form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
            
             <div class="form-group has-feedback">
            <!----- coursename -------------->
            <input class="form-control" name="coursename" id="couselect" type="text" autocomplete="off" name="pwd"/>
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
            <!---Alredy exists  ! -->
            <span class="glyphicon glyphicon-education form-control-feedback" style="background-color: rgb(230,230,230);"></span>
          </div>
            
            
            
            
            
            
          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox icheck">
               
              </div>
            </div>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-green btn-block btn-flat"  >Buy this course!</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<script>

          
                
        	function showMessage(val)
            {			

            document.getElementById("cform").style.display="block";
                scrollTo(top);
                // To get the scroll position of current webpage
TopScroll = window.pageYOffset || document.documentElement.scrollTop;
LeftScroll = window.pageXOffset || document.documentElement.scrollLeft,

// if scroll happens, set it to the previous value
window.onscroll = function() {
window.scrollTo(LeftScroll, TopScroll);
        };
        if(val==1)
                document.getElementById("couselect").value="Pro Monthly";
                else 
                document.getElementById("couselect").value="Pro Yearly";
                      document.getElementById("couselect").readOnly=true;
                
                
            
                
                
			}
      
    </script>
    
    
    
    
    
    
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">Connect +</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">First you Learn ,then you remove the 'L'</p>
              <p class="small-text">An easy and organized way to explore the world of learning through the window of our website</p>
              <a href="#footer" class="btn get-quote">GIVE A SUGGESTION</a>
            </div>
            <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Features</h2>
          <p>We try to provide our loyal users a rich and soothing experience in their path of learning<br>We do our best ,but suggestions are welcomed</p>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Latest Technologies</h4>
                <p>Connect+ uses latest techonologies to improve user experience and performace so that the end users are satisifed.Connect+ also uses new techonologies to improve security standards to protect user privacy.</p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-css3"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Best Courses</h4>
                <p>Connect+ provides best courses with affordable price and expert tutors.Recorded sessions and course materials are provided .The courses based on technologies that have a good future scope. </p>
              </div>
              <div class="fea-img pull-left">
              <i class="fa fa-book" style="color: #5fcf80;"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Active Support</h4>
                <p>Connect+ offers an active support team which will respond to your queries. It also offers a chat bot and Q&A section to tackle frequently encountered problems which are faced by normal users.</p>
              </div>
              <div class="fea-img pull-left">
              <i  class="fa fa-phone" style="color: #5fcf80;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  <!--Organisations-->
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>65%</h3>
              <p>Say NO!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>20%</h3>
              <p>Says Yes!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>15%</h3>
              <p>Can't Say!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt"> Is inclusive quality education affordable?</h3>
              <h4 class="sm-txt">(Revised and Updated for 2023)</h4>
            </hgroup>
            <p class="det-p">We present this website to make online education valuable , affordable and effective .</p>
          </div>
        </div> 
      </div>
    </div>
  </section>
  <!--/ Organisations-->
  <!--Cta-->
  <section id="cta-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center">Subscribe Now</h2>
          <p class="cta-2-txt">Sign up for our free weekly software design courses, we’ll send them right to your inbox.</p>
          <div class="cta-2-form text-center">
            <form action="#" method="post" id="workshop-newsletter-form">
              <input name="" placeholder="Enter Your Email Address" type="email">
              <input class="cta-2-form-submit-btn" value="Subscribe" type="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Cta-->
  <!--work-shop-->
  <section id="work-shop" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Upcoming Workshop</h2>
          <p>Upcoming workshops specially for you <br> HURRY UP!</p>
          <hr class="bottom-line">
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
              <i class="fa fa-html5 color-green"></i>
            </div>
            <div class="icon-text">
              <h4 class="ser-text">Mentor HTML5 Workshop</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
              <i class="fa fa-css3 color-green"></i>
            </div>
            <div class="icon-text">
              <h4 class="ser-text">Mentor CSS3 Workshop</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-box text-center">
            <div class="icon-box">
              <i class="fa fa-joomla color-green"></i>
            </div>
            <div class="icon-text">
              <h4 class="ser-text">Mentor Joomla Workshop</h4>
            </div>
          </div>
            <br>
<!--            <input class="cta-2-form-submit-btn" value="See more..." type="submit" style="float: right">-->
      
        </div>
      </div>
    </div>
  </section>
  <!--/ work-shop-->
  <!--Faculity member-->
  <!--/ Faculity member-->
  <!--Testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2 class="white">See What Our Customer Are Saying?</h2>
          <p class="white">Thanks to our loyal customers and to their Suggestions<br> It means a lot to us.</p>
          <hr class="bottom-line bg-white">
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="text-comment">
            <p class="text-par">"Connect+ have improved the quality of online education.It helped me a lot and I Found it most useful than other websites."</p>
            <p class="text-name">Abraham Doe - Web Developer</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="text-comment">
            <p class="text-par">"The courses are absolutely worth buying. Recorded Sessions are provided by expert faculties. Connect+ helped me get a better career. "</p>
            <p class="text-name">Alex Philips - Software Engineer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonial-->
  <!--Courses-->
  <section id="courses" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Courses</h2>
          <p>Thousands of coding courses are at your disposal<br>,So what are you waiting for!</p>
          <hr class="bottom-line">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/node.jpg" class="img-responsive">
            <figcaption>
              <h3>Node JS</h3>
              <p>Master Node JS & Deno.js, build REST APIs with Node.js, GraphQL APIs, add Authentication, use MongoDB, SQL & much more!</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/react.jpg" class="img-responsive">
            <figcaption>
              <h3>React Js</h3>
              <p>Dive in and learn React.js from scratch! Learn Reactjs, Hooks, Redux, React Router 6.4 Next.js and way more!</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/laravel.jpg" class="img-responsive">
            <figcaption>
              <h3>PHP with Laravel</h3>
              <p>Learn The Essential Concepts of PHP, Laravel & Linux To Launch A New Career!</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/angular.jpg" class="img-responsive">
            <figcaption>
              <h3>Angular JS</h3>
              <p>Master Angular (formerly "Angular 2") and build awesome, reactive web apps with the successor of Angular.js</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/android.jpg" class="img-responsive">
            <figcaption>
              <h3>Android Development</h3>
              <p>Learn Android App Development - Beginner to Android Developer - Build a portfolio of Apps - Java & Kotlin - Android 13</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/java.jpg" class="img-responsive">
            <figcaption>
              <h3>Java</h3>
              <p>Java Programming for Beginners to Java Object Oriented Programming. Core Java + REST API with Spring Boot. Java 8 to 16.</p>
            </figcaption>
            <a href="courses.php"></a>
          </figure>
        </div>
        <button class="mybutton" style="float: right;"><span><a href="courses.php" style='text-decoration:none;color:white;'>More..</a></span></button>
      </div>
    </div>
  </section>
  <!--/ Courses-->
  <!--Pricing-->
  <section id="pricing" class="section-padding"  style="padding-bottom:0px;" >
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Our Pricing</h2>
          <p>Get professional and complete access to our website<br>,and let the Learning Begin!</p>
          <hr class="bottom-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>BASIC</h4>
              <span class="fa"></span> <span class="amount">Free</span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
             
              <a href="#"  class="btn btn-bg green btn-block"> <?php if($plan==0) { echo "Active"; } else { echo "Not Active"; }  ?></a>
              <?php
              
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>PRO (6 months)</h4>
              <span class="fa fa-usd curency"></span> <span class="amount">100</span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
              <a onclick="showMessage(1)" class="btn btn-bg yellow btn-block"><?php if($plan==1) { echo "Active"; } else { echo "Purchase"; }  ?></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="price-table">
            <!-- Plan  -->
            <div class="pricing-head">
              <h4>PRO (Year Plan)</h4>
              <span class="fa fa-usd curency"></span> <span class="amount">150</span>
            </div>

            <!-- Plean Detail -->
            <div class="price-in mart-15">
              <a onclick="showMessage(2)" class="btn btn-bg red btn-block"><?php if($plan==2) { echo "Active"; } else { echo "Purchase"; }  ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
      <h2 class="header-section text-center" >Q&A</h2>

<div class="faq-container">
  <div class="faq">
    <h3 class="faq-title">
    Are the courses Free?
    </h3>

    <p class="faq-text">
      For Basic Account Some Courses are Free
    </p>

    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>

  <div class="faq">
    <h3 class="faq-title">
     What are the uses of Pro account?
    </h3>
    <p class="faq-text">
     You can get more courses and buy them if you need and get more support from admin.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <div class="faq">
    <h3 class="faq-title">
      What are the additional features of Connect+ ?
    </h3>
    <p class="faq-text">
      Users can chat with a chat bot and message the admin or support team if any support is needed.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
    </div>
    <div class="faq">
    <h3 class="faq-title">
     When will new Courses be added?
    </h3>
    <p class="faq-text">
    New Courses are added every Month..
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
    
  </div>
 
  

  
 
</div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Pricing-->
  <!--Contact-->
  <section id="contactus" class="section-padding" >
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Contact Us</h2>
          <p>All the user visiting the website can contact us any any time by sending their message </p>
               <p>We will do our best to solve your queries</p>
          <hr class="bottom-line">
        </div>
  
        
        <form action="contact.php" method="get"  >
          <div class="col-md-6 col-sm-6 col-xs-12 left">
            <div class="form-group">
              <input type="text" name="fullname" class="form-control form "  placeholder="Your Name"  />
              
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email"  placeholder="Your Email"  />
              
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject"  placeholder="Subject"  />
              
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 right">
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5"  placeholder="Message"></textarea>
            
            </div>
          </div>

          <div class="col-xs-12">
           
              <input  type="submit"  class="form contact-form-button light-form-button oswald light" value="Send message">
          </div>
        </form>
<!--          MESSAGE FORM-->
          
    




          
          
          
          
          
          
          
          
          
          
          

      </div>
    </div>
  </section>
  <!--/ Contact-->
  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">

      <h3>Suggestions Are Welcomed</h3>

      <form class="mc-trial row" action="review.php" method="get">
        <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
          <div class=" controls">
            <input name="username" placeholder="Enter Your FullName" class="form-control" type="text">
          </div>
        </div>
        <!-- End email input -->
        <div class="form-group col-md-3 col-sm-4">
          <div class=" controls">
            <input name="comment" placeholder="Enter Your Suggestion" class="form-control" type="text">
          </div>
        </div>
        <!-- End email input -->
        <div class="col-md-2 col-sm-4">
          <p>
            <button name="submit" type="submit" class="btn btn-block btn-submit">
            Suggest this! <i class="fa fa-arrow-right"></i></button>
          </p>
        </div>
      </form>
      <!-- End newsletter-form -->
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      <div class="credits" >
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
        -->
      </div>
    </div>
  </footer>
  <!--/ Footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  

</body>
<!--    php for calculating visits in site-->
<?php

     
     if($_SERVER['REQUEST_METHOD']=="GET"){
       $localhost = "localhost";
       $usernamew = "root";
       $passwordw = "";
          $db = "expdb";
      $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
      if(!$conn){
       echo "Connection error";
       }
         else{
     
     $sql = "UPDATE counter SET visit=visit+1 WHERE id = 0";
    $result = mysqli_query($conn,$sql);
 }

}

?>
<!-- Chatbot -->
<div class="botIcon">
	<div class="botIconContainer">
		<div class="iconInner">
			<i class="fa fa-commenting" aria-hidden="true"></i>
		</div>
	</div>
	<div class="Layout Layout-open Layout-expand Layout-right">
			<div class="Messenger_header">
				<h4 class="Messenger_prompt">GPT 3.5</h4> <span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span>
        <iframe width="650" style="margin-left:-15px;margin-bottom:-10px;" height="750" src="https://huggingface.co/chat/"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
	</div>
</div>
<!-- Chatbot -->
</html>
<style>
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');

/* Chatbot */
.botIcon {bottom: 15px;left: 15px;position: fixed;z-index: 9999;}
.iconInner {-webkit-align-items: center;-ms-align-items: center;align-items: center;background: #a64bf4;background: -webkit-linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background: -o-linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background: -moz-linear-gradient(to left,#00dbde, #fc00ff, #00dbde,#fc00ff);background: linear-gradient(to left, #00dbde, #fc00ff, #00dbde, #fc00ff);background-position: 50%;background-size: 300%;border-radius: 50%;color: #fff;cursor: pointer;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-flex-wrap: wrap;-ms-flex-wrap: wrap;flex-wrap: wrap;font-size: 1.7em;height: 2em;justify-content: center;width: 2em;}
.botSubject, .messages, .showBotSubject .botIconContainer, .showMessenger .botIconContainer {display: none;}

.botIcon .Messages, .botIcon .Messages_list {-webkit-box-flex: 1;-webkit-flex-grow: 1;-ms-flex-positive: 1;flex-grow: 1;}
.chat_close_icon {color: #fff;cursor: pointer;font-size: 16px;position: absolute;right: 12px;z-index: 9;}
.chat_on {background-color: #8a57cf;bottom: 20px;border-radius: 50%;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;color: #fff;cursor: pointer;display: block;height: 45px;padding: 9px;position: fixed;right: 15px;text-align: center;width: 45px;z-index: 10;}
.chat_on_icon {color: #fff;font-size: 25px;text-align: center;}
.botIcon .Layout {-webkit-animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);-ms-animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);animation: appear .15s cubic-bezier(.25, .25, .5, 1.1);-webkit-animation-fill-mode: forwards;-ms-animation-fill-mode: forwards;animation-fill-mode: forwards;background-color: rgb(63, 81, 181);bottom: 20px;border-radius: 10px;box-shadow: 5px 0 20px 5px rgba(0, 0, 0, .1);box-sizing: content-box !important;color: rgb(255, 255, 255);display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-pack: end;-webkit-justify-content: flex-end;-ms-flex-pack: end;justify-content: flex-end;max-height: 30px;max-width: 300px;min-width: 50px;opacity: 0;pointer-events: auto;position: fixed;-webkit-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;-ms-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1), min-width .2s cubic-bezier(.25, .25, .5, 1), max-width .2s cubic-bezier(.25, .25, .5, 1), min-height .2s cubic-bezier(.25, .25, .5, 1), max-height .2s cubic-bezier(.25, .25, .5, 1), border-radius 50ms cubic-bezier(.25, .25, .5, 1) .15s, background-color 50ms cubic-bezier(.25, .25, .5, 1) .15s, color 50ms cubic-bezier(.25, .25, .5, 1) .15s;z-index: 999999999;}
.botIcon .Layout-open {border-radius: 10px;color: #fff;height: 500px;max-height: 500px;max-width: 300px;overflow: hidden;-webkit-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);-ms-transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);transition: right .1s cubic-bezier(.25, .25, .5, 1), bottom .1s cubic-bezier(.25, .25, .5, 1.1), min-width .2s cubic-bezier(.25, .25, .5, 1.1), max-width .2s cubic-bezier(.25, .25, .5, 1.1), max-height .2s cubic-bezier(.25, .25, .5, 1.1), min-height .2s cubic-bezier(.25, .25, .5, 1.1), border-radius 0ms cubic-bezier(.25, .25, .5, 1.1), background-color 0ms cubic-bezier(.25, .25, .5, 1.1), color 0ms cubic-bezier(.25, .25, .5, 1.1);width: 100%;}
.botIcon .Layout-expand {display: none;height: 400px;max-height: 100vh;min-height: 300px;}
.showBotSubject.botIcon .Layout-expand {display: block;}
.botIcon .Layout-mobile {bottom: 10px}
.botIcon .Layout-mobile.Layout-open {min-width: calc(100% - 20px);width: calc(100% - 20px);}
.botIcon .Layout-mobile.Layout-expand {border-radius: 0 !important;bottom: 0;height: 100%;min-height: 100%;min-width: 100%;width: 100%;}
.botIcon .Messenger_messenger {height: 100%;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;position: relative;width: 100%;}
.botIcon .Messenger_header, .botIcon .Messenger_messenger {display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;}
.botIcon .Messenger_header {-webkit-box-align: center;-webkit-align-items: center;-ms-flex-align: center;align-items: center;background-color: rgb(22, 46, 98);color: rgb(255, 255, 255);-webkit-flex-shrink: 0;-ms-flex-negative: 0;flex-shrink: 0;height: 40px;padding-left: 10px;padding-right: 40px;}

.botIcon .Messenger_header h4 {-webkit-animation: slidein .15s .3s;-ms-animation: slidein .15s .3s;animation: slidein .15s .3s;-webkit-animation-fill-mode: forwards;-ms-animation-fill-mode: forwards;animation-fill-mode: forwards;font-size: 16px;opacity: 0;}
.botIcon .Messenger_prompt {font-size: 16px;font-weight: 400;line-height: 18px;margin: 0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
.botIcon .Messenger_content {background-color: #fff;display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-flex: 1;-webkit-flex-grow: 1;-ms-flex-positive: 1;flex-grow: 1;height: 80px;}
.botIcon .Messages {background-color: #fff;display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-orient: vertical;-webkit-box-direction: normal;-webkit-flex-shrink: 1;-ms-flex-negative: 1;flex-shrink: 1;overflow-x: hidden;overflow-y: auto;padding: 10px;position: relative;-webkit-overflow-scrolling: touch;}
.botIcon .Input {background-color: #fff;border-top: 1px solid #e6ebea;color: #96aab4;-webkit-box-flex: 0;-webkit-flex-grow: 0;-ms-flex-positive: 0;flex-grow: 0;-webkit-flex-shrink: 0;-ms-flex-negative: 0;flex-shrink: 0;padding-bottom: 15px;padding-top: 17px;position: relative;width: 100%;}
.botIcon .Input-blank .Input_field {max-height: 20px;}
.botIcon .Input_field {background-color: transparent;border: none;outline: none;padding-left: 20px;padding-right: 45px;resize: none;width: 100%;font-size: 14px;line-height: 20px;min-height: 20px !important;}
.botIcon .Input_button-emoji {right: 45px;}
.botIcon .Input_button {background-color: transparent;border: none;bottom: 15px;cursor: pointer;height: 25px;outline: none;padding: 0;position: absolute;width: 25px;}
.botIcon .Input_button-send {right: 15px;}
.botIcon .Input-emoji .Input_button-emoji .Icon, .botIcon .Input_button:hover .Icon {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);-webkit-transition: all .1s ease-in-out;-ms-transition: all .1s ease-in-out;transition: all .1s ease-in-out;}
.botIcon .Input-emoji .Input_button-emoji .Icon path, .botIcon .Input_button:hover .Icon path {fill: #2c2c46;}
.Icon svg {height: auto;width: 100%;}

.msg {display: -webkit-box;display: -webkit-flex;display: -ms-flexbox;display: flex;}
.msg.user {-webkit-box-direction: row-reverse;-webkit-flex-direction: row-reverse;-ms-flex-direction: row-reverse;flex-direction: row-reverse;}
.msg + .msg {margin-top: 15px;}
span.responsText {color: #000;display: inline-block;margin-left: 10px;vertical-align: top;max-width: calc(100% - 50px);}
.msg.user span.responsText {margin-left: 0;margin-right: 10px;}
span.avtr {display: inline-block;width: 30px;}
span.avtr figure {background-color: #ccc;background-position: center;background-repeat: no-repeat;background-size: cover;border-radius: 50%;display: block;margin: 0;padding-bottom: 100%;}

@-webkit-keyframes appear {
    0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}
}
@-ms-keyframes appear {
    0% {opacity: 0;-ms-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-ms-transform: scale(1);transform: scale(1);}
}
@keyframes appear {
    0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);}
    100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}
}
@-webkit-keyframes slidein {
    0% {opacity: 0;-webkit-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-webkit-transform: translateX(0);transform: translateX(0);}
}
@-ms-keyframes slidein {
    0% {opacity: 0;-ms-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-ms-transform: translateX(0);transform: translateX(0);}
}
@keyframes slidein {
    0% {opacity: 0;-webkit-transform: translateX(10px);transform: translateX(10px);}
    100% {opacity: 1;-webkit-transform: translateX(0);transform: translateX(0);}
}

@media only screen and (max-width: 412px) {
	.botIcon .Layout-open {width: 250px;}
}
</style>
<script>
  jQuery(document).ready(function($) {
	jQuery(document).on('click', '.iconInner', function(e) {
		jQuery(this).parents('.botIcon').addClass('showBotSubject');
		$("[name='msg']").focus();
	});

	jQuery(document).on('click', '.closeBtn, .chat_close_icon', function(e) {
		jQuery(this).parents('.botIcon').removeClass('showBotSubject');
		jQuery(this).parents('.botIcon').removeClass('showMessenger');
	});

})
</script>
<script>
  const faqContainer = document.querySelector('.faq-container')

faqContainer.addEventListener('click', function toggleFaq (e) {
  if (e.target.matches('.faq-toggle')) {
    const faqBox = e.target.parentElement
    faqBox.classList.toggle('active')
  }
})

</script>
<style>
  
.faq-container {
  max-width: 600px;
  margin: 0 auto;
  .faq {
    background-color: transparent;
    border: 1px solid #999990;
    border-radius: 10px;
    margin: 20px 0;
    padding: 30px;
    position: relative;
    overflow: hidden;
    transition: 0.3s ease;
    &.active {
      background-color: white;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.1);
      .faq-text {
        display:block;
      }
      .faq-toggle {
        background-color: #9fa4a8 ;
        &:focus {
          outline: none;
        }
        .fa-times {
          color: white;
          display: block;
        }
        .fa-chevron-down {
          display: none;
        }
      }
    }
    &.faq.active::before,
    &.faq.active::after {
      content: '\f075';
      font-family: 'Font Awesome 5 Free';
      color: green;
      font-size: 7rem;
      position: absolute;
      opacity: 0.1;
      top: 20px;
      left: 20px;
      z-index: 0;
    }
    &.faq.active::before {
      color: lightblue;
      top: -10px;
      left: -30px;
      opacity: 0.3;
      transform: rotateY(180deg)
    }
    .faq-title {
      margin: 0 35px 0 0;
    }
    .faq-text {
      display: none;
      margin: 30px 0 0;
    }
    .faq-toggle {
      background-color: transparent;
      border: 0;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      padding: 0;
      position: absolute;
      top: 30px;
      right: 30px;
      height: 30px;
      width: 30px;
      .fa-chevron-down,
      .fa-times {
        pointer-events: none;
      }
      .fa-times {
        display: none;
      }
    }
  }
}
</style>
<script>
      
                
</script>