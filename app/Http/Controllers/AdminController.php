<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function slider_index()
    {
        $slides = Slide::all();
        return view('admin.sliders.index', compact('slides'));
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.sliders.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $slide->update([
                'images' => $request->file('image')->store('slides', 'public'),
            ]);
        }

        return redirect()->route('sliders.index')->with('success', 'Слайд успешно обновлен.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            Slide::create([
                'images' => $image->store('slides', 'public'),
            ]);
        }

        return redirect()->route('sliders.index')->with('success', 'Слайды успешно добавлены.');
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect()->route('sliders.index')->with('success', 'Слайд успешно удален.');
    }

}
