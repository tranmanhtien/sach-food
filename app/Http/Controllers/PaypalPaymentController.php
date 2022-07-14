<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Bill;

class PaypalPaymentController extends Controller
{
    public function __construct()
    {
        $this->paypalClient = new PayPalClient;
        $this->customer = auth()->user();
    }

    public function createOrder(Request $request)
    {
        Log::info('Create Order');
        try {
            Log::info($request->getContent());
            DB::beginTransaction();
            $data = json_decode($request->getContent(), true);
            $token = $this->paypalClient->getAccessToken();
            $this->paypalClient->setAccessToken($token);
            $this->paypalClient->setCurrency('USD');
            $order = $this->paypalClient->createOrder([
                'intent'         => 'CAPTURE',
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value'         => $data['amount'],
                        ],
                    ],
                ],
            ]);

            $createOrder = Order::create([
                'name' => $request->input('name') ?? 'cuongtt',
                'user_id' => Auth::user()->id ?? 4,
                'email' => $request->input('email') ?? 'dotoan@gmail.com',
                'address' => $request->input('address') ?? 1,
                'total' => $data['amount'],
                'status' => 0,
                'payoff_method' => $request->input('payoff_method') ?? 0,
                'order_code' => $order['id'] ?? 1,
                'number_phone' => $request->numberPhone ?? '0988123456'
            ]);

            $orderIdLastet = Order::query()->latest()->first();
            Log::info('orderLasted');
            Log::info($orderIdLastet->id);

            $listOrder = json_decode($data['list_order'], true);
            $dataOrders= json_decode($listOrder, true);
            if (!empty($dataOrders)) {
                foreach ($dataOrders as $item) {
                    $product = Product::find($item['idProduct']);
                    $priceProduct = $product->price;
                    Bill::create([
                        'idUser' => $item['idUser'] ?? 4,
                        'name' => $request->input('name') ?? 'dotoan',
                        'email' => $request->input('email') ?? 'dotoan@gmail.com',
                        'price' => $priceProduct * $item['amount'],
                        'numberPhone' => $request->numberPhone ?? '0988123456',
                        'address' => $request->input('xa').'/'.$request->input('huyen').'/'.$request->input('tinh'),
                        'genaral' => $item->genaral ?? 1
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Create order success',
                'data'    => $order,
            ], 200);
            Log::info('End log Create order');
        } catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
        }
    }

    public function captureOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            Log::info('Capture Order');
            Log::info($request->getContent());
            $data = json_decode($request->getContent(), true);
            $orderId = $data['orderId'];
            Log::info('End result');
            $token = $this->paypalClient->getAccessToken();
            $this->paypalClient->setAccessToken($token);
            $result = $this->paypalClient->capturePaymentOrder($orderId);

            if ($result['status'] === 'COMPLETED') {
                return response()->json([
                    'message' => 'Thanh toán thành công',
                    'data'    => [],
                ], 200);

                DB::commit();
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            DB::rollBack();
        }
    }
}
