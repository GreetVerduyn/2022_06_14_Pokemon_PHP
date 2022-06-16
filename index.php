<?php
include_once "header.php";
const pokeUrl = "https://pokeapi.co/api/v2/pokemon/";
//echo file_get_contents(pokeUrl);

if (isset($_POST['pokemon'])) {
    include_once "template_pokemon.php";
    // Get input field value
    $pokemon = $_REQUEST['pokemon'];
    $pokeInfo = file_get_contents(pokeUrl . $pokemon);
    $pokemonData = json_decode($pokeInfo, true);
    $name = ($pokemonData['name']);
    $id = ($pokemonData['id']);
    $image = ($pokemonData['sprites']['front_default']);
    $imageData = base64_encode(file_get_contents($image));

    $moves = ($pokemonData['moves']);
    $moves4=[];
    for ($i = 0; $i<4; $i++) {
        //echo $moves[$i]['move']['name'];
    array_push($moves4,$moves[$i]['move']['name']);
    }
    $movestr = implode(" ",$moves4);

renderPokemons($name,$id, $image, $movestr);
    //var_dump($moves[0]);
    //var_dump($moves[0]->name);
}



if (isset($_POST['evolution'])) {
    echo "Hello";
//include_once "template_evolutions.php";
// Get input field value
//$pokemon = $_REQUEST['pokemon'];
//$pokeInfo = file_get_contents(pokeUrl . $pokemon);
//$pokemonData = json_decode($pokeInfo, true);
//$name = ($pokemonData['name']);
//$evolutions = ($pokemonData['evolution_chain']);
//echo($evolutions);
//$image = ($pokemonData['sprites']['front_default']);
//$imageData = base64_encode(file_get_contents($image));
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>
<body>

<!--
<form method="get" action="index.php">
    <input type="submit" value="search evolution">
</form>
-->

ORIGINEEL
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