<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User_List = User::paginate(10);
        // $hash = '$2y$10$NhRNj6QF.Bo6ePSRsClYD.4zHFyoQr/WOdcESjIuRsluN1DvzqSHm';
        // foreach ($User_List as $user_row) {
        //     $pass = crypt($user_row->password, $hash);
        //     Log::info("Pass ".$pass);
        // }
        return view('users.index', compact('User_List'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return redirect('user_manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User_Detail = User::find($id);

        return view('users.detail', compact('User_Detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User_Detail = User::find($id);

        return view('users.edit', compact('id', 'User_Detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $Edit_User              = User::find($id);
            $Edit_User->name        = $request->get('name');
            $Edit_User->email       = $request->get('email');
        if ($request->password != null && $request->password_confirmation != null ) {
            $Edit_User->password    = Hash::make($request->get('password'));
        }
            $Edit_User->status      = $request->get('status');
            $Edit_User->save();

        return redirect('user_manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete_User = User::find($id);
        $Delete_User->delete();

        return redirect('user_manage');
    }
}
