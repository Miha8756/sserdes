<?php
namespace App\Http\Controllers;

use App\Models\GoodDeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodDeedController extends Controller
{
    public function index()
    {
        $goodDeeds = GoodDeed::where('user_id', auth()->id())->get();
        return view('lk', compact('goodDeeds'));
    }

    public function create()
    {
        return view('good_deeds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $path = $request->file('image')->store('good_deeds', 'public');

        GoodDeed::create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'date_time' => $request->date_time,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('good_deeds.index');
    }

    public function edit(GoodDeed $goodDeed)
    {
        return view('good_deeds.edit', compact('goodDeed'));
    }

    public function update(Request $request, GoodDeed $goodDeed)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'date_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('good_deeds', 'public');
            Storage::disk('public')->delete($goodDeed->image);
            $goodDeed->image = $path;
        }

        $goodDeed->update([
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'date_time' => $request->date_time,
        ]);

        return redirect()->route('good_deeds.index');
    }

    public function destroy(GoodDeed $goodDeed)
    {
        Storage::disk('public')->delete($goodDeed->image);
        $goodDeed->delete();

        return redirect()->route('good_deeds.index');
    }

    public function show($id)
    {
        $goodDeed = GoodDeed::findOrFail($id);
        return view('good_deeds.show', compact('goodDeed'));
    }



}
