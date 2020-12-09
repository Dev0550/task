<?php

$filename = isset($argv[1])?$argv[1]:exit("Укажите имя файла\n");

$operation = isset($argv[2])?$argv[2]: exit("Укажите операция\n");

$file = @fopen($filename, "r");

$ofile_p = fopen($filename . '-p', 'w');
$ofile_n = fopen($filename . '-n', 'w');


if ($file) {
    while (($line = fscanf($file, '%f %f' ) ) !== false) {
        list($val1 , $val2) = $line;
        switch ( $operation ) {
            case '+' : $res = $val1 + $val2; break;
            case '-' : $res = $val1 - $val2; break;
            case '*' : $res = $val1 * $val2; break;
            case '/' : $res = $val1 / $val2; break;
        }
        echo $res . "\n";
        if ($res >= 0) {
            fputs($ofile_p, $res . PHP_EOL);
        } else {
            fputs($ofile_n, $res . PHP_EOL);
        }
    }
} else {
    exit("Невозможно прочитать файл\n");
}
?>



