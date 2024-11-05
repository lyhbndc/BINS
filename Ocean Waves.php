<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "Ocean Waves";
        $image = "Movies/cover/20.png";
        $link = "Ocean Waves.php";
        $user = $_SESSION['user'];
     

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
    .wrapper {
      background-image: url('Movies/bg/20.png');
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
      <a href="Movies/20. Ocean Waves/Ocean Waves.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/20. Ocean Waves/Ocean Waves.html" class="my-link">
              <img src="Movies/20. Ocean Waves/ocean_thumb_0.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"Ocean Waves" beautifully captures the serene coastal backdrop of Kōchi, Japan, where high school friends Taku and Yutaka navigate the emotional waves brought on by the arrival of the intriguing transfer student, Rikako. The setting enhances the film's nostalgic and reflective tone.</p>
              </div>
            </a>
            <a href="Movies/20. Ocean Waves/Ocean Waves.html" class="my-link">
              <img src="Movies/20. Ocean Waves/ocean_thumb_1.jpg" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>"Ocean Waves" is a reflective and bittersweet tale that immerses viewers in the emotional turbulence of youth. Through the lens of Taku's memories, the film explores themes of longing, regret, and the fleeting nature of high school friendships and first loves.</p>
              </div>
            </a>
            <a href="Movies/20. Ocean Waves/Ocean Waves.html" class="my-link">
              <img src="Movies/20. Ocean Waves/ocean_thumb_2.jpg" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>"Ocean Waves" showcases Studio Ghibli's delicate and understated animation style, capturing the subtleties of everyday life and teenage emotions. The film's gentle pacing and detailed artwork create a realistic and immersive portrayal of adolescent experiences.</p>
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
