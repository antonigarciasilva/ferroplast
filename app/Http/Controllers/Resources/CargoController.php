<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    
    public function index()
    {
        $cargo=Cargo::get();
        return $cargo;
    }
    
    public function store(Request $request)
    {
        $messages = [
            'cargo.required' => 'El cargo es requerido',
            'sueldo.required' => 'El sueldo es requerido',
            'sueldo.numeric' => 'El sueldo debe ser numérico',
        ];

        $rules = [
            'cargo' => 'required',
            'sueldo' => 'required|numeric',
        ];
        $this->validate($request, $rules, $messages);
        Cargo::create($request->all());
        return;
    }


  
    public function update(Request $request, $id)
    {
        $messages = [
            'cargo.required' => 'El cargo es requerido',
            'sueldo.required' => 'El sueldo es requerido',
            'sueldo.numeric' => 'El sueldo debe ser numérico',
        ];

        $rules = [
            'cargo' => 'required',
            'sueldo' => 'required|numeric',
        ];
        $this->validate($request, $rules, $messages);
        cargo::find($id)->update($request->all());
        return;
    }

   
    public function destroy($id)
    {
        $cargo = Cargo::find($id);
        $cargo->delete();
    }
}
