<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Request;
use App\ShoppingCart;
use App\Product;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
	public function home(){
		
	$nuevo=DB::select("SELECT * FROM products limit 0,3 ");
		     $caruselu=DB::select("SELECT * FROM products limit 0,6 ");
		     $caruseld=DB::select("SELECT * FROM products limit 0,6 ");
        return view('main.index',['nuevo' => $nuevo,'caruselu'=>$caruselu,'caruseld'=>$caruseld]);
	}
	
}
?>