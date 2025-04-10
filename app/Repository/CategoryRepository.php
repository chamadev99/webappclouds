<?php

namespace App\Repository;

use App\Interface\CategoryInterface;
use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryInterface
{
    public function getCategoryName()
    {
        return MenuCategory::all();
    }

    public function saveMenu($data)
    {
        $menu = Menu::create([
            'api_id' => $data['api_id'],
            'name' => $data['name'],
            'category' => $data['category'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $data['image'],
            'qty' => $data['quantity'],
        ]);

        if ($menu) {
            return true;
        } else {
            return false;
        }
    }

    public function showMenu($id)
    {
        $menu = Menu::where('api_id', $id)->first();
        if ($menu) {
            return $menu;
        } else {
            return false;
        }
    }

    public function updateMenu($data)
    {

        $menu = Menu::where('api_id', $data['api_id'])->first();

        if ($menu) {
            $menu->update([
                'name' => $data['name'],
                'category' => $data['category'],
                'price' => $data['price'],
                'description' => $data['description'],
                'image' => $data['image'],
                'qty' => $data['quantity'],
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function deleteMenu($id)
    {
        $menu = Menu::where('api_id', $id)->first();
        if ($menu) {
            $menu->delete();
            return true;
        } else {
            return false;
        }
    }
}
