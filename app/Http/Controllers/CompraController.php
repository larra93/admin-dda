<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Validator;

class CompraController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['get_comoComprar', 'get_prensa']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::all();      
        return view('comoComprar.index',compact('compra')); 
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
        $compra = Compra::find($id);      

        return view('comoComprar.editar',compact('compra'));
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
        $compra = Compra::find($id);
      
      
       
        $validator = Validator::make($request->all(),[
            'descripcion'=>'required|min:3',
           
        ]);
        if($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor llenar los datos')
            ->withErrors($validator);
        }else{


              $compra->descripcion= $request->descripcion;
              
             
              $compra->save();

              return redirect('/admin/compra')->with('Result',[
                'status' => 'success',
                'content' => 'Modificado con exito'
            ]);
    }
    }

    public function get_comoComprar()
    {
        $compra = Compra::all();      
        return view('web.compra',compact('compra')); 
    }

    public function get_prensa()
    {   
        return view('web.prensa');
    }
}
