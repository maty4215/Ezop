# Interpret ezoterického jazyka

Tento skript interpretuje jednoduchý ezoterický jazyk Ezop.

## Příkazy

- I@ : Načte číslo od uživatele a uloží ho do proměnné @
- G@ : Vygeneruje náhodné číslo (-1024 až 1024) a uloží ho do @
- O@ : Vypíše hodnotu proměnné @
- "+" : Zvýší hodnotu @ o 1
- "-"  : Sníží hodnotu @ o 1
- 0  : Nastaví hodnotu @ na 0
- "#"  : Ukončí program

## Struktura kódu

Skript požadá uživatele, aby zadal kód v jazyce Ezop

```php
<?php
echo "Zadejte kód v jazyce Ezop: ";
$input = trim(fgets(STDIN));
```

Nastavení proměnných

```php
$variable = 0;
$index = 0;
$length = strlen($input);
```

Tato část kódu prochází každý znak vstupního řetězce $input a podle něj provádí různé operace na proměnné $variable.

```php
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
```

## Příklad použití

Příklad vstupu: "I@++O@-O@#"
1. Spusťte skript: php index.php
2. Zadejte kód: I@++O@-O@#
3. Program vás požádá o číslo, například zadáte 5
4. Výstup bude:
   7
   6
   Skript ukončen.

   ---

   ![Example](example.png)

### Vysvětlení kódu

1. I@ - Požádá uživatele o vstupní číslo a uloží ho do proměnné @ (např. 5)
2. "+"  - Zvýší hodnotu @ o 1 (6)
3. "+"  - Zvýší hodnotu @ o 1 (7)
4. O@ - Vypíše hodnotu @ (7)
5. "-"  - Sníží hodnotu @ o 1 (6)
6. O@ - Vypíše hodnotu @ (6)
7. "#"  - Ukončí skript a zobrazí hlášku "Skript ukončen."
