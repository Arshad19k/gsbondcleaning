<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('deleted', '=', 0)->get();

        $user = User::where('deleted', '=', 0)->where('is_admin', '=', 0)->get();

        return view('orders.orderlist', compact(['order', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addorders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subrub' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'jobdate' => 'required',
        ]);

        $data = [
            'assign_to' => $request->assign_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'address' => $request->subrub,
            'state' => $request->state,
            'zip_code' => $request->postcode,
            'job_date' => $request->jobdate,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'livingroom' => $request->livingroom,
            'furnished' => $request->furnished,
            'house_type' => $request->housetype,
            'blinds' => $request->blinds,
            'howlong' => $request->howlong,
            'carpet' => isset($request->carpet) ? 1 : 0,
            'pest' => isset($request->pest) ? 1 : 0,
            'call' => isset($request->call) ? 1 : 0,
            'sms' => isset($request->sms) ? 1 : 0,
            'send_email' => isset($request->send_email) ? 1 : 0
        ];

        // return $data;

        $res = Order::create($data);

        if ($res) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $order = Order::findOrFail($request->id);
        
        return $order;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
