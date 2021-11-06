<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
                 
        $clientes = Cliente::all()
                    ->where('active', 1);       
        return view('cliente.index',compact('clientes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

            $imagenes = $request->file('file');
     
                $imagen = Cliente::create([
                'imagen' => $this->subirImagenes($imagenes, public_path('images/clientes')),
            ]);
        }
            return response()->json(['success' => $imagen]);
               
            

    
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
        $cliente = Cliente::find($id);
        $imagenPrevia = $cliente->imagen;

        $cliente->active = 0;
        $cliente->save();
        $destino = public_path('images/clientes');
        unlink($destino.'/'.$imagenPrevia);
        unlink($destino.'/thumbs/'.$imagenPrevia);
        return back()->with('Listo','Registro eliminado exitosamente');
    }


    public function subirImagenes($file, $carpeta)
    {
       $destinationPath =  $carpeta; 
        $filename = uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
             

        if ($file->move($destinationPath.'/' , $filename)) { 

            $red = Image::make($destinationPath.'/'.$filename);
            $red->resize(200,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destinationPath.'/thumbs/'.$filename);
            return $filename; 
     } 
       
   
  }
}
