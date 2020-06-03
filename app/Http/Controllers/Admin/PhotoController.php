<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();
        $path = Storage::disk('public')->put('images', $data['path']);
        dd($path);
    }
}
