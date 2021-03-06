<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Warehouse;
use App\Product;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        $products = Product::all();
        return view("warehouses.index",["warehouses" => $warehouses,"products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouse = new Warehouse;
        $product = Product::all();
        return view("warehouses.create",["warehouse" => $warehouse, "product" => $product]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $warehouse = new Warehouse;
        $warehouse->id_warehouse = null;
        // $warehouse->id_warehouse = Auth::user()->id;
        $warehouse->id_product = $request->id_product;
        $warehouse->size = $request->size;       
        $warehouse->countw = $request->countw;
        $warehouse->color = $request->color;
        $warehouse->save();
          return redirect("/warehouses/");

    }
    public function select_product()
    {
      
        $products = Product::all();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $product = Product::find($id);
    //     return view('products.show',['product' => $product]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $product = Product::find($id);
    //     return view("products.edit",["product" => $product]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     // $product->id = null;
    //     // $product->user_id = Auth::user()->id;
    //     $product->title = $request->title;
    //     $product->description = $request->description;       
    //     $product->pricing = $request->pricing;

    //     if($product->save()){
    //         return redirect("/products");
    //         // return view("products.create");
    //     }else{
    //         return view("products.edit",["product" => $product]);
    //         // return redirect("/products");
    //     } 
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     Product::destroy($id);

    //     return redirect('/warehouse');
    // }
}