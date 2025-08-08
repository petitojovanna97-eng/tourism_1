<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tourism Destination Website</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9638/9638452.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    .navbar {
      width: 100%;
      background-color: grey;
      overflow: auto;
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar a {
      float: left;
      padding: 12px;
      color: red;
      text-decoration: none;
      font-size: 17px;
    }
    .navbar a:hover,
    .navbar .active {
      background-color: red;
      color: white;
    }
    @media screen and (max-width: 500px) {
      .navbar a {
        float: none;
        display: block;
      }
    }
    .w3-container h1 {
      font-size: 30px;
    }
    .w3-card ul {
      padding-left: 20px;
    }
    .btn-primary {
      margin-top: 10px;
    }
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      text-align: center;
    }
    .team-member {
      text-align: center;
      margin-bottom: 40px;
    }
    .team-member img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<div class="navbar">
  <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="search.php"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Login</a>
  <a class="active" href="services.php"><i class="fa fa-cogs"></i> Services</a>
</div>

<center>
  <div class="w3-container w3-teal">
    <h1><i class="fa-brands fa-servicestack"></i>Services</h1>
    <p>Your reliable partner for tourist destinations in Leyte and beyond!</p>
  </div>
</center>
<center>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card">
      <div class="w3-container">
        <h1>$0 <small class="text-muted">/booking</small></h1>
        <ul>
          <p>Comes with 3 consultations</p>
          <p>Includes 3 reservations</p>
          <p>On-Location Assistance</p>
          <p>Help Center Access (Limited Features)</p>
        </ul>
        <a class="btn btn-primary" href="contact.php?page=contact">Have a Question? Let Us Know!</a>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <div class="w3-container">
        <h1>$10 <small class="text-muted">/reserve</small></h1>
        <ul>
          <p>Get 20 Consultations at No Cost</p>
          <p>Claim Your 20 Free Bookings</p>
          <p>Onsite Maintenance Support</p>
          <p>24/7 Help Center Access</p>
        </ul>
        <a class="btn btn-primary" href="contact.php?page=contact">Start Now</a>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <div class="w3-container">
        <h4>Schedule Now</h4>
        <h1>$30 <small class="text-muted">/schedule</small></h1>
        <ul>
          <p>Unlimited Consultation</p>
          <p>Unlimited Booking</p>
          <p>Unlimited Support via Email</p>
          <p>Help Center Access</p>
        </ul>
        <a class="btn btn-primary" href="contact.php?page=contact">Contact Us</a>
      </div>
    </div>
  </div>
</div>

<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card">
      <img src="https://images.moondeveloper.com/attractions/2025/04/05/resized_67f0b107bda7c.jpg" style="width:100%">
      <div class="w3-container">
        <h5 style="color:blue">PRICELIST</h5>
        <ul>
          <p>Basic Travel Package</p>
          <p>Premium Travel Package</p>
          <p>Deluxe Travel Package</p>
        </ul>
        <a class="btn btn-primary" href="contact.php?page=contact">Book Now</a>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="https://ik.imagekit.io/tvlk/blog/2024/09/PkCfba4r-image-1-1024x682.png" style="width:100%">
      <div class="w3-container">
        <h5 style="color:blue">VARIOUS PLACES YOU CAN EXPLORE</h5>
        <p>Diverse destinations to discover.<br>Explore a range of locations.<br>Multiple tourist attractions to visit.<br>Extensive selection of travel spots.</p>
      </div>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-card">
      <img src="https://ik.imagekit.io/tvlk/blog/2024/09/image-1-1024x688.png" style="width:100%">
      <div class="w3-container">
        <h5 style="color:blue">EXPLORE YOUR DREAM DESTINATION</h5>
        <p>Don't miss out on the chance to visit your dream tourist destinations during the holidays — affordable prices and trusted services await!</p>
        <a class="btn btn-primary" href="contact.php?page=contact">Book Now</a>
      </div>
    </div>
  </div>
</div>

<div style="background-color:grey; padding: 40px 20px;">
  <div class="row">
    <div class="col-sm-4 team-member">
      <img src="https://scontent.fceb6-3.fna.fbcdn.net/v/t39.30808-6/498021845_1027284762826841_1559014425242047120_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEnlIohj2WPZF_QGSZkREAey4O3uEoDUZ3Lg7e4SgNRnTg2upTmLGxAXz32dnR_XRSEUinYgKMc1RvSHQVT5ORi&_nc_ohc=u-On1zhW38IQ7kNvwGssicO&_nc_oc=Adno6pvuYBK_rl6KP9YNhUWS34wvBTnoZJ_aid8A6iblrulZ1_YjDJYMV8Aw2jURHyM&_nc_zt=23&_nc_ht=scontent.fceb6-3.fna&_nc_gid=vvvHV4YDCCErv1rBpY565Q&oh=00_AfSA9H8O1eOyffYFq16_WE7lnaldSHJaMo-GC9w9wdihQA&oe=68865C65" width="140" height=" 140" class="img-circle" alt="Cinque Terre" >
      <h3>MICKY JABINAR</h3>
      <p>Founder</p>
      <p>Sets the culture and values of the organization. Plays a crucial role in fundraising and networking.</p>
    </div>
    <div class="col-sm-4 team-member">
    <img src="https://scontent.fceb6-1.fna.fbcdn.net/v/t39.30808-6/494904943_709026738354670_6688066168037716283_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=105&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeGW4gTzTLOJaGuUeBkeoqn1qTkIo42H552pOQijjYfnnWOBbsRly8qXlxZpYwv3CLZph_dOsDyIpt2pCtYZiAX-&_nc_ohc=l2PvXznKXGsQ7kNvwFo3YVu&_nc_oc=AdmcFn9CNnpnGRdY8G6ap3d8dRW1h5-PXxG0h9zPZbMSjw_8NyCxvdop1oTypc0jKYo&_nc_zt=23&_nc_ht=scontent.fceb6-1.fna&_nc_gid=X5WbwBQNFydhqJJwVomyqA&oh=00_AfRSdhaxhRUPdPFTYB05D894UnSJpfIx9hOLIZJ2E01tjw&oe=68863FC1"  width="140" height=" 140" class="img-circle" alt="Cinque Terre">
      <h3>NATH ALVARADO</h3>
      <p>Executive Director</p>
      <p>Provides vision and direction. Oversees budgeting and financial strategies. Builds a strong, positive work culture.</p>
    </div>
    <div class="col-sm-4 team-member">
    <img src="https://scontent.fceb2-2.fna.fbcdn.net/v/t1.15752-9/519466141_1346949846941785_2434215190649757540_n.jpg?stp=dst-jpg_p480x480_tt6&_nc_cat=110&ccb=1-7&_nc_sid=0024fc&_nc_eui2=AeEb9wCqoQMJGfia6mMwBSeZgE48YYtWC0yATjxhi1YLTG6NVA0kALyvpXQC55Ddw0WSCyV_eby1NVF4XlA5PvsD&_nc_ohc=rgUHwvrHTEoQ7kNvwFFLt2U&_nc_oc=AdlHuF9nuVyHMWGIFTAjoOabCgXOBk45L4UmzyFp3YuES-XJbaro76poX9tEgZBrUSM&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent.fceb2-2.fna&oh=03_Q7cD2wEsgy_hVQfyNcS7zuIUOrunwUqwt5ZZcRcGwXFmKBwf1w&oe=68A7CBE0" width="140" height=" 140" class="img-circle" alt="Cinque Terre" >
      <h3>JOVANNA PETITO</h3>
      <p>Manager</p>
      <p>Leads teams to achieve goals, manages resources and budgets, and ensures smooth project delivery.</p>
    </div>
  </div>
</div>

<footer class="container">
  <p><a href="#">Back to top</a></p>
  &copy; 2025 LeyteSamar/OTHERcountriesTD Inc.
</footer>

</body>
</html>