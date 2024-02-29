<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function cart()
    {
        return view('cart');
    }
    
    public function session(Request $request)
    {
        $productItems=[];
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {
            $productname = $details['name'];
            $total = $details['price'];
            $quantity = $details['quantity'];
            $two0 = "00";
            $unit_amount = "$total$two0";
            //echo $productname;
            $productItems[]=[
                'price_data' => [
                    
                    'product_data' => [
                        "name" => $productname,
                    ],
                    'currency' => 'MAD',
                    'unit_amount'=>$unit_amount,
                ],
                'quantity'=>$quantity
            ];
        }
       $chekcoutSession= \Stripe\Checkout\Session::create([
        'line_items'=>[$productItems],
        'mode'=>'payment',
        'allow_promotion_codes'=>true,
        'metadata'=>[
            'user_id'=>"0001"
        ],
        'customer_email' => 'email@example.com',
        'success_url' => route('success'),
        'cancel_url' =>route('cancel'),
    ]);
    return redirect()->away($chekcoutSession->url);
    }   
    public function success(){
        return view('success');
    }
    public function cancel(){
        return view('cancel');
    }
}
