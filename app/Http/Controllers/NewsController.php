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

        $news = News::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs("public/users/{$request->user()->id}/news/{$news->id}", $imageName);
            $imagePaths[] = "users/{$request->user()->id}/news/{$news->id}/" . $imageName;
        }

        $news->update([
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
        $news = News::findOrFail($id);

        $news->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $exist_images = $request->input('images');

        $imagePaths = [];

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs("public/users/{$request->user()->id}/news/{$news->id}", $imageName);
                $imagePaths[] = "users/{$request->user()->id}/news/{$news->id}/" . $imageName;
            }
        }

        if ($exist_images == null) {
            $exist_images = [];
        }

        $xxx = array_merge(
            $exist_images,
            $imagePaths
        );

        $news->update([
            'images' => json_encode($xxx)
        ]);

        return redirect()->route('portfolio.edit', $news->id)->with('success', 'Портфолио успешно обновлено.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.portfolio.edit', compact('news'));
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return redirect()->route('portfolio.index')->with('success', 'Портфолио успешно удалено');
    }
}
