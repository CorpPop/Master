<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoppingCart;
use App\PayPal;
use App\Tiket;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderCreated;
// use App\Product;

class ShoppingCartsController extends Controller
{
    protected $mailer;
    public function __construct(Mailer $mailer){
        $this->middleware("auth");
        $this->middleware("shoppingcart");
        $this->mailer = $mailer;
    }
    public function index(Request $request){
        // $user = Auth::user()->email;  /// COrreo
        // $message = sprintf('<a href="">Hola soy Goku</a>');
        // $this->mailer->raw($message, function(Message $m) use ($user){
        //     $m->from('no-repli@tesvb.gob.mx','AmericanBoats@gmail.com');
        //     $m->to($user)->subject('Gracias por comprar en American Boats Valle de Bravo');
        // });
        // dd($request);
        // Mail::to($user)->send(new OrderCreated()); ///Correo
        // $data = array(
        //   'email' => "iscprimerocesar@gmail.com",
        //   'subject' => "Correo de prueba",
        //   'mailbody' => "Prueba correo"
        // );

        // Mail::send('mailers.order', $data, function($message) use ($data) {
        //   $message->from($data['email']);
        //   $message->to('username@gmail.com');
        //   $message->subject($data['subject']);
        // });
        $shopping_cart = $request->shopping_cart;
        // dd($shopping_cart->id);
    	// $shopping_cart_id = \Session::get('shopping_cart_id');
     //    $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        // $paypal = new PayPal($shopping_cart);
        // $payment = $paypal->generate();
       // dd($shopping_cart);

        // return redirect($payment->getApprovalLink());

        // $products = $shopping_cart->products()->get();
        $products =DB::select("SELECT * FROM `in_shopping_carts`,products,shopping_carts,warehouses WHERE products.id=in_shopping_carts.product_id and shopping_carts.id=in_shopping_carts.shopping_cart_id and in_shopping_carts.talla=warehouses.id_warehouse and shopping_carts.id={$shopping_cart->id}");
   
        // dd($shopping_cart);
    
        
        $total = $shopping_cart->total();
        // dd($total);
   
        $nuevo=DB::select("SELECT * FROM products limit 1,3 ");
        $warehouse= DB::select("SELECT * FROM warehouses,products WHERE products.id=warehouses.id_warehouse");
        return view('shopping_carts.index',['products' => $products,'total' => $total,'warehouse' => $warehouse,'nuevo'=>$nuevo]);
    }
    public function checkout(Request $request){
        // $tiket = new Tiket();
        // $tiket->id = null;
        // $tiket->id_user = Auth::user()->id;
        // $tiket->cantidad = $request->cantidad;
        // $tiket->descripcion = $request->descripcion;
        // $tiket->talla = $request->talla;
        // dd($tiket);
        //  $user = Auth::user()->email;
        // dd($request);
        // Mail::to($user)->send(new OrderCreated());
        // $tiket->save();
        $shopping_cart = $request->shopping_cart;
        // dd($shopping_cart);
        $paypal = new PayPal($shopping_cart);
        // dd($paypal);
        $payment = $paypal->generate();
       // dd($payment);

        return redirect($payment->getApprovalLink());
    
    }
     public function checktiket(Request $request){
        $tiket = new Tiket();
        $tiket->id = null;
        $tiket->id_user = Auth::user()->id;
        $tiket->cantidad = $request->cantidad;
        $tiket->descripcion = $request->descripcion;
        $tiket->talla = $request->talla;
        // dd($tiket);
       $tiket->save();
        $shopping_cart = $request->shopping_cart;
        $products = $shopping_cart->products()->get();
        // dd($products);
        $total = $shopping_cart->total();
        // dd($shopping_cart);
        $nuevo=DB::select("SELECT * FROM products limit 1,3 ");
        $warehouse= DB::select("SELECT * FROM warehouses,products WHERE products.id=warehouses.id_warehouse");
         return view("shopping_carts.index",["tiket" =>$tiket,"products" => $products, "total" => $total,'warehouse' => $warehouse,'nuevo'=>$nuevo]);
        
        // dd($tiket);
    }
    public function show($id){
        $shopping_cart = ShoppingCart::where('customid',$id)->first();

        $order = $shopping_cart->order();

        return view("shopping_carts.completed",["shopping_cart" => $shopping_cart, "order" =>$order]);
    }
     public function destroy($id)
    {
            ShoppingCart::destroy($id);

            return redirect('/puta'); 

    }
}
