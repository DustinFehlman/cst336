<?php
$searchText = $_POST["searchText"];
$requestURL = "https://api.themoviedb.org/3/search/movie?api_key=66886a46bb1b1cfc593a89b28e79f26c&language=en-US&query=".urlencode($searchText)."&page=1&include_adult=false";
echo file_get_contents($requestURL);
?>