<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Empleados;
use App\Cargo;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{

    public function index()
    {
        $empleados = Empleados::join('cargos', 'cargos.id', '=', 'empleados.cargo_id')
            ->select('empleados.*', 'cargos.cargo')
            ->orderBy('apellidos', 'ASC')
            ->get();
        return $empleados;
        
        $cargos = Cargo::orderBy('cargo', 'ASC')->get();
        return $cargos;
    }

    public function store(Request $request)
    {
        $messages = [
            'apellidos.required' => 'Los apellidos son requeridos',
            'nombres.required' => 'Los nombres son requeridos',
            'direccion.required' => 'La dirección es requerida',
            'dni.required' => 'El DNI es requerido',
            'dni.numeric' => 'El DNI debe ser numérico',
            'dni.max' => 'El DNI debe tener un máximo de 8 caracteres',
            'dni.min' => 'El DNI debe tener un mínimo de 8 caracteres',
            'telefono.required' => 'El teléfono es requerido',
            'telefono.numeric' => 'El telefono debe ser numérico',
            'telefono.max' => 'El telefono debe tener un máximo de 9 caracteres',
            'telefono.min' => 'El telefono debe tener un mínimo de 9 caracteres',
            'correo.required' => 'El correo electrónico es requerido',
            'cargo_id.required' => 'El cargo es requerido'
        ];

        $rules = [
            'apellidos' => 'required',
            'nombres' => 'required',
            'direccion' => 'required', 
            'dni' => 'required|numeric|max:8|min:8', 
            'telefono' => 'required|numeric|max:9|min:9', 
            'correo' => 'required', 
            'cargo_id' => 'required'
        ];
        $this->validate($request, $rules, $messages);
        Empleados::create($request->all());
        return;
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'apellidos.required' => 'Los apellidos son requeridos',
            'nombres.required' => 'Los nombres son requeridos',
            'direccion.required' => 'La dirección es requerida',
            'dni.required' => 'El DNI es requerido',
            'dni.numeric' => 'El DNI debe ser numérico',
            'dni.max' => 'El DNI debe tener un máximo de 8 caracteres',
            'dni.min' => 'El DNI debe tener un mínimo de 8 caracteres',
            'telefono.required' => 'El teléfono es requerido',
            'telefono.numeric' => 'El telefono debe ser numérico',
            'telefono.max' => 'El telefono debe tener un máximo de 9 caracteres',
            'telefono.min' => 'El telefono debe tener un mínimo de 9 caracteres',
            'correo.required' => 'El correo electrónico es requerido',
            'cargo_id.required' => 'El cargo es requerido'
        ];

        $rules = [
            'apellidos' => 'required',
            'nombres' => 'required',
            'direccion' => 'required', 
            'dni' => 'required|numeric|max:8|min:8', 
            'telefono' => 'required|numeric|max:9|min:9', 
            'correo' => 'required', 
            'cargo_id' => 'required'
        ];
        $this->validate($request, $rules, $messages);
        Empleados::find($id)->update($request->all());
        return;
    }

    public function destroy($id)
    {
        $empleados = Empleados::find($id);
        $empleados->delete();
    }
}
