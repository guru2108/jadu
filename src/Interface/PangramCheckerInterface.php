<?php 
namespace App\Interface;

interface PangramCheckerInterface{
    public function isPangram($phrase): bool;
}