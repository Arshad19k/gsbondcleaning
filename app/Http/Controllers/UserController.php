<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('deleted', '=', 0)->get();

        return view('userlist', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ];

        $res = User::create($data);

        if($res) {
            return response()->json(['status' => true, 'msg' => 'User created successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->userId);

        $data = [
            'name' => $request->editname,
            'phone' => $request->editphone,
            'status' => $request->editstatus
        ];

        $res = $user->update($data);

        if($res) {
            return response()->json(['status' => true, 'msg' => 'User updated successfully..']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->deleted = 1;
        $res = $user->update();
        
        if($res) {
            return response()->json(['status' => true, 'msg' => 'User deleted successfully..']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::findOrFail($request->cuser_id);

        $user->password = Hash::make($request->password);

        $res = $user->update();

        if($res) {
            return response()->json(['status' => true, 'msg' => 'User deleted successfully..']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }
}
