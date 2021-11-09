<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ImagenProducto;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //No se como hacer la query con la relacion que hice en los modelos
        /*$productoadas = Producto::with('categoria')
                    ->where('active', 1)
                    ->get();  
        */
        $productos = \DB::table('producto as p')
                    ->select('p.*', 'c.nombre_categoria')
                    ->join('categoria as c', 'c.id_categoria', '=', 'p.id_categoria')
                    ->where('p.active', 1)
                    ->get();
                 
        $categorias = Categoria::all()
                    ->where('active', 1);       
        return view('producto.index',compact('productos','categorias')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categorias = Categoria::all()
                      ->where('active', 1);
        return view('producto.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $imagen = $request->file('imagen');
           

            try{

                $validator = Validator::make($request->all(),[
                    'nombre'=>'required|min:3',
                    'descripcion'=>'required',
                    'precio'=>'required',
                    'imagen'=>'required|image|mimes:jpg,jpeg,png',
                    'categoria'=>'required'
                    
                ]);
    
            
    
                if($validator->fails()){
                    return back()
                    ->withInput()
                    ->with('ErrorInsert','Favor llenar los datos')
                    ->withErrors($validator);
                }


            $producto = new Producto;
            $producto->nombre_producto = $request->nombre;
            $producto->descripcion_producto = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->imagen_destacada = $this->subirImagenes($imagen, public_path('images/productos'));
            $producto->id_categoria = $request->categoria;
            $producto->save();
            $producto_id = $producto->id_producto;
            //$ultimoProducto = Producto::latest('id_producto')->first();

            

    
        return response()->json(['status'=>"success", 'user_id'=>$producto_id]);
          
    }catch(\Exception $e){

        return back()
            ->withInput()
            ->with('ErrorInsert','Error en al registrar' . $e->getMessage())
            ->withErrors($validator);
    }
    
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
        $producto = DB::table('producto as p')
					->select('c.nombre_categoria','p.*')
                    ->join('categoria as c', 'c.id_categoria', '=', 'p.id_categoria')
					->where('p.id_producto', $id)
					->first();

        $productoImagen  = DB::table('producto as p')
					->select('im.*','p.*')
                    ->join('imagen_producto as im', 'im.id_producto', '=', 'p.id_producto')
					->where('p.id_producto', $id)
					->where('im.active', 1)
					->get();

                    

        $categorias = Categoria::all()
                      ->where('active', 1);
        return view('producto.editar',compact('producto','categorias','productoImagen'));
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

        $producto = Producto::find($id);
        $imagenPreviaDestacada = $producto->imagen_destacada;


       

            $validator = Validator::make($request->all(),[
                'nombre'=>'required|min:3',
                'descripcion'=>'required',
                 //'precio'=>'required|number',
                'categoria'=>'required'
                
            ]);

            if($validator->fails()){
                return back()
                ->withInput()
                ->with('ErrorInsert','Favor llenar los datos')
                ->withErrors($validator);
            }
            
            if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $producto->nombre_producto= $request->nombre;
              $producto->descripcion_producto= $request->descripcion;
              $producto->precio= $request->precio;
              $producto->imagen_destacada = $this->subirImagenes($imagen, public_path('images/productos'));
              $producto->id_categoria= $request->categoria;
              $producto->save();

            }else{
            $producto->nombre_producto= $request->nombre;
              $producto->descripcion_producto= $request->descripcion;
              $producto->precio= $request->precio;
              $producto->id_categoria= $request->categoria;
              $producto->save();

               
            }

            if ($request->hasFile('imagenes')) {

                $imagenes = $request->file('imagenes');
                foreach($imagenes as $imagenProducto){
         
                    $producto = ImagenProducto::create([
                    'nombre_imagen'=> $request->nombre,
                    'imagen' => $this->subirImagenes($imagenProducto, public_path('images/productos')),
                    'id_producto'=> $id
                ]);
                   
                }

        }
                
            return redirect('/productos')->with('Result',[
                'status' => 'success',
                'content' => 'Producto registrado con exito'
            ]);
          

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $imagenPreviaDestacada = $producto->imagen_destacada;

        $producto->active = 0;
        $producto->save();
        $destino = public_path('images/productos');
        unlink($destino.'/'.$imagenPreviaDestacada);
        unlink($destino.'/thumbs/'.$imagenPreviaDestacada);
        return redirect('/productos')->with('Result',[
            'status' => 'success',
            'content' => 'Producto eliminado con exito'
        ]);
    }


    public function eliminarImagen($id)
    {
        $imagen = ImagenProducto::find($id);
        $imagenPrevia = $imagen->imagen;

        $imagen->active = 0;
        $imagen->save();
        $destino = public_path('images/productos');
        unlink($destino.'/'.$imagenPrevia);
        unlink($destino.'/thumbs/'.$imagenPrevia);
        return redirect('/clientes')->with('Result',[
            'status' => 'success',
            'content' => 'Cliente eliminado con exito'
        ]);
            
    }

   public function guardarImagen(Request $request){

    
    if ($request->hasFile('imagenes')) {
        
        $imagenes = $request->file('imagenes');
      

        foreach($imagenes as $imagen){
            $filename = uniqid().'_'.time() . '.' . $imagen->getClientOriginalExtension();
            $imagen_ = ImagenProducto::create([
            'nombre_imagen'=> $filename,
            'imagen' => $this->subirImagenes($imagen, public_path('images/productos')),
            'id_producto'=> $request->userid
        ]);

    }
           
}
        return response()->json(['status'=>"success",'imgdata'=>$request->nombre,'userid'=>$request->userid]);
    }

    public function guardarImagenGaleria(Request $request){

   
        if ($request->hasFile('file')) {
            $imagenes = $request->file('file');
            foreach($imagenes as $imagen){
                $filename = uniqid().'_'.time() . '.' . $imagen->getClientOriginalExtension();
                $imagen_producto = ImagenProducto::create([
                'nombre_imagen'=> $filename,
                'imagen' => $this->subirImagenes($imagen, public_path('images/productos')),
                'id_producto'=> $request->id_producto
            ]);
    
        }
               
    }
            return response()->json(['status'=>"success",'imgdata'=>$imagen,'userid'=>$request->id_producto]);
        }
}
