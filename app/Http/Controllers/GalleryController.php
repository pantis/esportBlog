<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'DESC')->get();

        return view('gallery.index', [
            'gallery' => $gallery
        ]);
    }
}
