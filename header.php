
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

</body>
</html>