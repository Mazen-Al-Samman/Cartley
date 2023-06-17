<?php

namespace App\classes;

class BinaryTree
{
    /**
     * @param string $textTree
     * @return bool
     * This function will validate the binary tree
     * Time Complexity => O(n) // n is the number of pairs.
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

            $arrayTree[$treeKey][] = array_pop($arrayPair);
            if (count($arrayTree[$treeKey]) > 2) return false;
        }

        return true;
    }

    /**
     * @param string $textTree
     * @return string
     */
    public static function getFormattedTree(string $textTree): string
    {
        $treeString = '[';
        $arrayPairs = explode('-', $textTree);

        foreach ($arrayPairs as $textPair) {
            $arrayPair = explode(',', $textPair);
            $treeString .= "(" . implode(', ', $arrayPair) . "), ";
        }

        $treeString = trim($treeString, ', ');
        $treeString .= "]";
        return $treeString;
    }
}