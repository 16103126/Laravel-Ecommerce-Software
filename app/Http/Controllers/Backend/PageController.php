<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use Image;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('backend.pages.index');
    }


}
