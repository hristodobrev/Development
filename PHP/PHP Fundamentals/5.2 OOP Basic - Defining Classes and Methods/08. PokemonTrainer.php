<?php

class Pokemon
{
    public $name;
    public $element;
    public $health;

    public function __construct($name, $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
}

class Trainer
{
    public $name;
    public $badges;
    /**
     * @var Pokemon[]
     */
    public $pokemons;

    public function __construct($name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[$pokemon->name] = $pokemon;
    }

    public function checkForPokemonWithElement($element)
    {
        $containsPokemonWithElement = false;
        foreach ($this->pokemons as $pokemon) {
            if ($pokemon->element == $element) {
                $containsPokemonWithElement = true;
                break;
            }
        }

        if ($containsPokemonWithElement) {
            $this->badges++;
        } else {
            foreach ($this->pokemons as $pokemon) {
                $pokemon->health -= 10;
                if ($pokemon->health <= 0) {
                    unset($this->pokemons[$pokemon->name]);
                }
            }
        }
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->badges . ' ' . count($this->pokemons);
    }
}

/**
 * @var Trainer[]
 */
$trainers = [];

$line = trim(fgets(STDIN));
while ($line != 'Tournament') {
    $tokens = explode(' ', $line);
    $trainerName = $tokens[0];
    $pokemonName = $tokens[1];
    $pokemonElement = $tokens[2];
    $pokemonHealth = intval($tokens[3]);

    if (!array_key_exists($trainerName, $trainers)) {
        $trainers[$trainerName] = new Trainer($trainerName);
    }

    $trainer = $trainers[$trainerName];
    $trainer->addPokemon(new Pokemon($pokemonName, $pokemonElement, $pokemonHealth));

    $line = trim(fgets(STDIN));
}

$element = trim(fgets(STDIN));
while ($element != 'End') {
    foreach ($trainers as $trainer) {
        $trainer->checkForPokemonWithElement($element);
    }

    $element = trim(fgets(STDIN));
}

usort($trainers, function($a, $b){
    return $a->badges < $b->badges;
});

foreach ($trainers as $trainer) {
    echo $trainer . PHP_EOL;
}