<?php

namespace App\Interface;

interface ApiInterface
{
    public function filter($category);
    public function getItem($id);
}
