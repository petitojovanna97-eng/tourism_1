<?php
    include 'db_connection.php';
    $msg = '';
    
    // Database connection
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "tourismdestination_db";
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    
    $carousel_result = $conn->query("UPDATE * FROM carousel_ft_tb ORDER BY cft_id");
    $hero_result = $conn->query("UPDATE * FROM hero_ft_tb ORDER BY hft_id");
    
    
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
      border: 1px solid white;
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
</head>
<br> 
<div class="navbar">
  <a class="active" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="search.php"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Login</a>
  <a href="services.php"><i class="fa-brands fa-servicestack"></i>Services</a>
</div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
         <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <div class="item active">
        <img src="https://www.essentialhome.eu/inspirations/wp-content/uploads/2016/12/Guide-for-a-short-trip-to-Paris-4.jpg" width= "100%"> 
        <div class="carousel-caption">
          <h3 style="font-size:40px">PARIS</h3>
          <p style="color:white; font-size:20px">Paris is a major rail, highway, and air transport hub. <br>The Île-de-France Mobilités (IDFM) <br>oversees the transit network in the region. <br>The syndicate coordinates public transport.<br> The RATP operates 347 bus lines, the Métro, eight tramway lines,<br> and sections of the RER.</p>
        </div>
      </div>
            <div class="item">
              <img src="http://1.bp.blogspot.com/-DQ7dy9Ca5kc/URO-x4abRPI/AAAAAAAAXaM/y8i5kP1HcbY/s1600/Maui-Hawaii.jpg" width= "100%"> 
              <div class="carousel-caption">
              <h3  style="font-size:40px">MAUI</h3>
              <p style="color:white; font-size:20px">Maui is known for its natural beauty and beloved for its pristine beaches,<BR> sacred Iao Valley, and humpback whale migration. <BR>This culturally dynamic island has so much to offer <br>visitors thanks to its incredible history. <BR>Maui also has a diverse ecosystem that includes lush tropical jungles,<BR> black lava outcroppings, and gorgeous beaches.</p>
        </div>
</div>  
        <div class="item">
              <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/28/61/7a/6f/caption.jpg?w=1200&h=1200&s=1" width= "100%"> 
              <div class="carousel-caption">
              <h3  style="font-size:40px">PALAWAN</h3>
              <p style="color: white, font-size:30px">Palawan is known as the Philippines' <BR>Last Frontier and as the Philippines' Best Island.<BR> Palawan Provincial Capitol in Puerto Princesa. <BR>The islands of Palawan stretch between Mindoro<BR> island in the northeast and Borneo in the southwest.</p>
        </div>      
    </div>
  
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#tourism destination website.php">Tourism Destination Website</a>
          </div>
          </div>
        </div>
      </nav>

       <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>  
  <div class="container"> </div>
    <div class="row">
      <div class="col-sm-4"><br><br><br>
      <img src="https://travel.usnews.com/dims4/USNEWS/fc20230/2147483647/resize/976x652%5E%3E/crop/976x652/quality/85/format/webp/?url=https%3A%2F%2Ftravel.usnews.com%2Fimages%2FGettyImages-117211856_1JncHVX.jpg" width="100%" class="img-thumbnail" alt="Cinque Terre"><br><br><br><br>
        <BR><h1 style="color: black; font-size:90px"><CENTER>MAUI</h1><BR><p style="color: black;">  I really want to go to MAUI because there are countries that offer jungles, deserts, savannahs and tropical islands and i really want to enjoy and experience it all.  according to the internet  MAUI has just about everything else, in mind-numbing abundance.   Few mountains can compare to the sheer scale of the Rockies, the beauty of Cape Breton’s Highlands, the ruggedness of the Yukon and northern British Columbia. <BR>So that i really want to go there just to enjoy.</p>
      </div>
      <div class="col-sm-4"> <br><br><br>
      <img src="https://www.alexisjetsets.com/wp-content/uploads/2019/08/puerto-princesa-philippines-alexisjetsets-e1567127796163.jpg"  width="100%" class="img-thumbnail" alt="Cinque Terre"><br><br><br><br><br>
      <h1 style="color: black;font-size:90px"><CENTER>PUERTO PRINCESA</h1>  
      <p>The Puerto Princesa Underground River is the most famous attraction of the city. It is included in UNESCO’s list of World Heritage Sites for its spectacular limestone karst landscape and remarkable biodiversity. It is also reputed to be the world’s longest navigable underground river. A paddle boat ride takes you to a section of the underground river, where you can enjoy views of massive stalagmite/stalactite formations and cave chambers. The Puerto Princesa Underground River is located in the quiet coastal village of Sabang.How to go:The underground river is typically reached by joining a day tour from Puerto Princesa. Tour packages include round trip land transfers to Sabang, picnic lunch at Sabang Beach and mandatory park permit/registration/fees. Sabang Beach is approximately 74 km northeast from Puerto Princesa city center. Travel time is around 1 hour and 40 minutes by car. The boat ride from Sabang Beach to the underground river entrance takes around 30 minutes.</p>  
      </div>
      <div class="col-sm-4"><br><br><br>
      <img src="https://www.megabites.com.ph/wp-content/uploads/2021/06/Palawan-1.jpg"  width="100%" class="img-thumbnail" alt="Cinque Terre"><br><br>
      <h1 style="color: black;font-size:90px"><center>PALAWAN</h1>    
      <p style="color:black">Palawan is long and narrow and trends northeast-southwest between the South China and Sulu seas. It has a maximum width of 24 miles (39 km) and a mountainous backbone that runs its entire 270-mile (434-km) length, with Mount Mantalingajan (6,840 feet [2,085 metres]) in the south as its highest peak. The archipelago off the southern tip that includes the Balabac and Bugsuk island groups is a remnant of a land bridge that connected Palawan and the island of Borneo during the Pleistocene Epoch (about 2,600,000 to 11,700 years ago); for that reason the animal life and vegetation are more closely related to those of Borneo than to those of the other Philippine islands.Palawan island, Philippines Palawan island, Philippines Palawan’s long, irregular coastline is fringed with coral reefs, and some 1,800 smaller islands and islets lie near Palawan; the main island groups are the Calamian (north), the Dumaran-Cuyo (northeast), and the Balabac-Bugsuk (south). A discontinuous coastal plain that seldom extends more than 5 miles (8 km) inland supports most of the island’s population. The plain, which is best developed on the southeastern coast, constitutes the main agricultural area and has the island’s only all-weather road. Puerto Princesa, on the east-central coast of Palawan island, is the island’s largest city.</p><br>
    </div>
    <br>
  <hr>
  <div class="container">    
          <div class="row">
            <div class="col-sm-4"><br>
            <img src="https://www.projectlupad.com/wp-content/uploads/2018/01/Spectacular-El-Nido-Palawan-Philippines-Aerial-View-Project-LUPAD.jpeg"  width="100%" class="img-thumbnail" alt="Cinque Terre">
              <BR><h1 style="color: black; font-size:90px"><CENTER>EL NIDO ISLAND</h1>
              <p style="color: black;"> El Nido is one of the most iconic destinations in Palawan province, known for its dramatic limestone cliffs, crystal-clear lagoons, white-sand beaches, and rich marine biodiversity. The area is part of Bacuit Bay, a protected seascape made up of around 45 islands and islets, many of which are only accessible by boat through island hopping tours.</p>
            </div>
            <hr>
            <div class="col-sm-4"> <br>
            <img src="https://filipiknow.net/wp-content/uploads/2019/11/tourist-spots-in-the-philippines-1.jpg"  width="100%" class="img-thumbnail" alt="Cinque Terre"><br><BR><br>
            <h1 style="color: black;font-size:90px"><CENTER>BORACAY</h1>  
            <p>Boracay Island’s White Beach is the island’s crown jewel, famous for its impossibly soft sands, turquoise waters, and breathtaking sunsets. This is where beach lovers, honeymooners, and adventure seekers come together to enjoy the beauty and energy of one of the world’s most celebrated islands.</p>  
            </div>
            <div class="col-sm-4"><br>
            <img src="https://filipiknow.net/wp-content/uploads/2019/11/tourist-spots-in-the-philippines-4.jpg"  width="100%" class="img-thumbnail" alt="Cinque Terre"><br><br><br>
            <h1 style="color: black;font-size:90px"><center>BOHOL</h1>    
            <p style="color:black">The Chocolate Hills are by far the most popular tourist attraction on Bohol Island and once you see it, it’s easy to understand why. Here lay hundreds of symmetrical green mountainous hills as far as the eye can see. During the dry season, these hills take on a milk-chocolate color- hence “Chocolate Hills”.</p><br>
          </div>
          <hr>
  <center>
  <div class="container"> </div>
         <div class="row">
           <div class="col-sm-4"><br><br><br>
           <img src="https://moderntrekker.com/wp-content/uploads/2019/01/the-most-beautiful-places-in-the-world-to-visit-6-768x1024.jpg" width="940" height=" 940" class="img-circle" alt="Cinque Terre"><br><br><br><br>
             <BR><h1 style="color: black; font-size:90px"><CENTER> Niagara Falls, Canada / USA</h1><BR><p style="color: black;">The Niagara Falls are located at the border between the state of New York and Ontario, Canada. They are one of the most powerful waterfalls, with a drop of water of 51 meters in height.Also, Niagara Falls is actually a collection of three waterfalls: The Horseshoe Falls is the main attraction and is on mostly the Canadian side while American Falls and the Bridal Veil Falls are on the American side. There is also a park on Goat Island that straddles the falls and sits on the American side. Image via Google Maps.Though there are several differences between both sides, and it is difficult to decide if Niagara Falls is better from the US or Canada, the truth is that this cascade is breathtaking regardless of where one sees it! More Differences Between The Canadian & U.S. Sides Of Niagara Falls Visitors often wonder, "Which side of Niagara Falls is better?" </p>
           </div>
           <hr>
           <div class="col-sm-4"> <br><br><br>
           <img src="https://moderntrekker.com/wp-content/uploads/2019/01/the-most-beautiful-places-in-the-world-to-visit-7-768x1024.jpg" width="940" height=" 940" class="img-circle" alt="Cinque Terre"><br><br><br>
           <h1 style="color: black;font-size:90px"><CENTER>Swiss Alps, Switzerland</h1>  
           <p>The Swiss Alps extend from both Valais in the West to Graubünden in the East. Of this, the most important blocks are the Alps in Valais, Bern, Appenzell, Glarus, Ticino, and Grisons (Graubünden). The Mont Blanc massif in Valais is shared with France and Italy. And the Bernina Range is shared with Northern Italy.The Western Swiss Alps cover much of the mountains in Valais and Bernese Oberland. These are high four- and three-thousand peaks and are known worldwide. Here are the alpine regions in the Western Swiss Alps: At 23 kilometers, Aletsch Glacier is the largest in the Swiss Alps. Since 2001, it has been part of the UNESCO World Heritage.</p>  
           </div>
           <div class="col-sm-4">
           <img src="https://moderntrekker.com/wp-content/uploads/2019/01/the-most-beautiful-places-in-the-world-to-visit-12-1024x706.jpg" width="940" height=" 940" class="img-circle" alt="Cinque Terre" ><br><br><br><br><br><br>
           <h1 style="color: black;font-size:90px"><center>The Grand Canyon, USA</h1>    
           <p style="color:black">Uluru/Ayers Rock, giant monolith, one of the tors (isolated masses of weathered rock) in southwestern Northern Territory, central Australia. It has long been revered by a variety of Australian Aboriginal peoples of the region, who call it Uluru. It is oval in shape and rises 1,142 feet above the surrounding desert.Ayers Rock is a type of rock called arkose, a coarse grained sandstone rich in the mineral feldspar. The sandy sediment, which hardened to form this arkose, was eroded from high mountains composed largely of granite. Average composition is approximately 50% feldspar, 25–35% quartz and up to 25% of other rock fragments.</p><br>
         </div>
    <footer class="container">
			<p class="float-right"><a href="#">Back to top</a></p>
			<p>© 2025 LeyteSamar/OTHERcountriesTD Inc.</p>
		</footer>
    <br>
  </div>
</div>
</body>
  </div>
</div>
</body>
</html>