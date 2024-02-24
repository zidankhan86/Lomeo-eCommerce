<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderReceivedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SslCommerzPaymentController extends Controller
{
    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function CheckPayment(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',

        ]);

        if ($request->paymenttype == 1) {
            $randomTransactionId = mt_rand(100000, 999999);

            //dd($request->all());
            $order = new Order([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'total' => $request->input('total'),
                'transaction_id' => $randomTransactionId,
                'amount' => $request->input('price'),
                'paymenttype' => $request->input('paymenttype'),
                'currency' => 'BDT',
                'product_id' => $request->input('product_id'),
                'user_id' => auth()->id(), // Assuming you have user authentication
            ]);

            // Save the order to the database
            $order->save();
            $orderId = $order->id;
            $userId = auth()->user()->id;
            $cartItems = \Cart::session($userId)->getContent();
            // dd($cartItems);
            // dd($orderId);
            foreach ($cartItems as $item) {
                $orderItem = new OrderItems();
                $orderItem->user_id = $userId;

                $orderItem->order_id = $orderId;
                $orderItem->product_id = $item->id;
                $orderItem->quantity = $item->quantity;
                $orderItem->unit_price = $item->price;

                $orderItem->save();
            }

            $order = Order::find($orderId);

            $admins = User::where('role', 'admin')->get();

            foreach ($admins as $admin) {
                // Make sure your Admin model uses the Notifiable trait
                $admin->notify(new OrderReceivedNotification($order));
            }
            \Cart::session($userId)->clear();

            return redirect('/')->with('success', 'Order has been successfully completed');

        } else {
            $this->index($request, $id);
        }

    }

    public function index($request, $id)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);
        $cartContents = \Cart::session(auth()->user()->id)->getContent();
        $totalPrice = 0; // Initialize the total price

        foreach ($cartContents as $item) {
            $itemTotalPrice = $item->price * $item->quantity;
            $totalPrice += $itemTotalPrice;
        }
        //dd($request->all());
        $product = Product::find($id);                //For specific product data pass through parameter.
        $post_data = [];
        $post_data['total_amount'] = $totalPrice;  // You cant not pay less than 10
        $post_data['total'] = $product->price;
        $post_data['currency'] = 'BDT';
        $post_data['tran_id'] = uniqid();

        // CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;

        $post_data['paymenttype'] = $request->paymenttype;
        $post_data['last_name'] = $request->last_name;       //Name come from Billings
        $post_data['cus_email'] = $request->email;           //email come from Billings
        $post_data['cus_add1'] = $request->address;         //Address come from Billings
        $post_data['user_id'] = auth()->user()->id;        //User Id Come From Auth USer
        $post_data['product_id'] = $product->id;              //product id come from product
        $post_data['cus_add2'] = '';
        $post_data['cus_city'] = '';
        $post_data['cus_state'] = '';
        $post_data['cus_postcode'] = '';
        $post_data['cus_country'] = 'Bangladesh';
        $post_data['cus_phone'] = $request->phone;     //Phone come from Billings
        $post_data['cus_fax'] = '';

        // SHIPMENT INFORMATION
        $post_data['ship_name'] = 'Store Test';
        $post_data['ship_add1'] = 'Dhaka';
        $post_data['ship_add2'] = 'Dhaka';
        $post_data['ship_city'] = 'Dhaka';
        $post_data['ship_state'] = 'Dhaka';
        $post_data['ship_postcode'] = '1000';
        $post_data['ship_phone'] = '';
        $post_data['ship_country'] = 'Bangladesh';

        $post_data['shipping_method'] = 'NO';
        $post_data['product_name'] = 'Computer';
        $post_data['product_category'] = 'Goods';
        $post_data['product_profile'] = 'physical-goods';

        // OPTIONAL PARAMETERS
        $post_data['value_a'] = 'ref001';
        $post_data['value_b'] = 'ref002';
        $post_data['value_c'] = 'ref003';
        $post_data['value_d'] = 'ref004';

        //Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')   //Table name must mention here (Billings) table i have used
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'last_name' => $post_data['last_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],   //Last Name
                'total' => $post_data['total'],
                'paymenttype' => $post_data['paymenttype'],
                'user_id' => $post_data['user_id'],          //For User Post
                'product_id' => $post_data['product_id'],     //For Product Post
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
            ]);

        $orderId = DB::table('orders')->where('transaction_id', $post_data['tran_id'])->value('id');
        $userId = auth()->user()->id;
        $cartItems = \Cart::session($userId)->getContent();
        //dd($cartItems);

        foreach ($cartItems as $item) {
            $orderItem = new OrderItems();
            $orderItem->user_id = $userId;

            $orderItem->order_id = $orderId;
            $orderItem->product_id = $item->id;
            $orderItem->quantity = $item->quantity;
            $orderItem->unit_price = $item->price;

            $orderItem->save();
        }
        $order = Order::find($orderId);
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Make sure your Admin model uses the Notifiable trait
            $admin->notify(new OrderReceivedNotification($order));
        }

        $sslc = new SslCommerzNotification();
        // initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (! is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = [];
        }

    }

    public function success(Request $request)
    {
        echo 'Transaction is Successful';

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        //Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')  //Table name must mention here (Billings) table i have used
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {

                $update_product = DB::table('orders')   //Table name must mention here (order) table i have used
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo '<br >Transaction is successfully Completed';
            }
        } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo 'Transaction is successfully Completed';
        } else {
            //That means something wrong happened. You can redirect customer to your product page.
            echo 'Invalid Transaction';
        }
        toastr()->success('Payment', 'Payment Successful');
        // return redirect()->route('home')->with('success', 'Payment Successful');

    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo 'Transaction is Falied';
        } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo 'Transaction is already Successful';
        } else {
            echo 'Transaction is Invalid';
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo 'Transaction is Cancel';
        } elseif ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo 'Transaction is already Successful';
        } else {
            echo 'Transaction is Invalid';
        }

    }
}
