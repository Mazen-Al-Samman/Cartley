<?php

namespace App\Controllers;

use App\classes\BinaryTree;
use App\classes\Factorial;

class Cartley extends BaseController
{
    /**
     * @param int $number
     * @return string
     */
    public function factorial(int $number): string
    {
        return view('cartley/factorial_view', [
            'number' => $number,
            'title' => 'Factorial',
            'factorial' => Factorial::calculateFactorial($number),
        ]);
    }

    /**
     * @param string $textTree
     * @return string
     */
    public function binaryTree(string $textTree): string
    {
        return view('cartley/tree_view', [
            'tree' => $textTree,
            'title' => 'Binary Tree',
            'binaryStatus' => BinaryTree::checkBinaryTree($textTree),
            'formattedTree' => BinaryTree::getFormattedTree($textTree),
        ]);
    }
}