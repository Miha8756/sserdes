<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('user_id', Auth::id())->get();
        return view('achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id(); // Добавляем user_id

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $input['image'] = $imagePath;
        }

        Achievement::create($input);

        return redirect()->route('achievements.index')->with('success', 'Achievement created successfully.');
    }

    public function show($id)
{
    $achievement = Achievement::findOrFail($id);
    return view('achievements.show', compact('achievement'));
}




    public function edit(Achievement $achievement)
    {
        // Убедимся, что пользователь имеет доступ к этому достижению
        // $this->authorize('update', $achievement);

        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        // Убедимся, что пользователь имеет доступ к этому достижению
        // $this->authorize('update', $achievement);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $input['image'] = $imagePath;
        }

        $achievement->update($input);

        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        // Убедимся, что пользователь имеет доступ к этому достижению
        $this->authorize('delete', $achievement);

        $achievement->delete();

        return redirect()->route('achievements.index')->with('success', 'Achievement deleted successfully.');
    }

}
