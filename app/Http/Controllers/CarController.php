<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

use App\Http\Resources\CarCollection;
use App\Http\Resources\Car as CarResource;

use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;
use PDF;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Todos estos ejemplos andan
        //$cars = Car::all();
        
        //ejemplos de uso
        //este use es para el ejemplo que hay aca abajo: use Illuminate\Support\Facades\DB;
        #$cars = DB::table('cars')->paginate(5);

        //$cars = Car::where('brand', 'ford', 100)->paginate(15);

        //filtra solo por marcas por ahora
        $brand = $request -> input('query_filter');
        
        if ($brand){
            $cars = Car::ofBrand($brand)->paginate(5);
        }else{
            $cars = Car::paginate(20);
        }


        return view('cars.index', compact('cars'));

      
       // PARA DEVOLVER UN JSON USO ESTE RETURN
       // USAMOS API RESOURCES DE LA DOCUMENTACION OFICIAL. 
       // return new CarCollection(Car::all());




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
      return redirect('/backend/cars')->with('success', 'El auto se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {

        // DEVUELVE UN JSON PORQUE ESTAMOS USANDO EL RESOURCES
         return new CarResource(Car::find(1));
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

      return redirect('/backend/cars')->with('success', 'El auto se ha actualizado correctamente');
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

        return redirect('/backend/cars')->with('success', 'El auto se ha eliminado correctamente');
    }



    //Prueba para devolver un json
    public function get_cars(){
        return new CarCollection(Car::all());
    }


    public function openPDF()
    {
        $Cars = Car::orderBy('id','asc')->get();
       
        $view = \View::make('cars/carsPdf',['cars'=>$Cars]);
        $html_content = $view->render();
        PDF::SetTitle("List of cars");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        
        PDF::Output('carlist.pdf');    
    }
}
