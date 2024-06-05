<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $portfolio = Portfolio::create([
            'name' => $request->name
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs("public/users/{$request->user()->id}/portfolios/{$portfolio->id}", $imageName);
            $imagePaths[] = "users/{$request->user()->id}/portfolios/{$portfolio->id}/" . $imageName;
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
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->update([
            'name' => $request->name,
        ]);

        $exist_images = $request->input('images');

        $imagePaths = [];

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs("public/users/{$request->user()->id}/portfolios/{$portfolio->id}", $imageName);
                $imagePaths[] = "users/{$request->user()->id}/portfolios/{$portfolio->id}/" . $imageName;
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
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Портфолио успешно удалено');
    }
}
