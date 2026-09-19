<?php

namespace App\Repositories\Services;

use App\Models\Color;
use App\Repositories\Interfaces\ColorInterface;

class ColorService implements ColorInterface
{
    public function getAllColors()
    {
        return Color::all();
    }

    public function createColor(array $data)
    {
        Color::create($data);
        return redirect()->route('admin.colors.index')->with('success', 'Color created successfully.');
    }

    public function deleteColor($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->route('admin.colors.index')->with('success', 'Color deleted successfully.');
    }
}
