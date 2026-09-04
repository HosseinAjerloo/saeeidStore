<?php

namespace App\Http\Controllers\Panel\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\HasCart;
class CartController extends Controller
{
    use HasCart;
    public function index(){

//        return view('panel.cart.index');
    }
}
