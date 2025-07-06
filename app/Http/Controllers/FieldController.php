<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Category;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::with('images')->get();
        $categories = Category::all();
        return view('home', compact('fields', 'categories'));
    }

    public function show($id)
    {
        $field = Field::with('images')->findOrFail($id);
        return view('detail', compact('field'));
    }
}