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
 * @param string $textTree
 * @return bool
 */
public static function checkBinaryTree(string $textTree): bool
{
    $arrayTree = [];
    $arrayPairs = explode('-', $textTree);
    foreach ($arrayPairs as $textPair) {
        $arrayPair = explode(',', $textPair);
        if (count($arrayPair) !== 2) {
            throw new \Error("Error: Pair should contains only 2 items");
        }
        $treeKey = array_pop($arrayPair);
        if (empty($arrayTree[$treeKey])) {
            $arrayTree[$treeKey] = [array_pop($arrayPair)];
            continue;
        }
            </pre>
        </div>
    </div>
<?= $this->endSection() ?>
