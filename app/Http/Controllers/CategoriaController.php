<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use DB;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all()
                    ->where('active', 1);       
        return view('categoria.index',compact('categorias')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            $validator = Validator::make($request->all(),[
                'nombre'=>'required|min:3',
                
            ]);

            if($validator->fails()){
                return back()
                ->withInput()
                ->with('ErrorInsert','Favor llenar los datos')
                ->withErrors($validator);
            }

            
            
            $categoria = Categoria::create([
                'nombre_categoria'=>$request->nombre,
                'alias'=>$request->nombre,
            
            ]); 
    
            return redirect('/categorias')->with('Result',[
                'status' => 'success',
                'content' => 'Categoría registrada con exito'
            ]);

    }catch(\Exception $e){

        return back()
            ->withInput()
            ->with('ErrorInsert','Error en al registrar' . $e->getMessage())
            ->withErrors($validator);
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
    public function edit($id)
    {
        
        $categoria = DB::table('categoria as c')
					->select('c.id_categoria','c.nombre_categoria')
					->where('c.id_categoria', $id)
					->first();


        return view('categoria.editar',compact('categoria'));
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
        $categoria = Categoria::find($id);
      
      
       
        $validator = Validator::make($request->all(),[
            'nombre'=>'required|min:3',
           
        ]);
        if($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor llenar los datos')
            ->withErrors($validator);
        }else{


              $categoria->nombre_categoria= $request->nombre;
              $categoria->alias= $request->nombre;
             
              $categoria->save();

              return redirect('/categorias')->with('Result',[
                'status' => 'success',
                'content' => 'Categoría modificada con exito'
            ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
       
        $categoria->active = 0;
        $categoria->save();
        return redirect('/categorias')->with('Result',[
            'status' => 'success',
            'content' => 'Categoría eliminada con exito'
        ]);
    }
}
