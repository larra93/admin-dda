<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terminos;
use Illuminate\Support\Facades\Validator;

class TerminosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['get_terminos']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminos = Terminos::all();      
        return view('terminos.index',compact('terminos')); 
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
        $terminos = Terminos::find($id);      

        return view('terminos.editar',compact('terminos'));
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
        $terminos = Terminos::find($id);
      
      
       
        $validator = Validator::make($request->all(),[
            'descripcion'=>'required|min:3',
           
        ]);
        if($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor llenar los datos')
            ->withErrors($validator);
        }else{


              $terminos->descripcion= $request->descripcion;
              
             
              $terminos->save();

              return redirect('/admin/terminos')->with('Result',[
                'status' => 'success',
                'content' => 'Modificado con exito'
            ]);
    }
    }

    public function get_terminos()
    {
        $terminos = Terminos::all();      
        return view('web.terminos',compact('terminos')); 
    }
}
