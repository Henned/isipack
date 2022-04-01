<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Srmklive\PayPal\Service\Paypal;

class PayPalController extends Controller
{

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        // Init PayPal
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $price = $data['value'];
        $description = 'Einkauf bei Isipack24.de';

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "payer" => [
                "name" => [
                    "given_name" => $data['firstName'],
                    "surname" => $data['lastName']
                ],

                "address" => [
                    "address_line_1" => $data['street'] . " " . $data['housenumber'],
                    "admin_area_2" => $data['city'],
                    "admin_area_1" => 'NRW',
                    "postal_code" => $data['postcode'],
                    "country_code" => "DE"
                ],

                "email_address" => $data['email']
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $price
                    ],
                    "description" => $description
                ]
            ]
        ]);

        do {
            $uniqueOrderID = 'Isi-' . random_int(100000000, 999999999);
        } while (Order::where('order_id', '=', $uniqueOrderID)->first());

        $newOrder = Order::create([
            'user_id' => $data['user_id'],
            'order_id' => $uniqueOrderID,
            'Firma' => $data['company'],
            'Vorname' => $data['firstName'],
            'Nachname' => $data['lastName'],
            'Email' => $data['email'],
            'Straße' => $data['street'],
            'Hausnummer' => $data['housenumber'],
            'Postleitzahl' => $data['postcode'],
            'Ort' => $data['city'],
        ]);
        
        foreach($data['content'] as $item){
            OrderItem::create([
                'product_id' => $item['id'],
                'order_id' => $newOrder->id,
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'total' => $item['price']*$item['qty'],
            ]);
        }

        Transaction::create([
            'order_id' => $newOrder->id,
            'status' => $order['status'],
            'reference_number' => $order['id']
        ]);

        return response()->json($order);
    }

    public function capture(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderID = $data['orderID'];

        // Init PayPal
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $result = $provider->capturePaymentOrder($orderID);

        // Update Database
        if ($result['status'] == "COMPLETED") {
            Transaction::where('reference_number', $result['id'])
                        ->update(['status' => 'COMPLETED', 'updated_at' => \Carbon\Carbon::now()]);
        }

        return response()->json($result);
    }

    public function cancle(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderID = $data['orderID'];

        // Init PayPal
        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $result = $provider->capturePaymentOrder($orderID);
        $order = Transaction::where('reference_number', $orderID)->first();
        Order::where('id', $order->order_id)->delete();
    }
}
