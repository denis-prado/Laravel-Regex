<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Carro;
use App\Service\CarroService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarroController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(Request $request)
    {
        $vehiclesList = CarroService::requestVehiclesSite($request->termo);

        if ($vehiclesList) {
            Carro::insert($vehiclesList);

            return redirect()->route('carros.index');
        } else {
            return view('carros.falha');
        }
    }

    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carros.index');
    }

}
