<?php

namespace App\Interface;

interface CategoryInterface
{
    public function getCategoryName();
    public function saveMenu($data);
    public function showMenu($ID);
    public function updateMenu($data);
    public function deleteMenu($id);
}
