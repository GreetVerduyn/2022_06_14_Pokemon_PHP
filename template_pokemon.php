<?php

function renderPokemons($name, $id, $image, $moves4)
{
    echo "<div>
        <div class=picture>
            <div class='pokemonName'>$name</div>
            <div><img src=" . $image . " class='pokemonImage'></div>
        </div>
        <div class='idPokemon'>$id</div>?>
   </div>
    <div>
    
</div>
   
   "

}

;

/*
function template($title, $content) {


    <div style="background-color:grey">
        <?=$title?>
    </div>
    <div style="background-color:blue">
        <?=$content?>
    </div>
}
*/
?>