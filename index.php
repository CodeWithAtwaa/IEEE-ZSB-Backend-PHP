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
        foreach ($names as $name):
            echo "<li>" . $name . "</li>";
        endforeach;
        ?>
    </ul>
</body>

</html>