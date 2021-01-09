<!-- Establish connection -->

<?php
    session_start();

    if(!isset($_SESSION["username"])) {
        header("Location:login.html");
    }

    include_once 'database.php';

    $uname= $_SESSION["username"];

    $sql = "SELECT * FROM booking WHERE username=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $uname);
    $stmt->execute();

    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this project -->
  <link href="css/agency.min.css" rel="stylesheet">
  <link href="css/agency.css" rel="stylesheet">  
  <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
<style>
    #icon{
        size:20px;
        color: #79eef7;
    }

    #icon a{
        size:20px;
        color:#79eef7;
        text-decoration: none;
    }
</style>

<body>
    <section class="bg-dark page-section" id="register-page">
        <div class="container-fluid">
             <div class="intro-heading text-uppercase" class="form" id="success">
                    <a href="index.html"><i class="fas fa-home fa-2x" style="color:rgb(35, 36, 35)"></i></a>
                    <h1><span class="title">THANK YOU </span> for booking with us..</h1>
                    <p> We will get back to you within 3 working days. </p>
                    <a class="btn btn-success btn-xl text-uppercase js-scroll-trigger"  href="#bookinginfo">CHECK BOOKING DETAILS</a>
            </div>
        </div>
    </section>

<section class="page-section">
  <div class="container">
      <div class="row">
       <div class="col-lg-12">  

    <?php
            if (mysqli_num_rows($result) > 0) {
        ?>

        <h1 class="text-uppercase title">CKECK YOUR BOOKING DETAILS <?php echo  $uname ?></h1>
        <div>
            <?php
            $i=0;

            while($row = mysqli_fetch_array($result)) {
            ?>
            <ul class="list-group" id="bookinginfo">
                <li class="list-group-item">USER NAME -- <?php echo $row["username"]; ?> </li><br>
                <li class="list-group-item">First Name -- <?php echo $row["fname"]; ?></li><br>
                <li class="list-group-item">Last Name -- <?php echo $row["lname"]; ?></li><br>
                <li class="list-group-item">Phone No. -- <?php echo $row["phone"]; ?></li><br>
                <li class="list-group-item"> Email -- <?php echo $row["email"]; ?> </li><br>
                <li class="list-group-item">Pet Name -- <?php echo $row["petname"]; ?></li><br>
                <li class="list-group-item">Pet Type -- <?php echo $row["type"]; ?></li><br>
                <li class="list-group-item">Total Service price -- <?php echo $row["service"]; ?></li><br>
                <li class="list-group-item">Check In Date -- <?php echo $row["checkin"]; ?></li><br>
                <li class="list-group-item">Checkout Date --<?php echo $row["checkout"]; ?></li><br>
                <li class="list-group-item">Your Comments  -- <?php echo $row["comment"]; ?></li><br>
            </ul>
                <hr>
            <?php
                $i++;
                }
            ?>
            <!-- </table> -->
            <?php
            }
            else{
                echo "No result found";
            }
        ?>

            </div>

            <br><br>
                <div class="inputDiv">
                <form action="logout.php" method="post">
                    <button class="btn btn-danger btn-sm text-uppercase" type="submit" id="logoutbtn">LOG OUT</button>
                </form>
                </div>
            </div>
           </div>
        </div>
    </div>
</section>

</body>
</html>