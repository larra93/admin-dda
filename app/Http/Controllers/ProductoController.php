<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ImagenProducto;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
       
        try{

            $validator = Validator::make($request->all(),[
                'nombre'=>'required|min:3',
                'descripcion'=>'required',
                'imagen'=>'required|image|mimes:jpg,jpeg,png',
                 //'precio'=>'required|number',
                'categoria'=>'required'
                
            ]);

            if($validator->fails()){
                return back()
                ->withInput()
                ->with('ErrorInsert','Favor llenar los datos')
                ->withErrors($validator);
            }
            

            $imagen = $request->file('imagen');

            $producto = Producto::create([
                'nombre_producto'=>$request->nombre,
                'descripcion_producto'=>$request->descripcion,
                'precio'=> 11,
                'imagen_destacada'=>$this->subirImagenes($imagen,public_path('images/productos')),
                'id_categoria'=>$request->categoria,
            ]); 
    

           /* $imagenes = $request->file('imagenes');
            if ($request->hasFile('imagenes')) {
                foreach($imagenes as $imagenProducto){
                    $producto = ImagenProducto::create([

                    ]);
            
                }
            }
*/

            return redirect('/productos')->with('Result',[
                'status' => 'success',
                'content' => 'Producto registrado con exito'
            ]);
          

    }catch(\Exception $e){

        return back()
        ->withInput()
        ->with('ErrorInsert','Error en al registrar' . $e->getMessage())
        ->withErrors($validator);
    }
    }



    public function subirImagenes($imagen, $carpeta)
    {
        $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
        $destino = $carpeta;
        $imagen->move($destino, $nombreImagen);
        $red = Image::make($destino.'/'.$nombreImagen);

        $red->resize(200,null, function($constraint){
                 $constraint->aspectRatio();
        
        });
                
        $red->save($destino.'/thumbs/'.$nombreImagen);

        return $nombreImagen;
   
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
    }
}
