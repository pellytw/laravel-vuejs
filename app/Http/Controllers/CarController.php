<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'brand'=>'required',
        'model'=> 'required',
        'description'=> 'required',
        'price' => 'required'
      ]);
      $car = new Car([
        'brand' => $request->get('brand'),
        'model' => $request->get('model'),
        'description'=> $request->get('description'),
        'price'=> $request->get('price')
      ]);
      $car->save();
      return redirect('/cars')->with('success', 'El auto se ha creado correctamente');
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
        $car = Car::find($id);

        return view('cars.edit', compact('car'));
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
    
      $request->validate([
        'brand'=>'required',
        'model'=> 'required',
        'description'=> 'required',
        'price' => 'required'
      ]);

      $car = Car::find($id);
      $car->brand = $request->get('brand');
      $car->model = $request->get('model');
      $car->description = $request->get('description');
      $car->price = $request->get('price');
      $car->save();

      return redirect('/cars')->with('success', 'El auto se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect('/cars')->with('success', 'El auto se ha eliminado correctamente');
    }
}
