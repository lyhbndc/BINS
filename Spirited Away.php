<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    $title = "Spirited Away";
    $image = "Movies/cover/2.png";
    $link = "Spirited Away.php";
    $user = $_SESSION['user'];

    // Check if the movie is already added to favorites
    $query_check = "SELECT * FROM movies WHERE title = '$title' AND Username = '$user'";
    $result_check = mysqli_query($conn, $query_check);
    if (mysqli_num_rows($result_check) > 0) {
        // Movie already added to favorites, show toast message
        echo '<script>alert("Movie already added to favorites.");</script>';
    } else {
        $query = "INSERT INTO movies (title, image, Username, Page) VALUES ('$title', '$image', '$user', '$link')";
        $result = mysqli_query($conn, $query);
        header("Location: /php_programs/Final_Project/Nexer/8favorites.php");
        exit;
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nexer</title>
  <link rel="stylesheet" href="Movies/movies.css">
  <style>
    body{
      overflow-x: hidden;
    }
    .wrapper {
      background-image: url('Movies/2. Spirited Away/bg.png');
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <header>
      <div class="netflixLogo">
        <a id="logo" href="6homepage.php"><img src="Movies/Assets/logo.png" alt="Logo Image"></a>
      </div>      
      <nav class="main-nav">                
        <a href="6homepage.php#home">Home</a>
        <a href="6homepage.php#tvShows">TV Shows</a>
        <a href="6homepage.php#movies">Movies</a>
        <a href="8Favorites.php">Favorites</a>
      </nav>
      <nav class="sub-nav">
        <a href="#"><i class="fas fa-search sub-nav-logo"></i></a>
        <a href="#"><i class="fas fa-bell sub-nav-logo"></i></a>
        <a href="10account.php">Account</a>        
      </nav>      
    </header>
    <form method="POST">
    <div class="button-container">
      <a href="Movies/2. Spirited Away/spirited.html"><button class="button">Play</button></a>
     
      <button class="button1" name = "Add">Add</button> <!-- Assuming movie_id = 1 for this example -->
      
    </div>
    </form>
    <form id="addToFavoritesForm" method="POST" action="add_to_favorites.php" style="display:none;">
      <input type="hidden" name="movie_id" id="movie_id">
    </form>
    
    <script>
      function addToFavorites(movieId) {
          document.getElementById('movie_id').value = movieId;
          document.getElementById('addToFavoritesForm').submit();
      }
    </script>
    
    <section class="main-container">
      <div class="location" id="home">
          <h1 id="home">Season 1</h1>
          <div class="box">
            <a href="Movies/2. Spirited Away/spirited.html" class="my-link">
              <img src="Movies/2. Spirited Away/501054.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"Spirited Away" (2001) by Hayao Miyazaki is a mesmerizing film about a girl named Chihiro who becomes trapped in a magical world.</p>
              </div>
            </a>
            <a href="Movies/2. Spirited Away/spirited2.html" class="my-link">
              <img src="Movies/2. Spirited Away/tumblr_86b54f82c5092717af56c1b1cc9b0f37_b0b6109a_540.webp" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>Chihiro, a 10-year-old girl, finds herself in a mystical world after her parents are cursed. With the help of her new friend Haku, she embarks on a journey to save her parents and find her way home.</p>
              </div>
            </a>
            <a href="Movies/2. Spirited Away/spirited3.html" class="my-link">
              <img src="Movies/2. Spirited Away/spirited-away-1.jpg.crdownload.jpg" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>Chihiro, a young girl who enters a mystical world where her parents are turned into pigs. She must navigate this enchanting realm filled with spirits and magical beings to save her parents and return home.</p>
              </div>
            </a>
          </div>
      </div>
    </section>

    <footer>
      <p>&copy 2024 Nexer, Inc.</p>
      <p>II - BINS</p>
    </footer>
  </div>
</body>
</html>
