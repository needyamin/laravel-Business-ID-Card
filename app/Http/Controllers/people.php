<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class people extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        $people = DB::table('people')->orderBy('id', 'desc')->get();
        return view('form', ['people' => $people]);

    }

public function printx($id) { 
    $people = DB::select("SELECT * FROM people WHERE id='$id'");
    return view('yamin', ['people' => $people]);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

//IP Address GEt    
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{$ip_address = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else{$ip_address = $_SERVER['REMOTE_ADDR'];}    
//////////////////////////5200///////////////////

       $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);


        /* Store $imageName name in DATABASE from HERE */
        DB::table('people')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'image' => $imageName,
            'country' => $request->country,
            'profession' => $request->profession,
            'email' => $request->email,
            'ip' => $ip_address,
        ]);


        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
        return redirect(route('image.upload.post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::delete('delete from people where id = ?',[$id]);
        return redirect(route('index'));
        
    }



      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


}
