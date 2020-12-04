<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Loans;
use Illuminate\Http\Request;
use Auth;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('view loans')) {


            $users = User::all();
            $movies = Movie::all();  
            $loans = Loans::with('user','movie')->get(); 

            return view('loans.index',compact('loans','users','movies'));
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
         if (Auth::user()->hasPermissionTo('add loans')) {

        if ($loans = Loans::create($request->all())) {
            return redirect()->back()->with('success','El registro se ha creado correctamente');

        }return redirect()->back()->with('error','No se pudo crear el registro');

        }
        return redirect()->back()->with('error','no tienes permisos');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function show(Loans $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function edit(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Auth::user()->hasPermissionTo('update loans')) {
        $loans = Loans::find($request['id']);
        if ($loans) {
             if ($loans->update($request->all())) {

                  return redirect()->back()->with('success','El registro se ha actualizado correctamente');;
             }
         }
         return redirect()->back()->with('error','No se pudo actualizar el registro');
        }
        return redirect()->back()->with('error','no tienes permisos');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->hasPermissionTo('delete loans')) {
            $loans = Loans::find($request['id']);
            if ($loans) {
                if ($loans->delete()) {
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
