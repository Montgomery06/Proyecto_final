<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('view clients')) {
            $users = User::all(); 
            return view('users.index',compact('users'));
        }
        return redirect()->back()->with('error','no tienes permisos');
        //
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
        if (Auth::user()->hasPermissionTo('view clients')) {
        $passAux = $request->password; 
        $request->merge([
        'password' => bcrypt($passAux),
        ]);

        if ($user = User::create($request->all())) {
            return redirect()->back()->with('success','El registro se ha creado correctamente');
        }
        return redirect()->back()->with('error','No se pudo crear el registro');

        }
        return redirect()->back()->with('error','no tienes permisos');
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
    public function update(Request $request)
    {

        if (Auth::user()->hasPermissionTo('update clients')) {

        $passAux = $request->password; 
        $request->merge([
        'password' => bcrypt($passAux),
        ]);    

        $user = User::find($request['id']);
         if ($user) {
             if ($user->update($request->all())) {

                  return redirect()->back()->with('success','El registro se ha actualizado correctamente');;
             }
         }

        }
        return redirect()->back()->with('error','no tienes permisos');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (Auth::user()->hasPermissionTo('delete clients')) {
            $user = User::find($request['id']);
            if ($user) {
                if ($user->delete()) {
                    return response()->json([
                        'message' => 'Registro eliminado correctamente',
                        'code' => '200',

                    ]);
                }
            }

            return response()->json([
                    'message' => 'No se pudo eliminar el registro',
                    'code' => '400',

            ]);

        }
        return redirect()->back()->with('error','no tienes permisos');
        //
    }
}
