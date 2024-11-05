<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "Grave of the Fireflies";
        $image = "Movies/cover/4.png";
        $link = "Grave of the Fireflies.php";
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
      background-image: url('Movies/bg/4.png');
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
      <a href="Movies/4. Grave of the Fireflies/grave.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/4. Grave of the Fireflies/grave.html" class="my-link">
              <img src="Movies/4. Grave of the Fireflies/grave_thumb_0.png" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"Grave of the Fireflies," directed by Isao Takahata, is a heart-wrenching animated film about two siblings, Seita and Setsuko, struggling to survive in war-torn Japan. The film's stark portrayal of the human cost of conflict and its beautiful animation leave a lasting emotional impact.</p>
              </div>
            </a>
            <a href="Movies/4. Grave of the Fireflies/grave2.html" class="my-link">
              <img src="Movies/4. Grave of the Fireflies/grave_thumb_1.jpg" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>Set in war-torn Japan, "Grave of the Fireflies" follows Seita and his sister Setsuko as they face displacement, hunger, and loss. Their enduring bond and small moments of joy amidst the bleakness highlight their resilience in this powerful Studio Ghibli masterpiece.</p>
              </div>
            </a>
            <a href="Movies/4. Grave of the Fireflies/grave3.html" class="my-link">
              <img src="Movies/4. Grave of the Fireflies/grave_thumb_2.webp" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>"Grave of the Fireflies" blends visual elegance with the tragic realities of war. Through Seita and Setsuko's eyes, the film juxtaposes childhood innocence with brutality, creating an unforgettable cinematic experience that underscores war's enduring impact on the human soul.</p>
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
