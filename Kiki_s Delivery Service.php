<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "Kiki_s Delivery Service";
        $image = "Movies/cover/13.png";
        $link = "Kiki_s Delivery Service.php";
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
      background-image: url('Movies/bg/13.png');
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
      <a href="Movies/13. Kiki_s Delivery Service/Kiki_s Delivery Service.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/13. Kiki_s Delivery Service/Kiki_s Delivery Service.html" class="my-link">
              <img src="Movies/13. Kiki_s Delivery Service/kiki_thumb_0.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"Kiki's Delivery Service", follows the adventures of a young witch named Kiki. At 13, she must leave home for a year to train and find her place in the world. Settling in a seaside town, Kiki starts a delivery service, learning about independence, friendship, and self-discovery along the way.</p>
              </div>
            </a>
            <a href="Movies/13. Kiki_s Delivery Service/Kiki_s Delivery Service.html" class="my-link">
              <img src="Movies/13. Kiki_s Delivery Service/kiki_thumb_1.png" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>Directed by Hayao Miyazaki, "Kiki's Delivery Service" showcases Studio Ghibli's signature hand-drawn animation. The film beautifully captures the charm of a European-inspired coastal town and the magic of Kiki's world, combining detailed backgrounds with whimsical, heartwarming visuals.</p>
              </div>
            </a>
            <a href="Movies/13. Kiki_s Delivery Service/Kiki_s Delivery Service.html" class="my-link">
              <img src="Movies/13. Kiki_s Delivery Service/kiki_thumb_2.png" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>"Kiki's Delivery Service" explores themes of growing up, self-reliance, and the journey to find one's place in the world. Through Kiki's experiences, the film emphasizes the importance of resilience, community, and the courage to follow one's own path.</p>
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
