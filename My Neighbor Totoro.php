<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "My Neighbor Totoro";
        $image = "Movies/cover/9.png";
        $link = "My Neighbor Totoro.php";
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
      background-image: url('Movies/bg/9.png');
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
      <a href="Movies/9. My Neighbor Totoro/spirited.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/9. My Neighbor Totoro/My Neighbor Totoro.html" class="my-link">
              <img src="Movies/9. My Neighbor Totoro/totoro_thumb_0.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"My Neighbor Totoro" is a beloved Studio Ghibli film that follows two sisters as they befriend magical creatures, including the iconic Totoro, in rural Japan. With its enchanting animation and themes of family and wonder, it's a heartwarming tale for all ages.</p>
              </div>
            </a>
            <a href="Movies/9. My Neighbor Totoro/My Neighbor Totoro.html" class="my-link">
              <img src="Movies/9. My Neighbor Totoro/totoro_thumb_1.png" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>"My Neighbor Totoro" is a magical journey directed by Hayao Miyazaki, where two sisters encounter forest spirits, notably Totoro, who brings joy and solace to their lives.</p>
              </div>
            </a>
            <a href="Movies/9. My Neighbor Totoro/My Neighbor Totoro.html" class="my-link">
              <img src="Movies/9. My Neighbor Totoro/totoro_thumb_2.jpg" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>"My Neighbor Totoro" captures the essence of childhood wonder as two sisters discover a world of magic and friendship with creatures like Totoro. </p>
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
