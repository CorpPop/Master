<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Warehouse;
use App\Tiket;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware("auth",["except" => "show"]);
    }
   
    public function index(Request $request )
    {
        // $product_order = 
        $products = Product::latest()->simplePaginate(10);
        $warehous = DB::select("SELECT products.title,products.description,products.pricing,products.extension,products.extension2,products.extension3,products.extension4,warehouses.size,warehouses.countw,warehouses.color FROM warehouses,products WHERE products.id=warehouses.id_warehouse");
        
        // dd($warehous);

    return view("products.index",["products" => $products, "warehous" =>$warehous]);

       
    }

    public function metodo_prueba($id)
    {
        echo $id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $warehouse = Warehouse::all();
        $warehous = Warehouse::where("id_warehouse","=","title")->from("products");
        $product_order = new Warehouse;
        // dd($warehouse);
        return view("products.create",["product" => $product, "warehouse" =>$warehouse,'warehous' => $warehous, "product_order" => $product_order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        $hasFile2 = $request->hasFile('cover2') && $request->cover2->isValid();
        $hasFile3 = $request->hasFile('cover3') && $request->cover3->isValid();
        $hasFile4 = $request->hasFile('cover4') && $request->cover4->isValid();
        $product = new Product;
        $product->id = null;
        $product->user_id = Auth::user()->id;
        $product->title = $request->title;
        $product->description = $request->description;       
        $product->pricing = $request->pricing;
        $extension2 = $request->cover2->extension();
        $product->extension2 = $extension2;
        $extension3 = $request->cover3->extension();
        $product->extension3 = $extension3;
        $extension4 = $request->cover4->extension();
        $product->extension4 = $extension4;

        if ($hasFile) {
            $extension = $request->cover->extension();
            $product->extension = $extension;
        }
        if($product->save()){
            if($hasFile){
                $request->cover->storeAs('images',"$product->id.$extension");
                $request->cover2->storeAs('images',"$product->id.a.$extension");
                $request->cover3->storeAs('images',"$product->id.b.$extension");
                $request->cover4->storeAs('images',"$product->id.c.$extension");
            }
            return redirect("/catalogo");
            // return view("products.create");
        }else{
            return view("products.create",["product" => $product]);
            // return redirect("/products");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiket = new Tiket();
        $product = Product::find($id);
        $product1 = DB::select("SELECT * FROM products WHERE products.id=$id");
        $warehouse = Warehouse::where("id_product","=",$id)->get();
        $warehouse1 = Warehouse::where("id_product","=",$id)->get();
        // dd($warehouse);
        // $warehous = Warehouse::select("SELECT Procts_warehouse FROM warehouses,products WHERE id_warehouse = products.title");
  
        $warehous  = DB::select("SELECT products.title,products.description,products.pricing,products.extension,products.extension2,products.extension3,products.extension4,warehouses.size,warehouses.countw,warehouses.color FROM warehouses,products WHERE warehouses.id_product=$id");
        $cant = DB::select("select sum(countw) as total from products, warehouses where products.id=warehouses.id_product and products.id=$id");
        // dd($product1);

        return view('products.show',['product' => $product,'product1' => $product1,'warehouse' => $warehouse,'warehous' => $warehous,"tiket" => $tiket,'warehouse1'=>$warehouse1]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = Warehouse::all();
        $product = Product::find($id);
        return view("products.edit",["product" => $product,"warehouse" => $warehouse]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        // $product->id = null;
        // $product->user_id = Auth::user()->id;
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        $hasFile2 = $request->hasFile('cover2') && $request->cover2->isValid();
        $hasFile3 = $request->hasFile('cover3') && $request->cover3->isValid();
        $hasFile4 = $request->hasFile('cover4') && $request->cover4->isValid();
        $product->title = $request->title;
        $product->description = $request->description;       
        $product->pricing = $request->pricing;
        $extension2 = $request->cover2->extension();
        $product->extension2 = $extension2;
        $extension3 = $request->cover3->extension();
        $product->extension3 = $extension3;
        $extension4 = $request->cover4->extension();
        $product->extension4 = $extension4;
        if ($hasFile) {
            $extension = $request->cover->extension();
            $product->extension = $extension;
        }

        if($product->save()){
            
            if($hasFile){
                $request->cover->storeAs('images',"$product->id.$extension");
                $request->cover2->storeAs('images',"$product->id.a.$extension");
                $request->cover3->storeAs('images',"$product->id.b.$extension");
                $request->cover4->storeAs('images',"$product->id.c.$extension");
                return redirect("/products");
            }
            // return view("products.create");
        }else{
            return view("products.edit",["product" => $product]);
            // return redirect("/products");
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
     ?>   <script>
        var reply=confirm("¿Seguro que desea eliminar el producto?")
        if (reply==true) 
        {
            <?php Product::destroy($id);

              return redirect('/products'); ?>
        }
        else 
        {
        
        }
        </script>
        
<?php
    }
}
