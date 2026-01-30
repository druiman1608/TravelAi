<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $data['descripcion'] = $request->input('descripcion') ?? 'Sin descripción';
            $data['imagen_url']  = $request->input('imagen_url')  ?? 'https://via.placeholder.com/300';
            $data['estrellas']   = (int) ($data['estrellas'] > 0 ? $data['estrellas'] : 1);
            $data['destination_id'] = (int) $request->input('destination_id');

            $validatedData = validator($data, [
                'nombre'         => 'required|string|max:255',
                'ciudad'         => 'required|string|max:255',
                'direccion'      => 'required|string|max:255',
                'estrellas'      => 'required|integer|min:1|max:5',
                'precio_noche'   => 'required|numeric|min:0',
                'destination_id' => 'required|exists:destinations,id',
                'descripcion'    => 'required|string',
                'imagen_url'     => 'required|string',
            ])->validate();

            $hotel = Hotel::create($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => '¡Hotel creado con éxito!',
                'hotel' => $hotel
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'debug' => $request->all()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
