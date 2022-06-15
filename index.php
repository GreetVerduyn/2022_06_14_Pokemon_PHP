<?php

CONST pokeUrl = "https://pokeapi.co/api/v2/pokemon/";
//echo file_get_contents(pokeUrl);

if ( isset( $_POST['pokemon'] ) ) {

    // Get input field value
    $pokemon = $_REQUEST['pokemon'];
    $pokeInfo = file_get_contents(pokeUrl.$pokemon);
}
var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Pokedex</title>
</head>
<body>
<div class="top">
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


<form method="get" action="index.php">
        <input type="submit" value="search evolution">
</form>

<?php
echo $pokeInfo
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
           <p class= "textEvolutions" id="textEvolutions">Evolutions</p>
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