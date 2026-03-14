<?php
$books = [
    [
        'name' => "DSA",
        'author' => 'Mohamed',
        'releaseYear' => 2026,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "DB",
        'author' => 'Ahmed',
        'releaseYear' => 2005,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "PHP",
        'author' => 'Abbas',
        'releaseYear' => 2000,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "DSA",
        'author' => 'Mohamed',
        'releaseYear' => 2026,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "DB",
        'author' => 'Ahmed',
        'releaseYear' => 2005,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "PHP",
        'author' => 'Abbas',
        'releaseYear' => 2000,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "DSA",
        'author' => 'Mohamed',
        'releaseYear' => 2026,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "DB",
        'author' => 'Ahmed',
        'releaseYear' => 2005,
        'purchaseUrl' => "http://localhost:8888/"
    ],
    [
        'name' => "PHP",
        'author' => 'Abbas',
        'releaseYear' => 2000,
        'purchaseUrl' => "http://localhost:8888/"
    ],
];


$filteredItems = array_filter($books, function ($book) {
    return $book['releaseYear'] <= 2000;
});


require("index.view.php");