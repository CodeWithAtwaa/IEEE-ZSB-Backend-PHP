<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEEE Backend PHP</title>
</head>

<body>

    <?php
    $names = [
        "Mohamed 1 TAmer",
        "Mohamed 2 TAmer",
        "Mohamed 3 TAmer",
        "Mohamed 4 TAmer",
        "Mohamed 5 TAmer",
    ];
    ?>

    <h1>Users names</h1>
    <ul>
        <?php
        foreach ($names as $name):
        ?>
            <li>Mohamed 1 TAmer</li>
        <?php
        endforeach;
        ?>
    </ul>

    <?php
    $asoc = [
        'name' => "Mohamed",
        'age' => 20,
        'faculty' => 'FCI-ZU'
    ];
    foreach ($asoc as $key => $value):
        echo "<li>" . $key . ": " . $value . "</li>";
    endforeach;
    ?>
    </ul>


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

    function FilterByAuthor($books , $author) {
        $filterBooks = [];
        foreach($books as $book) {
            if($book['author'] === $author) {
                $filterBooks[] = $book;
            }
        }

        return $filterBooks;
    }


    ?>

    <ul>

        <?php foreach (FilterByAuthor($books , "Mohamed") as $book): ?>
            <?php if ($book['author'] == "Mohamed"): ?>
                <li>
                    <a href="<?= $book['purchaseUrl'] ?>">
                        <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

    </ul>



</body>

</html>