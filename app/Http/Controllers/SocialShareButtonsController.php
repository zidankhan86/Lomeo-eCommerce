<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget($productId)
    {

        $product = Product::find($productId);
        $routeName = 'details';
        $url = route($routeName, ['id' => $productId]);
        $shareComponent = \Share::page(
            $url,
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

        return view('frontend\pages\socialShare', compact('shareComponent','product'));
    }
}
