<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Service\ApiService;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');

        try {
            $repository = new CategoryRepository();
            $categoryService = new CategoryService($repository);
            $categories = $categoryService->getCategoryName();

            $items = $this->apiService->filter($category);
            //dd($items);
        } catch (\Exception $e) {
            Log::error("API Filter Error: " . $e->getMessage());
            Session::flash('error', 'Something went wrong ..' . $e->getMessage());

            $items = [];
            $categories = [];
        }

        return view('link', [
            'items' => $items,
            'data' => $categories
        ]);
    }
}
