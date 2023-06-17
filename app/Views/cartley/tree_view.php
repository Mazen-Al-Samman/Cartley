<?php
/**
 * @var string $tree
 * @var string $title
 * @var string $formattedTree
 * @var boolean $binaryStatus
 */
?>

<?= $this->extend('cartley/layouts/main.php') ?>

<?= $this->section('content') ?>
<div>
    <div class="result text-center">
        Status of validating <?= $formattedTree ?> is <span><?= $binaryStatus ? 'True' : 'False' ?></span>
    </div>

    <h1 class="text-center">Binary Tree Checker</h1>
    <p class="text-center">Code used to check the Binary Tree</p>
    <div style="display: flex; justify-content: center">
            <pre>
<span style="opacity: 0.6"># App\classes\BinaryTree.php</span>

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
            throw new \Error("Error: Pair should contains of 2 items");
        }

        $treeKey = array_pop($arrayPair);
        if (empty($arrayTree[$treeKey])) {
            $arrayTree[$treeKey] = [array_pop($arrayPair)];
            continue;
        }

        $arrayTree[$treeKey][] = array_pop($arrayPair);
        if (count($arrayTree[$treeKey]) > 2) return false;
    }

    return true;
}
            </pre>
    </div>
</div>
<?= $this->endSection() ?>
