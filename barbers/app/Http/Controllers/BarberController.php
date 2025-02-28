<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::all();
        return response()->json($barbers, 202);
        
    }
    public function store(Request $request)
    {
        $request ->validate([
            "name"=> "required|255|string",
            "barber_id"=> "required|255|number",
            "appointment"=> "required|255|date"
            ]);
        if(Barber::create($request->all()))
        {
            return response()->json([["uzenet"=> "Sikeres Rögzítés"]]);
        }
        else
        {
            return response()->json([["uzenet"=> "Sikertelen Rögzítés"]]);
        }
        
    }
    public function destroy($id)
    {
        $appointment = Barber::find($id);
        $appointment->delete();

        if(response()->json(["success"=> true]))
        {
            return response()->json(["uzenet"=> "Sikeres Törlés"]);
        }
        else
        {
            return response()->json([["uzenet"=> "Sikertelen törlés"]]);
        }
    }

}
