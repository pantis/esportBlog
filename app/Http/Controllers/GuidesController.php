<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuidesController extends Controller
{
    public function index()
    {
        $guides = Guide::orderBy('id', 'DESC')->get();

        return view('guides.index', [
            'guides' => $guides
        ]);
    }
}
