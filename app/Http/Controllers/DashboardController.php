<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memberships;
use App\Models\Article;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for the dashboard
        $membershipCount = Memberships::count();
        $articleCount = Article::count();
        $commentCount = Comment::count();

        // Data for charts
        $membershipsByMonth = Memberships::selectRaw('YEAR(date_of_receipt) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('created_at')
            ->get();
            
        $articlesByMonth = Article::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $commentsByArticle = Comment::selectRaw('article_id, COUNT(*) as count')
            ->groupBy('article_id')
            ->orderByDesc('count')
            ->get();

        return view('dashboard', compact(
            'membershipCount',
            'articleCount',
            'commentCount',
            'membershipsByMonth',
            'articlesByMonth',
            'commentsByArticle'
        ));
    }
}
