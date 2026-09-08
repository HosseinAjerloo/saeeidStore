<?php

namespace App\Http\Controllers\Panel\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Cart\CartRequest;
use App\Models\Cart;
use App\Service\Cart\CartService;
use Illuminate\Http\Request;
class CartController extends Controller
{
    protected ?Cart $clientCart=null;
    protected $message='';
    protected $statusCode=200;
    protected $status=true;
    public function index(){

        return view('panel.cart.index');
    }
    public function addCart(CartRequest $request,CartService $cartService){
        $cartService->cart();

        return response()->json(['success'=>true]);

    }
}
