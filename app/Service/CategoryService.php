<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryName()
    {
        return $this->categoryRepository->getCategoryName();
    }

    public function saveMenu($data)
    {
        return $this->categoryRepository->saveMenu($data);
    }

    public function showMenu($id)
    {
        return $this->categoryRepository->showMenu($id);
    }

    public function updateMenu($data)
    {
        return $this->categoryRepository->updateMenu($data);
    }

    public function deleteMenu($id)
    {
        return $this->categoryRepository->deleteMenu($id);
    }
}
