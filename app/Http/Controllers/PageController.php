<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\GoodDeed;

class PageController extends Controller
{
    public function index()
    {
        $goodDeeds = GoodDeed::all();
        $news = Portfolio::all();

        return view('home.index', compact('goodDeeds', 'news'));
    }

    public function lk() {
        $goodDeeds = GoodDeed::where('user_id', auth()->id())->get();
        return view('lk.index', compact('goodDeeds'));
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
