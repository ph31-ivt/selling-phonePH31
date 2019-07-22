<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPassword;
use App\Http\Requests\UpdateUserProfile;
use App\Order;
use App\Order_Detail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \auth()->user();
        return view('profile_manager',compact('user'));
    }

    public function order_manager()
    {
        $orders = Order::where('user_id','=',\auth()->user()->id)->orderBy('id','desc')->paginate(5);
        return view('order_manager',compact('orders'));
    }

    public function order_manager_detail(Request $request, $name, $id)
    {
        $ordered = Order::findOrFail($id);
        $order_details = Order_Detail::where('order_id','=',$ordered->id)->get();
        return view('order_manager_details',compact(['ordered','order_details']));
    }

    public function profile_manager()
    {
        $user = \auth()->user();
        return view('profile_manager',compact('user'));
    }

    public function update_profile_manager(UpdateUserProfile $request,$id)
    {
        $data = $request->only(['name','tel','address']);
        $user = User::where('id','=',$id)
            ->update($data);
        if (!$user>0){
            return redirect()->back()->with('error','Cập nhật thất bại!');
        }
        return redirect()->back()->with('success','Cập nhật thành công!');
    }

    public function change_password()
    {
        $user = \auth()->user();
        return view('change_password',compact('user'));
    }
    public function update_change_password(UpdateUserPassword $request, $id)
    {
        $user = User::where('id','=',$id)
            ->update([
                'password' => Hash::make($request->password),
            ]);
        return redirect()->back()->with('success','Đổi mật khẩu thành công!');
    }
}
