<?php

namespace App\Repositories\Interfaces;

interface ColorInterface
{
    public function getAllColors();
    public function createColor(array $data);
    public function deleteColor($id);
}
