<?php

namespace App\Http\Controllers\SU;

use App\Http\Controllers\Controller;

use App\Admin\Admin;
use App\SU\SuperUser;
use Illuminate\Http\Request;
use App\Http\Resources\SuResource as SUresource;

// used for authentication
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class SuperUserController extends Controller
{
    public function login(Request $request)
    {
        // $loginData = $request->validate([
        //     'name'=>'required',
        //      'api_token'=>'required',
        //      'password'=>'required'
        // ]);


        if(auth()->attempt( [
            'name'=>$request->input('name'),
            // 'api_token' => $request->input('api_token'),
            'password'=>Hash::make($request->input('password')),
        ])){
            return response(['message'=>'Invalid Data']);
        }

        $accessToken = auth()->user()->createToken('AuthToken')->accessToken;

        return response(['user logged_in'=>auth()->user(),'access_token'=>$accessToken]);
    }
    public function register(Request $request)
    {
        //   dump($request);
        //  $validateData  = $request->validate([
        //     'name'=>'required|max:55',
        //     'role'=>'',
        //     'password'=>'required|confirmed',
        //     'api_token' => Str::random(60),
        // ]);
        // 'name'=>$request->input('name'),
        // 'role'=>$request->input('role'),
        // 'password'=>$request->input('password'),
        // 'api_token' => Str::random(60),
        //      'password' => Hash::make($data['password']),
        //    dump($validateData);
        //  $validateData['password'] = bcrypt($request->password);

        $su =  SuperUser::create(
            [
                'name'=>$request->input('name'),
                'role'=>$request->input('role'),
                'password'=>Hash::make($request->input('password')),
                'api_token' => Str::random(60),
            ]
        );


    //    $accessToken = $user->createToken('AuthToken')->accessToken;

        return response(['super_user'=>$su]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::orderBy('created_at','asc')->paginate(5);
        return SUresource::collection($admins);

    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin=$request->isMethod('put')? Admin::findOrFail($request->shop_id): new Admin;
        $admin->name = $request->name;
        $admin->shop_id = $request->shop_id;
        $admin->countryCode = $request->countryCode;
        $admin->password= $request->password;
        if($admin->save()){
            return new SUresource($admin);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SU\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function show(SuperUser $superUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SU\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperUser $superUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SU\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperUser $superUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SU\SuperUser  $superUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperUser $superUser)
    {
        //
    }
}
