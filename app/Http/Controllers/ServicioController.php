<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;



class ServicioController extends Controller
{


    public function __construct()
    {
     $this->middleware('auth');   
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::all()
                    ->where('active', 1);  
        
                 
        $categorias = Categoria::all()
                    ->where('active', 1);       
        return view('servicio.index',compact('servicios','categorias')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Llamada a las categorias para rellenar el combobox
        $categorias = Categoria::all()
                      ->where('active', 1);
        return view('servicio.create')->with('categorias',$categorias);;
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
                'descripcion'=>'required',
                'imagen'=>'required|image|mimes:jpg,jpeg,png',
                'categoria'=>'required'
                
            ]);

            
            

            if($validator->fails()){
                return back()
                ->withInput()
                ->with('ErrorInsert','Favor llenar los datos')
                ->withErrors($validator);
            }

            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
            $destino = public_path('images/servicios');
            $request->imagen->move($destino, $nombreImagen);
            $red = Image::make($destino.'/'.$nombreImagen);
            $red->resize(200,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destino.'/thumbs/'.$nombreImagen);
            
            $servicio = Servicio::create([
                'nombre_servicio'=>$request->nombre,
                'descripcion_servicio'=>$request->descripcion,
                'imagen'=>$nombreImagen,
                'id_categoria'=>$request->categoria,
            ]); 
    
            return redirect('/admin/servicios')->with('Result',[
                'status' => 'success',
                'content' => 'Servicio registrado con exito'
            ]);

    }catch(\Exception $e){

        return back()
            ->withInput()
            ->with('ErrorInsert','Error en al registrar' . $e->getMessage())
            ->withErrors($validator);
    }

       /* $servicios = new Servicio();
        $servicios->nombre = $request->get('nombre');
        $servicios->descripcion = $request->get('descripcion');
        $servicios->imagen = $request->get('imagen');
        $servicios->save();

        return redirect('/servicios')->with('Result',[
            'status' => 'success',
            'content' => 'Servicio registrado con exito'
        ]);
        */
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
        

    
        $servicio = DB::table('servicios as s')
					->select('c.nombre_categoria','s.*')
                    ->join('categoria as c', 'c.id_categoria', '=', 's.id_categoria')
					->where('s.id_servicio', $id)
					->first();


        $categorias = Categoria::all()
                      ->where('active', 1);
        return view('servicio.editar',compact('servicio','categorias'));

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
        
        $servicio = Servicio::find($id);
        $imagenPrevia = $servicio->imagen;
      
       
        $validator = Validator::make($request->all(),[
            'nombre'=>'required|min:3',
            'imagen'=>'image|mimes:jpg,jpeg,png',
            'descripcion'=>'required',
            'categoria'=>'required'
        ]);
        if($validator->fails()){
            return back()
            ->withInput()
            ->with('ErrorInsert','Favor llenar los datos')
            ->withErrors($validator);
        }else{


            if ($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $nombreFoto = time().'.'.$imagen->getClientOriginalExtension();
                $destino = public_path('images/servicios');
                $request->imagen->move($destino, $nombreFoto);
                $red = Image::make($destino.'/'.$nombreFoto);
                $red->resize(200,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destino.'/thumbs/'.$nombreFoto);
                unlink($destino.'/'.$imagenPrevia);
                unlink($destino.'/thumbs/'.$imagenPrevia);
                $servicio->imagen=$nombreFoto; 
    
              }
              $servicio->nombre_servicio= $request->nombre;
              $servicio->descripcion_servicio= $request->descripcion;
              $servicio->id_categoria= $request->categoria;
              $servicio->save();

              return redirect('/admin/servicios')->with('Result',[
                'status' => 'success',
                'content' => 'Servicio modificado con exito'
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
        $servicio = Servicio::find($id);
        $imagenPrevia = $servicio->imagen;
        if($servicio->delete()){
            $destino = public_path('images/servicios');
            unlink($destino.'/'.$imagenPrevia);
            unlink($destino.'/thumbs/'.$imagenPrevia);
            return redirect('/admin/servicios')->with('Result',[
                'status' => 'success',
                'content' => 'Servicio eliminado con exito'
            ]);
        }
    }
}
