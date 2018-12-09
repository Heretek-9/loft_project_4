<?php

namespace App\Http\Controllers\_Public;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\Setting;

class OrdersController extends Controller
{
	public function addOrder(Request $request)
	{
		$this->validate($request, [
            'user_name' => 'required',
            'user_email' => 'required|email',
            'product_id' => 'required',
        ]);

        $saveArr = [];
        $saveArr['user_name'] = $request->get('user_name');
        $saveArr['user_email'] = $request->get('user_email');
        $saveArr['product_id'] = $request->get('product_id');

        $orderId = Order::create($saveArr)->id;

        $product = Product::where('id', '=', $saveArr['product_id'])->first()->toArray();

        $order = new \stdClass();
        $order->id = $orderId;
        $order->product = $product;
        $order->userMail = $saveArr['user_email'];

        $admin_email = Setting::where('name', '=', 'admin_email')->get()->toArray();

        if (!empty($admin_email)) {
            \Mail::to($admin_email[0]['value'])->send(new OrderMail($order));
        }

        echo json_encode('Ваша заявка принята');
        die;
	}
}