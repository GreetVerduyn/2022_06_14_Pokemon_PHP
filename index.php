<?php
include_once "header.php";
const pokeUrl = "https://pokeapi.co/api/v2/pokemon/";
//echo file_get_contents(pokeUrl);

if (isset($_POST['pokemon'])) {

    // Get input field value
    $pokemon = $_REQUEST['pokemon'];
    $pokeInfo = file_get_contents(pokeUrl . $pokemon);
    $pokemonData = json_decode($pokeInfo, true);
    $name = ($pokemonData["name"]);
    $id = ($pokemonData["id"]);
    $image = ($pokemonData["sprites"]["front_default"]);
    $imageData = base64_encode(file_get_contents($image));

    $moves = ($pokemonData["moves"]);
    $moves4 = [];
    for ($i = 0; $i<=count($moves)&&$i<4; $i++) {
    array_push($moves4,$moves[$i]['move']);
    print_r($moves4[$i]['name']);
    }


    //echo $name;
    //echo $id;
   // print_r($moves[0]['move']['name']);
    //print_r($moves[1]['move']['name']);
    //print_r("<img src=" . $image . ">");
    //echo '<img src="data:image/jpeg;base64,' . $imageData . '">';
renderPokemons($name,$id, $image, $moves4);



    //var_dump($moves[0]);
    //var_dump($moves[0]->name);
}

function renderPokemons($name, $id, $image, $moves4) {
    echo "<div>
        <div class=picture>
            <div class='pokemonName'>$name</div>
            <div><img src=" . $image . " class='pokemonImage'></div>
        </div>
        <div class='idPokemon'>$id</div>?>
   </div>
    <div>
    
</div>";
   }
//var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>
<body>
<!--<div class="top">
    <div class="top-left">
        <p class="textSearchButton"> Enter the name or the Pokédex-number of the Pokémon you're looking for</p>
        <div>
            <form method="post" action="index.php">
                <input type="text" name="pokemon">
                <input type="submit" value="search">
            </form>
        </div>
    </div>
    <div class="top-right">
        <img id=logo src="images/logo-pokemon.png" alt="Pokémon">
    </div>
</div>
-->

<form method="get" action="index.php">
    <input type="submit" value="search evolution">
</form>

<?php

?>

<!--ORIGINEEL-->
<div class="top">
    <div class="top-left">
        <p class="textSearchButton"> Enter the name or the Pokédex-number of the Pokémon you're looking for</p>
        <div>
            <input id="searchText" type="search">
            <button onclick="search()" id="searchButton">search</button>
        </div>
    </div>
    <div class="top-right">
        <img id=logo src="images/logo-pokemon.png" alt="Pokémon">
    </div>
</div>

<div class="pokemonsInfo">
    <div class="PokemonIni">
        <!--Pokemon-->
        <div class="pokemons" id="pokemons">
        </div>
    </div>
    <div class="pokemonEvo">
        <!--Evolution-->
        <div class="topEvolutions">
            <button onclick="searchEvolutions()" id="searchEvolutions">search evolution</button>
            <p class="textEvolutions" id="textEvolutions">Evolutions</p>
        </div>
        <div class="evolutions" id="evolutions">
            <div class="evolution" id="evolution1"></div>
            <div class="evolution" id="evolution2"></div>
            <div class="evolution" id="evolution3"></div>
        </div>
    </div>

</div>


<!-- TEMPLATE -->
<template id="infoPokemon">
    <div class="picture">
        <img class="pokemonImage" src="" alt="image">
        <div class="pokemonName">response.name</div>
    </div>
    <div class="idPokemon">
        <div class="pokemonId">response.id</div>
    </div>
    <div class="pokemonMoves">
        <p class="textMoves"></p>
    </div>
</template>


<script src="script.js"></script>
</body>
</html>