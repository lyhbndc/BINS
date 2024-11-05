<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['Add'])) {
    

        $title = "Castle in the Sky";
        $image = "Movies/cover/17.png";
        $link = "Castle in the Sky.php";
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
      background-image: url('Movies/bg/17.png');
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
      <a href="Movies/17. Castle in the Sky/castle.html"><button class="button">Play</button></a>
     
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
            <a href="Movies/17. Castle in the Sky/Castle in the Sky.html" class="my-link">
              <img src="Movies/17. Castle in the Sky/castle_thumb_0.jpg" alt="">
              <div class="text-container">
                <h2>Episode 1</h2>
                <p>Based on a classic adventure tale, the story begins with Sheeta, a girl with a mysterious crystal, who escapes from government agents. She meets Pazu, a boy dreaming of finding Laputa, the mythical floating island. The film's detailed animation and imaginative world-building create a captivating and enchanting start to their journey.</p>
              </div>
            </a>
            <a href="Movies/17. Castle in the Sky/Castle in the Sky.html" class="my-link">
              <img src="Movies/17. Castle in the Sky/castle_thumb_1.jpg" alt="">
              <div class="text-container">
                <h2>Episode 2</h2>
                <p>The adventure continues as Sheeta and Pazu form an alliance with a group of sky pirates to uncover the secrets of Laputa. The lush, detailed animation brings to life the rich, fantastical world, enhancing the sense of wonder and excitement as they soar through the skies.</p>
              </div>
            </a>
            <a href="Movies/17. Castle in the Sky/Castle in the Sky.html" class="my-link">
              <img src="Movies/17. Castle in the Sky/castle_thumb_2.jpg" alt="">
              <div class="text-container">
                <h2>Episode 3</h2>
                <p>Sheeta and Pazu finally reach Laputa, uncovering its advanced technology and ancient secrets. They confront moral dilemmas and powerful enemies, striving to protect Laputa's legacy. The film's breathtaking visuals and compelling narrative explore themes of friendship, greed, and the pursuit of knowledge, making it a timeless adventure that resonates with audiences of all ages.</p>
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
