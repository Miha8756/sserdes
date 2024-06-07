<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Portfolio;
use App\Models\GoodDeed;
use App\Models\Achievement;

class PageController extends Controller
{
    public function index()
    {
        // Извлечение последних 5 записей для каждой категории
       $goodDeeds = GoodDeed::latest()->take(5)->get();
       $news = Portfolio::latest()->take(5)->get();
       $achievements = Achievement::latest()->take(5)->get();

       return view('home.index', compact('goodDeeds', 'news', 'achievements'));
    }

    public function lk() {

        $goodDeeds = GoodDeed::where('user_id', auth()->id())->get();
        $achievements = Achievement::where('user_id', auth()->id())->get();

        return view('lk.index', compact('goodDeeds', 'achievements'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.index', compact('portfolios'));
    }


    public function portfolio_show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.show', compact('portfolio'));
    }
}
