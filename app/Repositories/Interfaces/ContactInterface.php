<?php

namespace App\Repositories\Interfaces;

interface ContactInterface
{
    public function sendContactMessage(array $data);
}
