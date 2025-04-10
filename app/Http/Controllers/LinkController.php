<?php

namespace App\Http\Controllers;

use App\Http\Requests\SyncMenu;
use App\Http\Requests\UpdateMenu;
use App\Service\ApiService;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data = $this->categoryService->getCategoryName();
        return view('link', ['items' => [], 'data' => $data]);
    }

    public function sync($id)
    {
        $apiService = new ApiService();
        $response = $apiService->getItem($id);
        // $response = [
        //     'id' => 2,
        //     'name' => 'Pizza',
        //     'description' => 'Delicious cheese pizza',
        //     'price' => 9.99,
        //     'quantity' => 10,
        //     'category_id' => 1,
        //     'image' => 'https://example.com/pizza.jpg',
        // ];
        $data = $this->categoryService->getCategoryName();
        return view('sync', ['items' => $response, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(SyncMenu $request)
    {

        $data = $this->categoryService->saveMenu($request);
        if ($data) {
            return redirect()->route('link')->with('success', 'Data saved successfully');
        } else {
            return redirect()->route('link')->with('error', 'Data not saved');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->categoryService->showMenu($id);
        return view('menuView', ['menu' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->categoryService->showMenu($id);
        return view('menuEdit', ['menu' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenu $request)
    {

        $data = $this->categoryService->updateMenu($request);
        if ($data) {
            return redirect()
                ->back()
                ->withInput()
                ->with('success', 'Data updated successfully');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Data not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->categoryService->deleteMenu($id);
        if ($data) {
            return redirect()
                ->back()
                ->withInput()
                ->with('success', 'Data deleted successfully');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Data not deleted');
        }
    }
}
