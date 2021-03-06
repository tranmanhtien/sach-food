<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order_details;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Bill\createRequest;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // 1 trái cây
    // 2 thịt
    // 3 cá
    // 4 đông lạnh
    // 5 gói hàng
    public function index()
    {
        if (!empty(Auth::user()->id)) {
            $amount = 0;
            $total = 0;
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
            $data = Product::where('level', '=', 0)->orderBy('id', 'DESC')->search()->paginate(20);
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            foreach ($cart as $car) {
                if ($car->idUser == $idUser && $car->genaral == 1) {
                    $product = Product::find($car->idProduct);
                    if (!empty($product)) {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    } else {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('page.content.home', compact(['data', 'data1', 'total', 'amount']));
        } else {
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            $data = Product::where('level', '=', 0)->orderBy('id', 'DESC')->search()->paginate(20);
            return view('page.content.home', compact(['data', 'data1']));
        }
    }

    public function thit()
    {
        $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
        if (!empty(Auth::user()->id)) {
            $amount = 0;
            $total = 0;
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
            $data = Product::where('level', '=', 1)->orderBy('id', 'DESC')->search()->paginate(20);
            foreach ($cart as $car) {
                if ($car->idUser == $idUser && $car->genaral == 1) {
                    $product = Product::find($car->idProduct);
                    if (!empty($product)) {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    } else {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('page.content.thit', compact(['data', 'data1', 'total', 'amount']));
        } else {
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            $data = Product::where('level', '=', 1)->orderBy('id', 'DESC')->search()->paginate(20);
            return view('page.content.thit', compact(['data', 'data1']));
        }
    }

    public function haisan()
    {
        $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
        if (!empty(Auth::user()->id)) {
            $amount = 0;
            $total = 0;
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
            $data = Product::where('level', '=', 2)->orderBy('id', 'DESC')->search()->paginate(20);
            foreach ($cart as $car) {
                if ($car->idUser == $idUser && $car->genaral == 1) {
                    $product = Product::find($car->idProduct);
                    if (!empty($product)) {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    } else {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('page.content.haisan', compact(['data', 'data1', 'total', 'amount']));
        } else {
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            $data = Product::where('level', '=', 2)->orderBy('id', 'DESC')->search()->paginate(20);
            return view('page.content.haisan', compact(['data', 'data1']));
        }
    }

    public function donglanh()
    {
        $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
        if (!empty(Auth::user()->id)) {
            $amount = 0;
            $total = 0;
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
            $data = Product::where('level', '=', 3)->orderBy('id', 'DESC')->search()->paginate(20);
            foreach ($cart as $car) {
                if ($car->idUser == $idUser && $car->genaral == 1) {
                    $product = Product::find($car->idProduct);
                    if (!empty($product)) {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    } else {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('page.content.donglanh', compact(['data', 'total', 'amount', 'data1']));
        } else {
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            $data = Product::where('level', '=', 3)->orderBy('id', 'DESC')->search()->paginate(20);
            return view('page.content.donglanh', compact(['data', 'data1']));
        }
    }

    public function goihang()
    {
        $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
        if (!empty(Auth::user()->id)) {
            $amount = 0;
            $total = 0;
            $idUser = Auth::user()->id;
            $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
            $data = Product::where('level', '=', 4)->orderBy('id', 'DESC')->search()->paginate(20);
            foreach ($cart as $car) {
                if ($car->idUser == $idUser && $car->genaral == 1) {
                    $product = Product::find($car->idProduct);
                    if (!empty($product)) {
                        $total = $total + ($product->price * $car->amount);
                        $amount++;
                    } else {
                        $total = 0;
                        $amount = 0;
                    }
                }
            }
            //return view('page.content.home', compact(['products']));
            return view('page.content.goihang', compact(['data', 'total', 'amount', 'data1']));
        } else {
            $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
            $data = Product::where('level', '=', 4)->orderBy('id', 'DESC')->search()->paginate(20);
            return view('page.content.goihang', compact(['data', 'data1']));
        }
    }

    public function cartUser($idUser)
    {
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        $products = Product::all();
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $data = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        return view('page.content.cart', compact('products', 'data', 'total', 'amount'));
    }
    // có 3 trạng thái giỏ hàng:
    // 1 -> đã thêm vào giỏ chờ thanh toán
    // 2 -> đã thanh toán
    // 3 -> trả hàng
    public function addcart($idUser, $idProduct)
    {
        $cardData = Cart::all();
        //dd($cardData);
        foreach ($cardData as $key => $card) {
            $empryData = ($card->idProduct == $idProduct) && ($card->idUser == $idUser) && ($card->genaral == 1) && ($card->amount >= 1);
            //dd($k);
            if ($empryData == true) {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount + 1;
                $cardRowUpdate->save();
                return redirect()->route('home')->with('success', 'Successfully add card ');
            }
        }
        if (Cart::create([
            'idUser' => $idUser,
            'idProduct' => $idProduct,
            'genaral' => 1,
            'amount' => 1
        ])) {
            return redirect()->route('home')->with('success', 'Successfully add card ');
        } else {
            return redirect()->route('home')->with('error', 'error add card ');
        }
    }

    public function themcart($idUser, $idProduct)
    {
        $cardData = Cart::all();
        //dd($cardData);
        foreach ($cardData as $key => $card) {
            $empryData = ($card->idProduct == $idProduct) && ($card->idUser == $idUser) && ($card->genaral == 1) && ($card->amount >= 1);
            //dd($k);
            if ($empryData == true) {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount + 1;
                $cardRowUpdate->save();
                return redirect()->route('home.cartUser', Auth::user()->id)->with('success', 'Đã thêm thành công');
            }
        }
        if (Cart::create([
            'idUser' => $idUser,
            'idProduct' => $idProduct,
            'genaral' => 1,
            'amount' => 1
        ])) {
            return redirect()->route('home')->with('success', 'Successfully add card ');
        } else {
            return redirect()->route('home')->with('error', 'error add card ');
        }
    }

    public function trucart($idUser, $idProduct)
    {
        $cardData = Cart::all();
        //dd($cardData);
        foreach ($cardData as $key => $card) {
            $empryData = ($card->idProduct == $idProduct) && ($card->idUser == $idUser) && ($card->genaral == 1);
            //dd($k);
            if ($empryData == true && ($card->amount >= 2)) {
                $cardRowUpdate = Cart::find($card->id);
                $cardRowUpdate->amount = $card->amount - 1;
                $cardRowUpdate->save();
                return redirect()->route('home.cartUser', Auth::user()->id)->with('success', 'Đã trừ thành công ');
            }
            if ($empryData == true && ($card->amount = 1)) {
                $card->delete();
                return redirect()->route('home.cartUser', Auth::user()->id)->with('error', 'Sản phẩm đã được xóa của bạn');
            }
        }
        if (Cart::create([
            'idUser' => $idUser,
            'idProduct' => $idProduct,
            'genaral' => 1,
            'amount' => 1
        ])) {
            return redirect()->route('home')->with('success', 'Successfully add card ');
        } else {
            return redirect()->route('home')->with('error', 'error add card ');
        }
    }

    public function viewProduct($idProduct)
    {
        $data = Product::find($idProduct);
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        //$data = Product::orderBy('id','DESC')->search()->paginate(20);
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        return view("page.content.product", compact('data', 'total', 'amount'));
    }

    public function delete(Cart $id)
    {
        $id->delete();
        return redirect()->route('home.cartUser', Auth::user()->id)->with('success', 'Đã xóa sản phẩm');
    }

    public function pay()
    {
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        $products = Product::all();
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $data = Cart::with('products')->where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        return view("page.content.infobook", compact('data', 'total', 'amount', 'products'));
    }

    public function postthanhtoan(createRequest $request)
    {
//        dd(json_decode($request->data, true), $request->all());
        $data = json_decode($request->data, true);
        $array = [];
        foreach ($data as $item) {
            if (!in_array($item['idProduct'], $array)) {
                $array[] = ['product_id' => $item['idProduct'], 'amount' => $item['amount'], 'price_product' => $item['amount'] * $item['products']['price']];
            }
        }

        $success = 0;
        foreach ($array as $item) {
            if (Bill::create([
                'idUser' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'genaral' => 1,
                'price' => $request->price,
                'numberPhone' => $request->numberPhone,
                'address' => "Số-Đường :" . $request->sonha . "/Xã :" . $request->xa . "/Huyện-Quận :" . $request->huyen . "/Tỉnh :" . $request->tinh,
                'idProduct' => $item['product_id'],
                'quantity' => $item['amount'],
                'price_product' => $item['price_product']
            ])) {
                $success++;
            }
        }

        if ($success > 1) {
            $cartUser = Cart::where('idUser', '=', Auth::user()->id)->where('genaral', '=', 1)->get();

            //Lấy data truyền sang mail
            $sum = 0;
            $arrCart = [];
            foreach ($cartUser as $item) {
                $arrCart['cart'][] = [
                    'name' => $item->products->name,
                    'quantity' => $item->amount,
                    'price' => $item->products->price,
                    'sum' => $item->amount * $item->products->price,
                ];
                $sum += $item->amount * $item->products->price;
            }
            $email = $request->input('email');
            $arrCart['sum'] = $sum;
            //gửi mail
            Mail::to($email)
                ->send(new OrderMail($arrCart));
            foreach ($cartUser as $car) {
                //$pro = Product::where('id', '=', $car->idProduct)->get();
                $pro = Product::find($car->idProduct);
                //dd($pro);
                $pro->amount = $pro->amount - $car->amount;
                $pro->save();
                $car->genaral = 2;
                $car->save();
            }
            return redirect()->route('home')->with('success', 'Đặt thành công.');
        }
        // con phan gui maill xac nhan a Tien hoan thien not nhe


        //        if(Bill::create([
        //            'idUser'=>Auth::user()->id,
        //            'name'=>$request->name,
        //            'email'=>$request->email,
        //            'genaral'=>1,
        //            'price'=>$request->price,
        //            'numberPhone'=>$request->numberPhone,
        //            'address'=>"Số-Đường :".$request->sonha."/Xã :".$request->xa."/Huyện-Quận :".$request->huyen."/Tỉnh :".$request->tinh
        //        ]))
        //        {
        /*            $cartUser = Cart::where('idUser', '=', Auth::user()->id)->where('genaral','=',1)->get();
                    //dd($cartUser);
                    foreach($cartUser as $car){
                        //$pro = Product::where('id', '=', $car->idProduct)->get();
                        $pro =Product::find($car->idProduct);
                        $pro->amount = $pro->amount - $car->amount;
                        $pro->save();
                        $car->genaral = 2;
                        $car->save();
                    }*/


        // $dataSend = [];
        //gửi mail
        // Mail::to($request->input('email'))->send(new OrderMail($da));

        //dd(1);


        //return redirect()->route('home')->with('success','Đặt thành công.');
        //        }
    }

    public function mycart()
    {
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        $products = Product::all();
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $bill = Bill::where('genaral', '=', 1)->where('idUser', '=', $idUser)->get();
        $data = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        //dd(empty($data[0]->id));
        $datanext = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 2)->get();
        return view('page.content.checkout', compact('products', 'data', 'total', 'amount', 'datanext', 'bill'));
    }

    public function blog($idBlog)
    {
        $data = Blog::find($idBlog);
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        //$data = Product::orderBy('id','DESC')->search()->paginate(20);
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        return view("page.content.blog", compact('data', 'total', 'amount'));
    }

    public function suatan()
    {
        $amount = 0;
        $total = 0;
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        //$data = Product::orderBy('id','DESC')->search()->paginate(20);
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                } else {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        return view("page.content.suatan", compact('total', 'amount'));
    }

    public function search()
    {
        $idUser = Auth::user()->id;
        $cart = Cart::where('idUser', '=', $idUser)->where('genaral', '=', 1)->get();
        $data = Product::where('name', 'like', '%' . $_GET['search'] . '%')->orderBy('id', 'DESC')->paginate(2);
        $data1 = Blog::orderBy('id', 'DESC')->search()->paginate(6);
        $total = 0;
        $amount = 0;
        foreach ($cart as $car) {
            if ($car->idUser == $idUser && $car->genaral == 1) {
                $product = Product::find($car->idProduct);
                if (!empty($product)) {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                }
            }
        }
        //return view('page.content.home', compact(['products']));
        return view('page.content.search', compact(['data', 'data1', 'total', 'amount']));
    }
}
