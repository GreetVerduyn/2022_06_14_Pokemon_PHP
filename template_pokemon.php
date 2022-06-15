<?php

function renderPokemons($name, $id, $image, $moves4)
{
    echo "
<div>
    <div class=picture>
         <div class='pokemonName'>$name</div>
            <div><img src=" . $image . " class='pokemonImage'></div>
          
           <div class='idPokemon'>N° $id</div>
           </div>
    </div>
</div>
";

}

?>
<div class='pokemonsInfo'>
    <div class='PokemonIni'>
        <!--Pokemon-->
        <div class='pokemons' id='pokemons'></div>
    </div>
    <div class='pokemonEvo'>
        <!--Evolution-->
       <div class='topEvolutions'>
            <form method='get' action='index.php' name="evolution">
            <input type='submit' value='search evolution'>
            </form>

           <p class= 'textEvolutions' id='textEvolutions'>Evolutions</p>
       </div>
        <div class='evolutions' id='evolutions'>
            <div class='evolution' id='evolution1'></div>
            <div class='evolution' id='evolution2'></div>
            <div class='evolution' id='evolution3''></div>
        </div>
    </div>

</div>


  

