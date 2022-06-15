const baseUrl = "https://pokeapi.co/api/v2/pokemon/";


// fetch('http://example.com/movies.json')
//   .then(response => response.json())
//   .then(data => console.log(data));


const getApiData = async (url) => {
    const data = await fetch(url);
    const main = await data.json();
    return main;
}
document.getElementById('searchEvolutions').style.visibility = 'hidden';
document.getElementById('textEvolutions').style.visibility = 'hidden';




const infoPokemon = document.getElementById('infoPokemon');
let nameEvolutionStart;
let nameEvolution1;
let nameEvolution2;
let inputSearch;

function search() {
    document.getElementById('pokemons').innerHTML = '';
    document.getElementById('evolution1').innerHTML = '';
    document.getElementById('evolution2').innerHTML = '';
    document.getElementById('evolution3').innerHTML = '';
    document.getElementById('searchEvolutions').style.visibility = 'visible';
    document.getElementById('textEvolutions').style.visibility = 'hidden';


    inputSearch = document.getElementById('searchText').value;
    getApiData(baseUrl + inputSearch)
        .then(response => {
            let id = response.id;
            let name = response.name;
            let image = response.sprites['front_default'];
            const moves = response.moves.slice(0, 4);
            document.getElementById('searchText').value = '';
            renderPokemons(name, id, image, moves, 'pokemons');
        })
}

function searchEvolutions() {
    //document.getElementById('evolutions').innerHTML = '';
    //let inputSearch = document.getElementById('searchText').value;
    // console.log (inputSearch) OK
    document.getElementById('searchEvolutions').style.visibility = 'hidden';

    getApiData(baseUrl + inputSearch)
        .then(response => {
            const urlSpecies = response.species.url;
            //console.log('getDataResponse', response);
            getApiData(urlSpecies).then(
                response => {
                    const urlEvolutionChain = response['evolution_chain'].url;
                    //console.log('speciesResult', response, urlEvolutionChain);
                    getApiData(urlEvolutionChain).then(
                        response => {

                            //console.log('evolutionChainResult', res);
                            console.log('evolutionChainResultChain', response.chain);
                            //console.log('basic', res.chain.species.name);
                            const allEvolutions = []
                            const origin = response.chain;
                            nameEvolutionStart = origin.species.name;
                            allEvolutions.push(nameEvolutionStart)
                            //console.log('evolution1', origin['evolves_to'][0].species.name);
                            if (origin['evolves_to'][0]) {
                                document.getElementById('textEvolutions').style.visibility = 'visible';
                                nameEvolution1 = origin['evolves_to'][0].species.name;
                                allEvolutions.push(nameEvolution1);
                            } else
                            {document.getElementById('textEvolutions').innerHTML= 'No Evolutions';
                            document.getElementById('textEvolutions').style.visibility = 'visible';
                            }
                            //console.log('evolution2', evol1['evolves_to'][0].species.name);
                            if (origin['evolves_to'][0]['evolves_to'][0]) {
                                const evol2 = origin['evolves_to'][0]['evolves_to'][0];
                                nameEvolution2 = origin['evolves_to'][0]['evolves_to'][0].species.name;
                                allEvolutions.push(nameEvolution2);
                            }

                            for (let i=0; i<allEvolutions.length; i++){
                                getApiData(baseUrl + allEvolutions[i])
                                    .then(response => {
                                        console.log('all evolutions', allEvolutions)
                                        let id = response.id;
                                        let name = response.name;
                                        let image = response.sprites['front_default'];
                                        const moves = response.moves.slice(0, 4);
                                        renderPokemons(name, id, image, moves, 'evolution'+(i+1));
                                    })
                            }
                                console.log('nameEvolutionStart', nameEvolutionStart);
                            console.log('nameEvolution1', nameEvolution1);
                            console.log('nameEvolution2', nameEvolution2);
                        })
                }
            )
        })
}


function renderPokemons(name, id, image, moves, container) {
    console.log('container',container)
    const pokemonContainer = document.getElementById(container);
    const item = infoPokemon.content.cloneNode(true);

    item.querySelector('.pokemonImage').src = image;
    item.querySelector('.pokemonImage').alt = name;
    item.querySelector('.pokemonName').innerHTML = name;
    item.querySelector('.pokemonId').innerHTML = `N° ${id}`;
    item.querySelector('.textMoves').innerHTML= 'Moves';
    let ulMoves = document.createElement("ul");



    for (let i = 0; i < moves.length; i++) {
        let liMoves = document.createElement("li");
        liMoves.innerHTML = moves[i].move.name;

        ulMoves.appendChild(liMoves);

    }

    item.querySelector('.pokemonMoves').appendChild(ulMoves);


    //item.querySelector('.front').alt = playCards[i].name;

    pokemonContainer.append(item);
}


/*
function search() {
    document.getElementById('pokemons').innerHTML = '';
    document.getElementById('evolutions').innerHTML = '';

    let inputSearch = document.getElementById('searchText').value;
    // console.log (inputSearch) OK
    getApiData(baseUrl + inputSearch)
        .then(response => {
                //console.log('getDataResponse', response);
                let id = response.id;
                let name = response.name;
                let image = response.sprites['front_default'];
                const moves = response.moves.slice(0, 4);
                renderPokemons(name, id, image, moves, 'pokemons');
                const urlSpecies = response.species.url;

                getApiData(urlSpecies).then(
                    res => {
                        const urlEvolutionChain = res['evolution_chain'].url;
                        //console.log('speciesResult', res, urlEvolutionChain);
                        getApiData(urlEvolutionChain).then(
                            res => {

                                //console.log('evolutionChainResult', res);
                                console.log('evolutionChainResultChain', res.chain);
                                //console.log('basic', res.chain.species.name);
                                const origin = res.chain;
                                let nameEvolutionStart = origin.species.name;
                                //console.log('evolution1', origin['evolves_to'][0].species.name);
                                const evol1 = origin['evolves_to'][0];
                                let nameEvolution1 = origin['evolves_to'][0].species.name;
                                //console.log('evolution2', evol1['evolves_to'][0].species.name);
                                const evol2 = evol1['evolves_to'][0];
                                let nameEvolution2 = evol1['evolves_to'][0].species.name;


                                console.log('nameEvolutionStart', nameEvolutionStart);
                                console.log('nameEvolution1', nameEvolution1);
                                console.log('nameEvolution2', nameEvolution2);
                            })

                    }
                )

            }
        )

    function renderPokemons(name, id, image, moves, container) {
        const pokemonContainer = document.getElementById(container);
        const item = infoPokemon.content.cloneNode(true);

        item.querySelector('.pokemonImage').src = image;
        item.querySelector('.pokemonImage').alt = name;
        item.querySelector('.pokemonName').innerHTML = name;
        item.querySelector('.pokemonId').innerHTML = `N° ${id}`;
        let ulMoves = document.createElement("ul");
        let movesText = document.createElement("p")


        for (let i = 0; i < moves.length; i++) {
            let liMoves = document.createElement("li");
            liMoves.innerHTML = moves[i].move.name;

            ulMoves.appendChild(liMoves);
        }

        item.querySelector('.pokemonMoves').appendChild(ulMoves);


        //item.querySelector('.front').alt = playCards[i].name;

        pokemonContainer.append(item);
    }

}
*/
