<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $status = $request->get('filterstatus');

        $order = Order::query()
                ->when($name, function ($query, $name) {
                    $query->where('fname','like','%'.$name.'%');
                })->when(isset($email), function ($query) use($email) {
                    $query->where('email', 'like', '%'.$email.'%');
                })->when(isset($status), function ($query) use($status) {
                    $query->where('status', $status);
                })->get()->toArray();

        foreach($order as $key => $ord) {
            
            if(!empty($ord['assign_to'])) {

                $assign = User::where('id', $ord['assign_to'])->where('deleted', 0)->first();
    
                $order[$key]['user_name'] = $assign->name;
            }
        }

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
    public function store(OrderRequest $request)
    {        
        $jobdate = date('Y-m-d', strtotime($request->jobdate));
        
        
        $data = [
            // 'assign_to' => $request->assign_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            // 'address' => $request->subrub,
            // 'state' => $request->state,
            // 'zip_code' => $request->postcode,
            'job_date' => $jobdate,
            // 'bedroom' => $request->bedroom,
            // 'bathroom' => $request->bathroom,
            // 'livingroom' => $request->livingroom,
            // 'furnished' => $request->furnished,
            // 'house_type' => $request->housetype,
            // 'blinds' => $request->blinds,
            // 'howlong' => $request->howlong,
            'services' => $request->services,
            'carpet' => isset($request->carpet) ? 1 : 0,
            'pest' => isset($request->pest) ? 1 : 0,
            'call' => isset($request->call) ? 1 : 0,
            'sms' => isset($request->sms) ? 1 : 0,
            'send_email' => isset($request->send_email) ? 1 : 0
        ];

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
    public function show(Request $request)
    {
        $order = Order::with('images')->where('id', '=', $request->id)->get()->toArray();
        
        foreach($order as $key => $ord) {
            
            if($ord['assign_to'] != '') {

                $assign = User::where('id', '=', $ord['assign_to'])->where('deleted', 0)->first();
    
                $order[$key]['user_name'] = $assign->name;
            }
        }
        
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $order = Order::with('images')->findOrFail($id);
        $user = User::where('deleted', '=', 0)->where('is_admin', '=', 0)->get();

        $totalImage = $order->images;

        // return $totalImage;
        
        return view('orders/editmodal', compact(['order', 'user', 'totalImage']));
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
        $valdated = $request->validate([
            'editfname' => 'required',
            'editlname' => 'required',
            'editphone' => 'required',
            'editsubrub' => 'required',
            'editstate' => 'required',
            'editpostCode' => 'required',
            'editjobdate' => 'required',
            'editstate' => 'required',
            'editpostCode' => 'required',
        ]);

        $order  = Order::findOrFail($request->order_id);

        $jobdate = date('Y-m-d', strtotime($request->editjobdate));

        $data = [
            'assign_to' => $request->assignUser,
            'fname' => $request->editfname,
            'lname' => $request->editlname,
            'phone' => $request->editphone,
            'message' => $request->editmessage,
            'address' => $request->editsubrub,
            'state' => $request->editstate,
            'zip_code' => $request->editpostCode,
            'job_date' => $jobdate,
            'bedroom' => $request->editbedrooms,
            'bathroom' => $request->editbathroom,
            'livingroom' => $request->editlivingrooms,
            'furnished' => $request->editfurnished,
            'house_type' => $request->edithousetype,
            'blinds' => $request->editblinds,
            'howlong' => $request->edithowlong,
            'carpet' => isset($request->carpet) ? 1 : 0,
            'pest' => isset($request->pest) ? 1 : 0,
            'call' => isset($request->call) ? 1 : 0,
            'sms' => isset($request->sms) ? 1 : 0,
            'send_email' => isset($request->sendemail) ? 1 : 0,
            'status' => $request->editstatus,
        ];

        $res = $order->update($data);

        if ($res) {
            return response()->json(['status' => true, 'msg' => 'Order updated successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong..!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ord = Order::findOrFail($request->id);

        $ord->deleted = 1;

        $res  =  $ord->update();

        if ($res) {
            return response()->json(['status' => true, 'msg' => 'Order deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong..!']);
        }
    }

    public function uploadImage(Request $request)
    {
        $userId = Auth::id();
        $order_id = $request->id;

        $validated = $request->validate([
            'id' => 'required'
        ]);

        $orderUpdate = Order::findOrFail($order_id);

        if (!empty($request->file('beforeimage'))) {
            foreach ($request->file('beforeimage') as $imagefile) 
            {
                $file_ext = $imagefile->getClientOriginalExtension();
                $file_name = Str::random(28) .'.'. $file_ext;
                $path = $imagefile->storeAs('orderImage', $file_name);

                $orderImg = OrderImage::create([
                    'user_id' => $userId,
                    'order_id' => $order_id,
                    'imgname' => $path,
                    'img_type' => $file_ext,
                    'img_for' => 1,
                ]);
            }
        }

        if (!empty($request->file('afterimage'))) {
            foreach ($request->file('afterimage') as $imagefile) 
            {
                $file_ext = $imagefile->getClientOriginalExtension();
                $file_name = Str::random(28) .'.'. $file_ext;
                $path = $imagefile->storeAs('orderImage', $file_name);

                $orderImg = OrderImage::create([
                    'user_id' => $userId,
                    'order_id' => $order_id,
                    'imgname' => $path,
                    'img_type' => $file_ext,
                    'img_for' => 2,
                ]);
            }
        }

        $orderUpdate->updated_at = now();

        $res =    $orderUpdate->save();

        if ($res) {
            return response()->json(['status' => true, 'msg' => 'Image uploaded successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong..!']);
        }
    }

    public function deleteImage(Request $request) 
    {
        // return $request;
        $data = OrderImage::findOrFail($request->id);

        
        Storage::disk('public')->delete($data->imgname);

        $res = $data->delete();

        if ($res) {
            return response()->json(['status' => true, 'msg' => 'Image deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong..!']);
        }
    }

    public function getUserDetailToSendEmail(Request $request)
    {
        $order = Order::findOrFail($request->id);

        return $order;
    }
}
