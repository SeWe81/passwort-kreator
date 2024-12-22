<?php

if ($_POST) {
    $zeichen = $_POST['charcount'];
    if ($zeichen < 6) {
        $error = "du brauchst mindestens 6 Zeichen";
        $strPasswort = 'ERROR';
    } else {
        $error = null;
        $randomizer = new \Random\Randomizer();
        $strQuellZeichen = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';

        $strPasswort = $randomizer->getBytesFromString($strQuellZeichen, $zeichen);
    }


}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>passwort-kreator</title>
</head>
<body>
<div class="generator_container">
    <div class="titel-container">
        <h1>Passwort Generator</h1>
        <h3>dein Passwort</h3>
    </div>
    <div class="passwort-container">
        <h5><?= $strPasswort ? $strPasswort : 'Klick generieren' ?></h5>
    </div>
    <form method="POST" action="#">
        <p>wie viele Zeichen?</p>
        <label for="number">wie viele Zeichen?</label>
        <div class="inputs-container">
            <input class="number-input" type="number" name="charcount" value="8" min="6" required>
            <input class="submit-input" type="submit" value="generieren">
        </div>
    </form>
</div>
<small><?= $error ? $error : "" ?></small>
</body>
</html>