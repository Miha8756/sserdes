<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.portfolio.index', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $portfolio = News::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs("public/users/{$request->user()->id}/news/{$portfolio->id}", $imageName);
            $imagePaths[] = "users/{$request->user()->id}/news/{$portfolio->id}/" . $imageName;
        }

        $portfolio->update([
            'images' => json_encode($imagePaths)
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Портфолио успешно создано.');
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function update(Request $request, $id)
    {
        $portfolio = News::findOrFail($id);

        $portfolio->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $exist_images = $request->input('images');

        $imagePaths = [];

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs("public/users/{$request->user()->id}/news/{$portfolio->id}", $imageName);
                $imagePaths[] = "users/{$request->user()->id}/news/{$portfolio->id}/" . $imageName;
            }
        }

        if ($exist_images == null) {
            $exist_images = [];
        }

        $xxx = array_merge(
            $exist_images,
            $imagePaths
        );

        $portfolio->update([
            'images' => json_encode($xxx)
        ]);

        return redirect()->route('portfolio.edit', $portfolio->id)->with('success', 'Портфолио успешно обновлено.');
    }

    public function edit($id)
    {
        $portfolio = News::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function destroy($id)
    {
        $portfolio = News::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Портфолио успешно удалено');
    }
}
