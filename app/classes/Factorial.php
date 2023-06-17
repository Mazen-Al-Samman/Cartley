<?php

namespace App\classes;

class Factorial
{
    /**
     * @param int $number
     * @return int
     * This function will calculate the factorial based on input Number.
     * Time Complexity => O(n) // n is the input number.
     */
    public static function calculateFactorial(int $number): int
    {
        $factorial = 1;
        while ($number > 1) {
            $factorial *= $number;
            $number--;

            if ($factorial > PHP_INT_MAX) {
                throw new \Error("Error: The number exceeds the maximum integer value.");
            }
        }

        return $factorial;
    }
}