<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\SobreNosotros;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class SobreNosotrosController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['get_sobreNosotros']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sobre = SobreNosotros::all();      
        return view('sobreNosotros.index',compact('sobre')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sobreNosotros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

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
        $sobre = SobreNosotros::find($id);      

        return view('sobreNosotros.editar',compact('sobre'));
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
        $sobre = SobreNosotros::find($id);
        $imagenPrevia = $sobre->imagen;
      
        $validator = Validator::make($request->all(),[
            'descripcion'=>'required|min:3',
            'imagen'=>'image|mimes:jpg,jpeg,png',
           
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
                $destino = public_path('images/about');
                $request->imagen->move($destino, $nombreFoto);
                $red = Image::make($destino.'/'.$nombreFoto);
                $red->resize(200,null, function($constraint){
                $constraint->aspectRatio();
            });
            $red->save($destino.'/thumbs/'.$nombreFoto);
                unlink($destino.'/'.$imagenPrevia);
                unlink($destino.'/thumbs/'.$imagenPrevia);
                $sobre->imagen=$nombreFoto; 
    
              }

              $sobre->descripcion= $request->descripcion;
             
              $sobre->save();

              return redirect('/admin/sobreNosotros')->with('Result',[
                'status' => 'success',
                'content' => ' Modificado con exito'
            ]);
    }
    }

  
    public function get_sobreNosotros()
    {
        $sobreNosotros = SobreNosotros::all();      
        return view('web.sobreNosotros',compact('sobreNosotros')); 
    }
}
