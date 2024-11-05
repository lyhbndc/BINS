<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "The Tale of The Princess Kaguya";
        $image = "Movies/cover/1.png";
        $link = "The Tale of The Princess Kaguya.php";
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
      background-image: url('Movies/bg/1.png');
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
      <a href="Movies/1. The Tale of The Princess Kaguya/kaguya.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/1. The Tale of The Princess Kaguya/kaguya.html" class="my-link">
              <img src="Movies/1. The Tale of The Princess Kaguya/kaguya_thumb_0.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>Based on a classic Japanese folktale, it tells the story of a magical girl found inside a bamboo stalk who grows into a captivating young woman. The film's unique hand-drawn animation style, inspired by traditional Japanese art, creates a visually stunning and deeply emotional experience.</p>
              </div>
            </a>
            <a href="Movies/1. The Tale of The Princess Kaguya/kaguya2.html" class="my-link">
              <img src="Movies/1. The Tale of The Princess Kaguya/kaguya_thumb_1.jpg" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>The film follows Princess Kaguya, discovered as a tiny girl inside bamboo, as she grows and faces the complexities of human life. The delicate, sumi-e inspired animation enhances this meditative and moving cinematic journey.</p>
              </div>
            </a>
            <a href="Movies/1. The Tale of The Princess Kaguya/kaguya3.html" class="my-link">
              <img src="Movies/1. The Tale of The Princess Kaguya/kaguya_thumb_2.jpg" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>Found as a baby inside a bamboo stalk, Princess Kaguya matures into a beautiful woman, confronting noble suitors and royal expectations. The film's exquisite visuals and evocative storytelling explore themes of love, loss, and the quest for happiness, making it a timeless reflection on human existence.</p>
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
