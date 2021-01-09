
<!-- Establish connection -->

<?php
    session_start();

    if(!isset($_SESSION["username"])) {
        header("Location:login.html");
    }

    include_once 'database.php';

    $uname= $_SESSION["username"];

    $sql = "SELECT * FROM logininfo WHERE username=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $uname);
    $stmt->execute();

    $result = $stmt->get_result();

    $row = mysqli_fetch_array($result);
    $fname = $row["fname"];
    $lname =$row["lname"];
    $email=$row["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pet Hotel, Wellington">
  <meta name="B.B" content="Web Project using HTML, CSS, JS, bootstrap, PHP">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Pet Minding &amp; Resort Wellington, Puppy Dog Cat Boarding PAWTOPIA</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this project -->
  <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


  <script src="https://unpkg.com/react@15.5.4/dist/react.js"></script>
	<script src="https://unpkg.com/react-dom@15.5.4/dist/react-dom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.38/browser.js"></script>
		

    <!-- Custom styles for this project -->
    <link href="css/agency.min.css" rel="stylesheet">
   <link href="css/agency.css" rel="stylesheet">  
  
  <link href="css/StyleSheet-All.css" rel="stylesheet">
  
</head>

<body id="page-top">
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html"><span><i class="fas fa-paw"></i>
        <strong>PAWTOPIA</strong></span></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html#about"><b>ABOUT US</b></a>
          </li>

          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html#service"><b>SERVICES</b></a>
          </li>

          <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="gellary.html"><b>GELLARY</b></a>
            </li>

          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><b>CONTACT</b></a>
          </li>

          <li class="nav-item">
          <form action="logout.php" method="post">
                <a class="nav-link js-scroll-trigger" href="login.html" ><button class="btn btn-danger btn-sm text-uppercase" type="submit" id="logoutbtn">LOG OUT</button></a>                        
          </form>
          </li>
        </ul>
      </div>
    </div>
</nav> 
<!-- End Navigation -->  

  <section class="page-section" id="contact">
       <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <img class="img-fluid rounded" src="pet-imgs/pet7-booking.jpg" class="img-responsive" alt="booking">
            </div>

            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase bt-hd">
                <span class="text-wrapper">
                <span class="letters">Get in contact!!</span>
                </span></h2>
                <h3 class="section-subheading text-info">All you have to do is contact us, let us know your pet’s requirements and we’ll do the rest. </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
              <div> <h3 class="section-heading text-uppercase" id="clock"> </h3> </div> 
         
                  <form id="contact-form" action="bookingDB.php" method="post">	 	
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                             <label>First Name:</label>
                              <div class="input-group p-0 shadow-sm"> 
                                <input id="fname" name="fname" value="<?php echo $fname?>" type="text" class="form-control" placeholder="Your first name *" size="30" required/>

                              <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-user"></i></span></div>
                                    </div>
                                    <span id="fname_msg"></span>
                                </div>

                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <div class="input-group p-0 shadow-sm"> 
                                    <input type="text"  name="lname"  value="<?php echo $lname?>"  placeholder="Enter your last name" class="form-control" id="lname" required >
                                    <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-user"></i></span></div>
                                    </div>
                                    <span id="lname_msg"></span>
                                </div>

                                <div class="form-group">
                                    <label>Phone no.:</label>
                                    <div class="input-group p-0 shadow-sm"> 
                                    <input type="tel"  name="phno" placeholder="Enter your telephone number" class="form-control" id="phone" required data-validation-required-message="Please enter 10 digit phone number.">
                                    <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-phone"></i></span></div>
                                    </div>
                                    <span id="ph_msg"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <div class="input-group p-0 shadow-sm"> 
                                    <input id="email" class="form-control"  value="<?php echo $email?>"  placeholder="Your Email ID *" type="email" name="email" size="30" required data-validation-required-message="Please enter the Email Address.">
                                    <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-envelope-square"></i></span></div>
                                    </div>
                                    <span id="email_msg" ></span>
                                </div>
                                <div class="form-group">
                                    <label>Pet name:</label>
                                    <div class="input-group p-0 shadow-sm"> 
                                    <input id="petname" type="text" class="form-control" placeholder="Pet name *"  name="petname" size="30" required/>
                                    <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-dog"></i></span></div>
                                    </div>
                                    <span id="petname_msg"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pettype">Pet type </label>
                                    <select  id="pettype" name="pettype" class="form-control" required>
                                      <option value="-1">--Choose Pet type--</option>
                                      <optgroup label="Pet type">
                                      <option value="Small Dog">Small Dog</option>
                                      <option value="Medium Dog">Medium Dog</option>
                                      <option value="Large Dog">Large Dog</option>
                                      <option value="Cat">Cat</option>
                                      </optgroup>
                                    </select>
                                  
                                    <span id="type_msg"></span>

                                </div>
                            </div>  

                            <div class="col-md-6">   

                                <div class="form-group">
                                    <label>Check in Date:</label>   
                                    <div class="datepicker date input-group p-0 shadow-sm">
                                      <input type="date" id="datefield1" name="checkin" placeholder="Check-In" min='1899-01-01' 
                                       class="form-control py-3 px-3" required="required" data-validation-required-message="Please enter the checkin date."/>
                                      <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-clock"></i></span></div>
                                  </div>  
                                </div> 

                                <div class="form-group">
                                    <label>Check out date:</label>    
                                    <div class="datepicker date input-group p-0 shadow-sm">    
                                    <input id="datefield2" type='date' name="checkout" min='1899-01-01' class="form-control py-3 px-3" 
                                    placeholder="Check-Out" required="required" data-validation-required-message="Please enter the checkout date."/>
                                   
                                    <div class="input-group-append"><span class="input-group-text px-3"><i class="fas fa-clock"></i></span></div>
                                </div>                 
                                </div> 
                                <div class="form-group">
                                    <label>Service type :</label>    
                                    <select id="service" name="service" class="form-control" required>
                                      <option value="-1">--Choose--</option>
                                      <optgroup label="service type">
                                      <option value="15">Dog Grooming --$15/day</option>
                                      <option value="10">Cat Grooming -- $10/day</option>
                                      <option value="25">Day care --$25/day</option>
                                      <option value="150">Dog Training--$150/full training</option>
                                      <option value="75">Cat Training --$75/full training</option>
                                      </optgroup>
                                    </select>                  
                                </div> 
                                <div class="form-group">
                                    <label for="comments">Additional Comments:</label>
                                    <textarea name="comments" rows="15" cols="100" class="form-control" placeholder="Additional comments *" id="comments" maxlength="999" style="resize:none"></textarea>
                                </div>
                                <div class="form-group">
                                    <input id="tandcagree" name="tandcagree" type="checkbox" value="agree" />
                                    <label for="tandcagree">I am not a robot </label><br>
                                     <span id="tandcagree_msg"></span>
                                </div>               
                                </div>
                            </div>                  
                                <div class="col-lg-12 text-center">
                              
                                    <button id="submit" class="btn btn-primary btn-xl text-uppercase" type="submit">SEND BOOKING</button>
                                    <button id="resetButton" class="btn btn-primary btn-xl text-uppercase" value="Clear form" type="reset">RESET</button>
                                  </div>
                            
                        </form>
                        </div>
                      
                </div>
              </div>
        </section>  


<!-- Contact section -->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Embedded Google Map -->      
            <iframe id="gmap"  width="100%" height="300px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12017.774318936436!2d174.8241745755997!3d-41.14667121858905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d3f5324eec090d3%3A0x3d9aea51596a5c55!2sKenepuru%2C%20Porirua%205022!5e0!3m2!1sen!2snz!4v1608960195927!5m2!1sen!2snz" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
    <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4" id="ContactDetails">
            <h3>Contact Details</h3>
            <p>
              We can be hard to reach by phone but use of our online booking and emails are the best way to get hold of us.<br>             
            </p>
            <br>
            <p>
              Kaki Drive, Kenepuru
            <br>Porirua, Wellington 5022
            <br>
            </p>
            <p>
            <abbr title="Phone">P</abbr>: 04-477 0099
            </p>
            <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:name@example.com">pethotel.co.nz
            </a>
            </p>
            <p>
                <abbr title="Hours">H</abbr>: Monday - Saturday: 7am - 6pm
            </p>
        </div>

        </div>
    </div>
 </section>
 <!-- End of Contact section -->

  <!-- Footer -->
  <footer class="footer">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4">
              <span class="copyright">Copyright &copy; Pawtopia Pet Hotel 2021</span>
            </div>
            <div class="col-md-4">
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                    <a href="https://www.youtube.com/" target="_blank">
                      <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.linkedin.com/feed/" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul class="list-inline quicklinks">
                <li class="list-inline-item">
                  <a href="#" data-toggle="tooltip" title="Sorry this page not ready yet!!">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" data-toggle="tooltip" title="Sorry this page not ready yet!!">Terms of Use</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
  

     <!-- Bootstrap core JavaScript -->
     <script src="jquery/jquery.min.js"></script>
     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>   

    <!-- Custom scripts for this template -->
      <script src="js/agency.min.js"></script>


 <!-- Validation of Booking dates from Booking form-->
 <script>   

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;        

        document.getElementById("datefield1").setAttribute("min", today);
        document.getElementById("datefield2").setAttribute("min", today);

        // document.getElementById("datefield1").click(function() {
        //     console.log('Clicked');
        // });
</script> 

<!-- Display the current login time using React-->

  <script type="text/babel">
      class Clock extends React.Component {
        constructor(props) {
            super(props);
            this.state = {date: new Date()};
        }
        
        componentDidMount() {
            this.timerID = setInterval(
            () => this.tick(),
            1000
            );
        }
        
        componentWillUnmount() {
            clearInterval(this.timerID);
        }

        //update timer itself
        tick() {
            this.setState({
            date: new Date()
            });
        }
        
        render() {
            return (
            <div>
                <h3> WELCOME - 
                <?php session_start(); echo $_SESSION["username"];?> : {this.state.date.toLocaleTimeString()} </h3>
            </div>
            );
        }
        }
        
        ReactDOM.render(
        <Clock />, document.getElementById('clock'));
    </script>	

</body>

</html>
