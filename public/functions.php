<?php

// Je crée une fonction qui me filtre les données d'entrée pour m'éviter l'insertion de script
function filter_input_data($data) {
    return htmlspecialchars(trim($data));
}
