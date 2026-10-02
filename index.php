<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dziennik ocen</title>
</head>
<body>

<h2>Dziennik ocen</h2>

<form method="POST">
    Imię i nazwisko ucznia:
    <input type="text" name="uczen" required>
    <br><br>

    Przedmiot:
    <input type="text" name="przedmiot" required>
    <br><br>

    Ocena:
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <br><br>

    <input type="submit" value="Zapisz ocenę">
</form>

<?php

if(isset($_POST["uczen"]))
{
    $uczen = $_POST["uczen"];
    $przedmiot = $_POST["przedmiot"];
    $ocena = $_POST["ocena"];

    if(!file_exists("oceny.txt"))
    {
        $plik = fopen("oceny.txt","w");
        fclose($plik);
    }

    $plik = fopen("oceny.txt","a");

    $tekst = $uczen." | ".$przedmiot." | ocena: ".$ocena."\n";

    fwrite($plik,$tekst);

    fclose($plik);
}

echo "<h2>Oceny</h2>";

if(file_exists("oceny.txt"))
{
    $plik = fopen("oceny.txt","r");

    while(!feof($plik))
    {
        $zawartosc = fgets($plik);

        if($zawartosc != "")
        {
            echo $zawartosc."<br>";
        }
    }

    fclose($plik);
}

?>

</body>
</html>