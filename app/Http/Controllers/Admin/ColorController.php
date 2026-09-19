<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Repositories\Interfaces\ColorInterface;

class ColorController extends Controller
{
    public function __construct(private ColorInterface $colorRepo){}

    public function index()
    {
        $colors = $this->colorRepo->getAllColors();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorRequest $request)
    {
        return $this->colorRepo->createColor($request->validated());
    }
    
    public function destroy(string $id)
    {
        return $this->colorRepo->deleteColor($id);
    }
}
