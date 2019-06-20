<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function wishlist()
    {
    	return view('frontpage.wishlist.wishlist-frontpage');
    }
}
