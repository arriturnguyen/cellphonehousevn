<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use App\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = [
            'countOrders' => Order::count(),
            'countUsers' => User::count(),
            'countProducts' => Product::count(),
        ];
        $fromWeek = \Carbon\Carbon::today()->subWeek()->startOfWeek();
        $toWeek = \Carbon\Carbon::today()->subWeek()->endOfWeek();
        $fromMonth = \Carbon\Carbon::today()->subMonth()->startOfMonth();
        $toMonth = \Carbon\Carbon::today()->subMonth()->endOfMonth();
        $fromYear = \Carbon\Carbon::today()->subYear()->startOfYear();
        $toYear = \Carbon\Carbon::today()->subYear()->endOfYear();
        $orders = [
            'today' => Order::whereDate('created_at', Carbon::today())->count(),
            'yesterday' => Order::whereDate('created_at', Carbon::yesterday())->count(),
            'lastweek' => Order::whereBetween('created_at', [$fromWeek, $toWeek])->count(),
            'lastmonth' => Order::whereBetween('created_at', [$fromMonth, $toMonth])->count(),
            'lastyear' => Order::whereBetween('created_at', [$fromYear, $toYear])->count(),
            'all' => Order::count(),
        ];
        $countStatus = Order::processStatus()->get();
        return view('admin.pages.index', compact('count', 'orders', 'countStatus'));
    }
}