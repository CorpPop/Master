<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
 	protected $primaryKey = 'id';
 	protected $fillable =['user_id','title','titulo','description','pricing','update_at','created_at','extension','extension2','extension3','extension4'];
 	public function scopeLastest($query){
 		return $query->orderBy("id","desc");
 	}
    public function paypalItem(){
    	return \PaypalPayment::item()->setName($this->title)
    						->setDescription($this->description)
    						->setCurrency('USD')
    						->setQuantity(1)
    						->setPrice($this->pricing);
    }
}
