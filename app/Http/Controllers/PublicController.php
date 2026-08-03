<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.nisn-search');
    }

    public function searchNisn(Request $request)
    {
        $nisn = $request->query('nisn');
        return view('public.nisn-search', compact('nisn'));
    }
}