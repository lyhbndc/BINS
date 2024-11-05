<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "Howl_s Moving Castle";
        $image = "Movies/cover/16.png";
        $link = "Howl_s Moving Castle.php";
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
      background-image: url('Movies/bg/16.png');
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
      <a href="Movies/16. Howl_s Moving Castle/Howl_s Moving Castle.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/16. Howl_s Moving Castle/Howl_s Moving Castle.html" class="my-link">
              <img src="Movies/16. Howl_s Moving Castle/howl_thumb_0.png" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>"Howl's Moving Castle" is a spellbinding Studio Ghibli masterpiece that whisks viewers away on a fantastical journey through a world of magic and wonder, following the transformative adventures of a young woman named Sophie who finds herself caught up in a captivating tale of love, friendship, and self-discovery.</p>
              </div>
            </a>
            <a href="Movies/16. Howl_s Moving Castle/Howl_s Moving Castle.html" class="my-link">
              <img src="Movies/16. Howl_s Moving Castle/howl_thumb_1.png" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>Set against the backdrop of a war-torn kingdom, "Howl's Moving Castle" weaves a mesmerizing tale of love and enchantment as Sophie, transformed into an old woman by a wicked curse, seeks refuge in the magical moving castle of the mysterious wizard Howl. Their unconventional romance unfolds amidst a backdrop of whimsical landscapes and thrilling aerial battles.</p>
              </div>
            </a>
            <a href="Movies/16. Howl_s Moving Castle/Howl_s Moving Castle.html" class="my-link">
              <img src="Movies/16. Howl_s Moving Castle/howl_thumb_2.png" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>"Howl's Moving Castle" offers a captivating blend of steampunk aesthetics and magical whimsy as it follows Sophie's adventures in a world where technology and magic intertwine. From the enchanting confines of the titular mobile fortress to the breathtaking vistas of a war-torn kingdom, this film immerses viewers in a visually stunning and emotionally resonant journey.</p>
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
