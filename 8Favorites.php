<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "nexer");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_SESSION['user'];
$query = "SELECT * FROM movies WHERE username = '$user'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nexer</title>
  <link rel="stylesheet" href="Favorites/favorites.css">
  <style>
    .body{
      overflow-x: hidden;
      overflow-y: auto;
    }
    .favorite-item {
        margin: 10px;
        text-align: center;
        display: inline-block;
        width: 20px;
        vertical-align: top;
        text-decoration: none;
        color: inherit;
    }

    .favorite-item img {
        width: 300px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .favorite-item h2 {
        font-size: 1.2em;
        margin: 10px ;
    }

    .box {
      display: grid;
  grid-gap: 60px;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Adjust the minmax values as needed */
  justify-content: space-around;
    }
    @media(max-width: 1024px) {
  .box {
    grid-gap: 30px;
  }
}

@media(max-width: 768px) {
  .box {
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Adjust the minmax values as needed */
  }
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
    
    <section class="main-container">
      <div class="location" id="home">
        <h1 id="home">Favorites</h1>
        <div class="box">
          <?php
          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<a href="' . htmlspecialchars($row["Page"]) . '" class="favorite-item">';
                  echo '<div>';
                  echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["title"]) . '">';
                  echo '</div>';
                  echo '</a>';
              }
          } else {
              echo '<p>No favorites found.</p>';
          }
          mysqli_close($conn);
          ?>
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
