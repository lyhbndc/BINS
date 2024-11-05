<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nexer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Homepage/homepagestyle.css">
  <style>
          .search-container {
            width: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .search-container form {
            width: 100%;
            max-width: 400px;
        }
        .search-container input[type="text"] {
            width: 100%;
            padding: 10px 15px;
            border-radius: 25px;
            border: 2px gray; 
            background: rgba(255, 255, 255, 0.5); 
            outline: none; 
            font-size: 16px;
            transition: background 0.3s, border-color 0.3s; 
        }
        .search-container input[type="text"]::placeholder {
            color: gray; 
        }
        .search-container input[type="text"]:focus {
            background: rgba(255, 255, 255, 0.8); 
            border-color: #888; 
        }
        </style>
</head>
<body>
  <div class="wrapper">
    <header>

    <div class="netflixLogo">
      <a id="logo" href="6homepage.php"><img src="Homepage/Assets/logo.png" alt="Logo Image"></a>
    </div>      
    <nav class="main-nav">                
      <a href="#home">Home</a>
      <a href="#tvShows">TV Shows</a>
      <a href="#movies">Movies</a>
      <a href="8Favorites.php">Favorites</a>
    </nav>
    <nav class="sub-nav">
      <div class="search-container">
        <form action="search.php" method="GET">
          <input type="text" placeholder="Search..." name="query">
        </form>
      </div>
      <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
      <a href="10account.php">Account</a>    
      <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>    
    </nav>      

    </header>
    <div class="button-container">
      <a href="Spirited Away.php"><button class="button">Play</button></a>
    </div>
    
    <section class="main-container" >
      <div class="location" id="home">
          <h1 id="home">Popular on Nexer</h1>
          <div class="box">
            <a href="Castle in the Sky.php"><img src="Movies/cover/17.png" alt=""></a>
            <a href="Grave of the Fireflies.php"><img src="Movies/cover/4.png" alt=""></a>
            <a href="Howl_s Moving Castle.php"><img src="Movies/cover/16.png" alt=""></a>
            <a href="Kiki_s Delivery Service.php"><img src="Movies/cover/13.png" alt=""></a>
            <a href="My Neighbor Totoro.php"><img src="Movies/cover/9.png" alt=""></a>
            <a href="Ponyo.php"><img src="Movies/cover/12.png" alt=""></a>
          </div>
      </div>        

      <h1 id="movies">Movies</h1>
      <div class="box">
        <a href="Whisper of the Heart.php"><img src="Movies/cover/18.png" alt=""></a>
        <a href="When Marnie Was There.php"><img src="Movies/cover/3.png" alt=""></a>
        <a href="The Wind Rises.php"><img src="Movies/cover/10.png" alt=""></a>
        <a href="The Cat Returns.php"><img src="Movies/cover/19.png" alt=""></a>
        <a href="Pom Poko.php"><img src="Movies/cover/7.png" alt=""></a>
        <a href="Nausicaä of the Valley of the Wind.php"><img src="Movies/cover/11.png" alt=""></a>                  
      </div>
      
      <h1 id="tvShows">TV Shows</h1>
      <div class="box">
        <a href="The Secret World of Arrietty.php"><img src="Movies/cover/6.png" alt=""></a>
        <a href="The Tale of The Princess Kaguya.php"><img src="Movies/cover/1.png" alt=""></a>
        <a href="Porco Rosso.php"><img src="Movies/cover/15.png" alt=""></a>
        <a href="Ponyo.php"><img src="Movies/cover/12.png" alt=""></a>
        <a href="Only Yesterday.php"><img src="Movies/cover/8.png" alt=""></a>
        <a href="Ocean Waves.php"><img src="Movies/cover/20.png" alt=""></a>

        <a href="Princess Mononoke.php"><img src="Movies/cover/5.png" alt=""></a>
        <a href="My Neighbors the Yamadas.php"><img src="Movies/cover/14.png" alt=""></a>
        <a href="My Neighbor Totoro.php"><img src="Movies/cover/9.png" alt=""></a>
        <a href="Kiki_s Delivery Service.php"><img src="Movies/cover/13.png" alt=""></a>
        <a href="Howl_s Moving Castle.php"><img src="Movies/cover/16.png" alt=""></a>
        <a href="Grave of the Fireflies.php"><img src="Movies/cover/4.png" alt=""></a>              
      </div>
     

    <footer>
      <p>&copy 2024 Nexer, Inc.</p>
      <p>II - BINS</p>
    </footer>
  </div>
</body>
</html>

</body>
</html>
