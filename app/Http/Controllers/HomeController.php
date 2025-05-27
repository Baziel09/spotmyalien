<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $reports = Report::orderBy('date', 'desc')->take(3)->get();
    return view('welcome', compact('reports'));
}
}
