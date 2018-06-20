<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nuevo=DB::select("SELECT * FROM products limit 1,3 ");
        // return view('mailers.order',['nuevo'=>$nuevo]);
        return $this->from("AmericanBoats@online.com")
                    ->subject("Hola ".Auth::user()->name." Gracias por comprar")
                    ->view('mailers.order',['nuevo' => $nuevo]);
    }
}
