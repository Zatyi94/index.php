<?php
//eco __DIR__;

$path = __DIR__.'\folder'; //DIRECTORY_SEPARATOR

$folderItems = scandir($path);

if (is_dir($path.DIRECTORY_SEPARATOR.$folderItems[3])) {
	echo "-Mappa";
} else {
	echo "-Nem mappa..";
}

echo PHP_EOL;

echo $folderItems[4];
if (is_file($path.DIRECTORY_SEPARATOR.$folderItems[4])) {
	echo "-File";
} else {
	echo "-Nem File..";
}

echo PHP_EOL;
echo PHP_EOL;

if (is_dir($path.DIRECTORY_SEPARATOR.$folderItems[3])) {
	echo "-Mappa";
} else {
	echo "-Nem mappa..";
}

echo PHP_EOL;
echo PHP_EOL;

//var_dump($folderItems);

foreach ($folderItems as $item) {
	if ( $item == '.' || $item == '..' ) {

	}
	else {
		echo PHP_EOL;
		if (is_dir($path . DIRECTORY_SEPARATOR . $item)) {
			echo "[" . $item . "]";
		} else {
			echo $item;
		}
	}
}

/*
mkdir($path.DIRECTORY_SEPARATOR."tejtermék".DIRECTORY_SEPARATOR."sajt",
    0777,
    true);
*/

/*
- | TULAJDONOS | CSOPORT | TÖBBIEK
777

4 - read
2 - write
1 - executive
*/

/*
 * filename -
 * data - fájlba írandó tartalom
 * flags - FILE_APPEND: tartalom hozzáfűzése
 */

// Megnyitja a fájlt, ír bele, majd bezárja
// ha csak 1x szeretnénk kiírni valamit, akkor ezt a parancsot érdemes használni
file_put_contents($path.DIRECTORY_SEPARATOR."file.txt", "Hello", FILE_APPEND);

// File méretének vizsgálata
echo "file.txt mérete: ".filesize($path.DIRECTORY_SEPARATOR."file.txt");

echo PHP_EOL;

// Tömb tartalmának fájlba írása
$arr = array();
$s = array();
$s["name"] = "Péter";
$s["kor"] = 12;
$arr[] = $s;
$s1 = array();
$s1["name"] = "Anna";
$s1["kor"] = 11;
$arr[] = $s1;

file_put_contents($path.DIRECTORY_SEPARATOR."tomb.json", json_encode($arr));

// Fájl írása
// ha többször akarunk írni a fájlba, akkor célszerű először kinyitni, írni bele, majd bezárni, amikor már befejeztük

// fájl megnyitása: megadjuk a megnyitni kívánt fájl nevét és hogy milyen céllal teszük: pl írni szeretnénk bele
// modes - a:append a+:append,read w:write w+:write,read r:read r+:read,write
$fResource = fopen($path.DIRECTORY_SEPARATOR."file.txt", 'w');
// fájlba írás
fwrite($fResource, "Lorem ip sum dolor sit amet".PHP_EOL); //PHP_EndOfLine - sortörés
fwrite($fResource, "Lorem ip sum dolor sit amet".PHP_EOL); // \n is sortörés, csak Linux-on nem uaúgy működik
fwrite($fResource, "Lorem ip sum dolor sit amet".PHP_EOL); //PHP_EOL: környezetspecifikus, mindig lefut
// amit kinyitunk, azt itt be is kell zárni, kül. hibába futunk
fclose($fResource);

echo PHP_EOL;

$fR = fopen($path.DIRECTORY_SEPARATOR.'read.txt', 'r');
// ciklus beolvas 1 sort, beletölti  line változóba, addig amíg nem üres a következő sor
while(($line = fgets($fR)) !== false){ // fgets() - file get string
    // 1 sor feldolgozása
    echo $line;
}
fclose($fR);

// Fájl törlése
unlink($path.DIRECTORY_SEPARATOR.'d.html');
