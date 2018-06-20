<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
	protected $fillable = ['status'];

    public function approved(){
        $this->updateCustomIDAndSatus();
    }
  
    public function generateCustomID(){
        return md5("$this->id $this->updated_at");
    }
    public function updateCustomIDAndSatus(){
        $this->status = "approved";
        $this->customid = $this->generateCustomID();
        $this->save();
    }
    public function inShoppingCarts(){
        return $this->hashMany('App\InShoppingCart');
    }
    public function products(){
        return $this->belongsToMany('App\product','in_shopping_carts');
    }
    public function order(){
        return $this->hasOne("App\Order")->first();
    }
	public function productsSize(){
		return $this->products()->count();
	}
    public function total(){
        // dd($this->id);
        // dd($shopping_cart->id);
        $total2=DB::select("SELECT SUM(pricing*cantidad) as mult FROM in_shopping_carts,products,shopping_carts WHERE in_shopping_carts.product_id=products.id and in_shopping_carts.shopping_cart_id={$this->id} and shopping_carts.id=in_shopping_carts.shopping_cart_id");
        // dd($total2[0]->mult);
        return  $total2[0]->mult;
        // return $this->products()->sum('pricing');

    }
    public function totalUSD(){
        return $this->products()->sum('pricing');
    }
    public static function findOrCreateBySessionID($shopping_cart_id){
    	if($shopping_cart_id){
    		return ShoppingCart::findBySession($shopping_cart_id);
    	}else{
    		return ShoppingCart::createWithoutSession();
    	}
    }
    public static function findBySession($shopping_cart_id){
    	return ShoppingCart::find($shopping_cart_id);
    }
    public static function createWithoutSession(){
    	return ShoppingCart::create(["status" => "incompleted"]);
    }
}
