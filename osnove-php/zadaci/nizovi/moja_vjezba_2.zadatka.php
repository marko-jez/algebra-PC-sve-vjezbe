<?php

$users = [
    "Prvi korisnik" => [
        "ime" => "Primačica",
        "prezime" => "Mrdić",
        "godine" => 34,
        "spol" => "ženski"
    ],
    "Drugi korisnik" => [
        "ime" => "Mrdator",
        "prezime" => "Zadnjice",
        "godine" => 69,
        "spol" => "muško"
    ]

    ];

    unset($users["Prvi korisnik"]["spol"]);
    unset($users["Drugi korisnik"]["spol"]);
    var_dump($users);

    $users ["Treći korisnik"] = [
        "ime" => "Normalan",
        "prezime" => "Lik",
        "godine" => 20,
    ];

    echo "<pre>";
    print_r($users);
    echo "</pre>";