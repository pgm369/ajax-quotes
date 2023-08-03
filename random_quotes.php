<?php
// Array of quotes
$quotes = [
    "Just Keep Swimming :) - Dory, Finding Nemo",
    "Some People Are Worth Melting For - Olaf, Frozen",
    "You know what inspires me? Fearlessness, drive. Barbz stay in school. Don't you ever be lazy; don't you ever complain about hard work - Nicki Minaj",
    "kindness always comes back - k.tolnoe",
    "May The Odds Be Ever In Your Favor - The Hunger Games",
];

// Get a random index
$randomIndex = array_rand($quotes);

// Return the random quote
echo $quotes[$randomIndex];
?>
