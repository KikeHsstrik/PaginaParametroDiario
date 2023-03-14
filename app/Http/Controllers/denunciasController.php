<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\denuncias_si_anonimasModel;
use App\Models\denuncias_no_anonimasModel;

class denunciasController extends Controller
{
    public function storeAnonima(Request $request)
    {
        $this->validate($request, [
            'texto_denuncia_anonima_si'=>'required|min:5 ',
            'num_tel_denuncia_anonima_si' => 'required|numeric|min:7' ],[
            
            'num_tel_denuncia_anonima_si.required' => 'El número de teléfono es requerido',
            'num_tel_denuncia_anonima_si.numeric' => 'El campo de teléfono debe ser solo números'
            
            ]
    
    );

    
        
        $denuncia_si_anonima = new denuncias_si_anonimasModel;
        $denuncia_si_anonima->texto_denuncia_anonima_si = $request->texto_denuncia_anonima_si;
        $denuncia_si_anonima->num_tel_denuncia_anonima_si = $request->num_tel_denuncia_anonima_si;
    
        $denuncia_si_anonima->save();
    
        return redirect()->route('addDenuncia')->with('success','Denuncia enviada correctamente');
        
    }


    public function storeNoAnonima(Request $request)
    {
        

    
        
        $denuncia_no_anonima = new denuncias_no_anonimasModel;
        $denuncia_no_anonima->texto_denuncia_anonima_no = $request->texto_denuncia_anonima_no;
        $denuncia_no_anonima->nombre_usuario_denuncia_anonima_no = $request->nombre_usuario_denuncia_anonima_no;
        $denuncia_no_anonima->apellido_usuario_denuncia_anonima_no = $request->apellido_usuario_denuncia_anonima_no;
        $denuncia_no_anonima->dirección_usuario_denuncia_anonima_no = $request->dirección_usuario_denuncia_anonima_no;
        $denuncia_no_anonima->lugar_usuario_denuncia_anonima_no = $request->lugar_usuario_denuncia_anonima_no;
        $denuncia_no_anonima->num_tel_denuncia_anonima_no = $request->num_tel_denuncia_anonima_no;
        $denuncia_no_anonima->correo_usuario_denuncia_anonima_no = $request->correo_usuario_denuncia_anonima_no;
        $denuncia_no_anonima->save();
    
        return redirect()->route('addDenunciano')->with('success','Denuncia enviada correctamente');
        
    }
    
    public function denuncia_ciudadana()
    {
        $denuncia_ciudadana = denuncias_si_anonimasModel::all();
        return view('denuncia_ciudadana', compact('denuncia_ciudadana'));
    }
   
    public function denuncia__ciudadana()
    {
        $denuncia__ciudadana = denuncias_no_anonimasModel::all();
        return view('denuncia__ciudadana', compact('denuncia__ciudadana'));
    }
    
   
}
