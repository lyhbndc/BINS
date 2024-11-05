<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .search-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container form {
            width: 100%;
            max-width: 400px;
        }
        .search-container input[type="text"] {
            width: 100%;
            padding: 10px 15px;
            border-radius: 25px;
            border: 2px solid #ccc;
            background: rgba(255, 255, 255, 0.5);
            outline: none;
            font-size: 16px;
            transition: background 0.3s, border-color 0.3s;
        }
        .search-container input[type="text"]::placeholder {
            color: #aaa;
        }
        .search-container input[type="text"]:focus {
            background: rgba(255, 255, 255, 0.8);
            border-color: #888;
        }
        .results-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        .movie-item {
            background: #f9f9f9;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: black;
            display: block;
        }
        .movie-title {
            font-size: 18px;
            font-weight: bold;
        }
        .movie-description {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="search-container">
    <form id="search-form">
        <input type="text" placeholder="Search..." name="query" id="search-query">
    </form>
</div>

<div class="results-container" id="results-container"></div>

<script>
    const movies = [
        { title: "Inception", description: "A thief who steals corporate secrets through the use of dream-sharing technology.", link: "https://www.imdb.com/title/tt1375666/" },
        { title: "The Matrix", description: "A computer hacker learns from mysterious rebels about the true nature of his reality.", link: "https://www.imdb.com/title/tt0133093/" },
        { title: "Interstellar", description: "A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.", link: "https://www.imdb.com/title/tt0816692/" }
    ];

    const resultsContainer = document.getElementById('results-container');
    const searchInput = document.getElementById('search-query');

    function displayMovies(query) {
        // Clear previous results
        resultsContainer.innerHTML = '';

        // Filter movies based on the query
        const filteredMovies = movies.filter(movie => movie.title.toLowerCase().includes(query.toLowerCase()));

        // Display results
        if (filteredMovies.length > 0) {
            filteredMovies.forEach(movie => {
                const movieItem = document.createElement('a');
                movieItem.classList.add('movie-item');
                movieItem.href = movie.link;
                movieItem.target = "_blank";

                const movieTitle = document.createElement('div');
                movieTitle.classList.add('movie-title');
                movieTitle.textContent = movie.title;

                const movieDescription = document.createElement('div');
                movieDescription.classList.add('movie-description');
                movieDescription.textContent = movie.description;

                movieItem.appendChild(movieTitle);
                movieItem.appendChild(movieDescription);

                resultsContainer.appendChild(movieItem);
            });
        } else {
            const noResults = document.createElement('div');
            noResults.classList.add('movie-item');
            noResults.textContent = 'No movies found';
            resultsContainer.appendChild(noResults);
        }
    }

    searchInput.addEventListener('input', function(event) {
        const query = event.target.value;
        displayMovies(query);
    });
</script>

</body>
</html>
