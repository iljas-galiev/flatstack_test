<?php

class App
{
    public function test($start, $n)
    {
        $number = []; // стартовое число в длинной арифметике
        $k = 0;
        while ($start >= 1) {
            $number[$k++] = $start % 10;
            $start /= 10;
        }
        echo implode('', $number) . "<br>";

        for ($i = 0; $i < $n; $i++) {
            $newNumber = [];
            $k = 0;
            $prev = $number[0];
            $count = 0;
            $length = count($number);
            /*
             * Считываем цифры с начала, при несовпадении текущей цифры и предыдущей,
             * приписываем к новому числу количество идущих подряд цифр и саму цифру,
             * иначе увеличиваем количество идущих подряд цифр
             */
            for ($j = 0; $j < $length; $j++) {
                if ($number[$j] != $prev) {
                    $newNumber[$k++] = $count;
                    $newNumber[$k++] = $prev;
                    $prev = $number[$j];
                    $count = 1;
                } else $count++;
            }
            $newNumber[$k++] = $count; // приписывание данных для последней цифры
            $newNumber[$k] = $prev;

            $number = $newNumber;
            echo implode('', $number) . "<br>";
        }
    }
}

$start = $_GET['start'] ?? 1;
$n = $_GET['n'] ?? 10;
(new App())->test($start, $n);
