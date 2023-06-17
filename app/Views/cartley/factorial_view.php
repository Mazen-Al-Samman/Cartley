<?php
/**
 * @var string $title
 * @var integer $number
 * @var integer $factorial
 */
?>

<?= $this->extend('cartley/layouts/main.php') ?>

<?= $this->section('content') ?>
    <div>
        <div class="result text-center">
            Factorial of <?= $number ?> is <span><?= $factorial ?></span>
        </div>

        <h1 class="text-center">Factorial Calculator</h1>
        <p class="text-center">Code used to calculate the Factorial</p>
        <div style="display: flex; justify-content: center">
            <pre>
<span style="opacity: 0.6"># App\classes\Factorial.php</span>

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
            </pre>
        </div>
    </div>
<?= $this->endSection() ?>
