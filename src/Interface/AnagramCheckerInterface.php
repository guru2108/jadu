<?php 
namespace App\Interface;

interface AnagramCheckerInterface{
    public function isAnagram($word, $comparison): bool;
}