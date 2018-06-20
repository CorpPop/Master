<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\InShoppingCart;

class InShoppingCartsController extends Controller
{
    public function __construct(){
        $this->middleware("shoppingcart");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $shopping_cart = $request->shopping_cart;
        // dd($shopping_cart);
        // $shopping_cart_id = \Session::get('shopping_cart_id');
        // $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        $response = InShoppingCart::create(['shopping_cart_id' => $shopping_cart->id,
        'product_id' => $request->product_id,'talla' => $request->talla, 'cantidad' => $request->cantidad,'color' => $request->color]);
        // dd($response);
        if($response){
            return redirect('/carrito');
        }else{
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
