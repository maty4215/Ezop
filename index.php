<?php

// Požádáme uživatele o zadání ezoterického kódu
echo "Zadejte kód v jazyce Ezop: ";
$input = trim(fgets(STDIN));

$variable = 0;
$index = 0;
$length = strlen($input);

while ($index < $length) {
    $command = $input[$index];
    $index++;

    if ($command == 'I' && isset($input[$index]) && $input[$index] == '@') {
        $index++;
        echo "Zadejte číslo: ";
        $variable = (int)trim(fgets(STDIN));
    } elseif ($command == 'G' && isset($input[$index]) && $input[$index] == '@') {
        $index++;
        $variable = rand(-1024, 1024);
    } elseif ($command == 'O' && isset($input[$index]) && $input[$index] == '@') {
        $index++;
        echo $variable . "\n";
    } elseif ($command == '+') {
        $variable++;
    } elseif ($command == '-') {
        $variable--;
    } elseif ($command == '0') {
        $variable = 0;
    } elseif ($command == '#') {
        echo "Skript ukončen.\n";
        exit(0);
    } else {
        echo "Chyba: Neznámý nebo neplatný příkaz '$command'\n";
        exit(1);
    }
}
