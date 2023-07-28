<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationValidation;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function payment()
    {
        return view('pages.payment');
    }

    public function catalog()
    {
        $products = DB::table('products')
            ->orderBy('price', 'DESC')
            ->get();
        return view('pages.catalog', ['products' => $products]);
    }

    public function thanks()
    {
        return view('pages.thanks');
    }
}
