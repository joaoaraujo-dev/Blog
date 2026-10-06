<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            "n_users" => User::count(),
            "n_posts" => Post::count(),
            "n_comments" => Comment::count(),
        ];

        $userData = User::select([
            DB::raw("MONTH(created_at) as month"),
            DB::raw("COUNT(*) as total"),
        ])
        ->groupBy(DB::raw("MONTH(created_at)")) 
        ->orderBy("month", "asc")
        ->get();

        $nameMonths = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        ];

        foreach ($userData as $data) {
            $month[] = $nameMonths[$data->month];
            $total[] = $data->total;
        }

        $c_total = implode(",", $total);

        return view("admin.dashboard", compact("stats", "month", "c_total"));
    }
}
