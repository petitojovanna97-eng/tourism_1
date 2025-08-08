<?php 
include 'db_connection.php';  
?>

<?php
$msg = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $name = $_POST['name'] ?? '';
  $message = $_POST['message'] ?? '';
  $email = $_POST['email'] ?? '';
  $contact = $_POST['contact_number'] ?? '';

  $stmt = $conn->prepare("INSERT INTO contact_messages_db (name, message, email, contact_number) VALUES (?, ?, ?, ?)");

  if ($stmt === false) {
    $msg = "Something went wrong: " . htmlspecialchars($conn->error);
  } else {
    $stmt->bind_param("ssss", $name, $message, $email, $contact);
    if ($stmt->execute()) {
      $msg = "Feedback message was sent successfully.";
    } else {
      $msg = "Error sending feedback: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<body>
  <title>Tourism Destination Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=2">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9638/9638452.png">

<style>
  .contact-container {
      max-width: 900px;
      margin: 50px auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 40px;
      padding: 0 20px;
    }
    .contact-text {
      flex: 1;
      text-align: center;
    }
    .contact-text h2 {
      font-weight: normal;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    .contact-text p {
      font-size: 0.9rem;
      color: #555;
      max-width: 300px;
      margin: 0 auto;
      line-height: 1.3;
    }
    form {
      flex: 1;
      max-width: 500px;
      border: 1px solid #eee;
      padding: 20px;
      background: #fafafa;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    form input, form textarea {
      width: 100%;
      padding: 8px 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 3px;
      resize: vertical;
    }
    form textarea {
      height: 100px;
    }
    form button {
      background: #007bff;
      border: none;
      color: white;
      padding: 10px;
      font-size: 1.1rem;
      border-radius: 3px;
      cursor: pointer;
    }
    form button:hover {
      background: #0056b3;
    }
    form small {
      font-size: 0.8srem;
      color: #666;
      margin-top: 5px;
      display: block;
    }
    .success-msg {
      color: green;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .error-msg {
      color: red;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
body  {
  background-image: url("");
  background-color:rgb(204, 204, 204);
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 15px;
  resize: vertical;
}

input[type=submit] {
  background-color:rgba(170, 4, 26, 0.74);
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color:rgb(69, 160, 69);
}

.container {
  border-radius: 5px;
  background-color:none;
  padding: 20px;
}
body {font-family: Arial, Helvetica, sans-serif;}

 form small {
      font-size: 0.7rem;
      color: #666;
      margin-top: 5px;
      display: block;
    }
    .success-msg {
      color: green;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .error-msg {
      color: red;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
    .carousel-inner img {
      width: 50%; /* Set width to 100% */
      margin: auto;
      min-height:90px;

    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 400px) {
    .carousel-caption {
      display: none; 
      }
    }

    .img {
      height: 30px;
      background: ;
    }

    .topnav a.active {
      color: red;            /* Font color for active link */
      background-color: #495057; /* Optional: highlight background */
      font-weight: bold;         /* Optional: bold text */
    }

    .topnav {
      background-color:  red;
      overflow: hidden;
      font-size: 30px;
    }

    .topnav a {
      float: left;
      color: grey;
      text-align:center;
      padding: 50px;
      text-decoration: none;   
    }

    .topnav a:hover {
      background-color: grey;
    }

    .topnav a.pull-right{
      float: right;        
    }

    .active {
      background-color: grey;
    }

    .container {
      border: none;
      width: 100%;
      margin: auto
    }

    H1 {
      font-size: 30PX;
    }

    body {
      position: relative; 
    }

    #section1 {
      padding-top:50px;height:500px;color: #fff; background-color: white;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    .navbar {
      width: 100%;
      background-color: grey;
      overflow: auto;
    }
    
    .navbar a {
      float: left;
      padding: 12px;
      color: red;
      text-decoration: none;
      font-size: 17px;
    }
    
    .navbar a:hover {
      background-color: red;
    }

    .active {
      background-color: white;
    }

    @media screen and (max-width: 500px) {
    .navbar a {
      float: none;
      display: block;
      }
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    p{
      color:black;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
  </style>
<body>
<nav> 
<div class="navbar">
  <a class="active" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="search.php"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Login</a>
  <a href="services.php"><i class="fa-brands fa-servicestack"></i>Services</a>
</div>
      
</body>
</html>

<main role="main" class="container">
			<!-- kailangan ini didto hit footer end tag div -->
			<div class="container marketing">
			<div class="container col-xl-10 col-xxl-8 px-4 py-5">
				<div class="row align-items-center g-lg-5 py-5">
					<div class="col-lg-7 text-center text-lg-start">
						<h1 class="display-4 fw-bold lh-1 mb-3"><b>Contact Us!!!</b></h1>
						<p class="col-lg-10 fs-4">Send us your inquiries or share your experience — your feedback helps us enhance our services to better suit your needs.</p>
					</div>
          <?php if (!empty($msg)):
             ?>
          <p class="<?php echo (strpos($msg, 'successfully') !== false) ? 'success-msg' : 'error-msg'; ?>">
          <?php echo htmlspecialchars($msg); ?>
           </p>
          <?php endif; ?>
	        <script>
          document.addEventListener('DOMContentLoaded', function () {
          const msgBox = document.querySelector('.success-msg, .error-msg');
           if (msgBox) {
            setTimeout(() => {
            msgBox.style.display = 'none';
           }, 3000);
         }
       });
  </script>
  <form action="contact.php" method="POST">
    <input type="text" name="name" placeholder="Name (optional)" />
    <textarea name="message" placeholder="Message/Feedback" required></textarea>
    <input type="email" name="email" placeholder="Email" required />
    <input type="text" name="contact" placeholder="Contact Number" />
    <button type="submit">Send</button>
    <small>By clicking Send, you agree to the terms of use.</small>
  </form>
					</div>
				</div>
			</div>
		
   <div class="vc_row-full-width vc_clearfix">
   </div>
  </div>
  <div class="row-wrapper  id_1688185f83dc9e1830176658 ">
    <div class=""><div class="large-12 columns">
      <div class="vc_column-inner ">
        <div class="wpb_wrapper">	
          <div class="vc_empty_space">
		<span class="vc_empty_space_inner"></span>
		<div class="" style="height: 50px"></div>
			</div>
</div>
</div>
</div>
</div>
  <footer><center>
	<div class="footer">
        <hr class="featurette-divider">
        <div class="row">
                <div class="col-lg-4">
                  <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
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

                </div><!-- /.col-lg-4 -->
				<p class="float-left"><a href="#">Back to top</a></p>
          </div>

</body>
</html>