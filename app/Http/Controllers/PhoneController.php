<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContact;
use App\Http\Requests\StoreContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $users = DB::table('contacts')->get();
     return view('index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
    //Validation
    $data = $request->all();

    DB::table("contacts")->insert([
        'name' => $data['name'],
        'phone' => $data['phone']
    ]);
      // return $request->all();
      return redirect('/phones')->with('message','Sucessfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('contacts') -> where('id',$id)-> first();
        return view('show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('contacts')->where('id',$id)->first();
        return view('edit', ['user' =>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContact $request, $id)
    {
        $data = $request-> all();

        //$user = DB::table('contacts')->where('id',$id)->first();

        //$user->name = $data['name'];
        //$user->name = $data['name'];
        //$user->name = $data['name'];

        DB::table('contacts')->where('id',$id)->update([
            'name' => $data['name'],
           'phone' => $data['phone']
        ]);
        
        return redirect('/phones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        DB::table('contacts')->where('id',$id)->delete();
        return redirect('/phones');
    }
}
