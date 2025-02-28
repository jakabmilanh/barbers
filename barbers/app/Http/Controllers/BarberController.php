<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::all();
        return response()->json($barbers, 202, [JSON_UNESCAPED_UNICODE]);
        
    }
    public function store(Request $request)
    {
        $request ->validate([
            "barber_name"=> "required|max:255|string",
            ]);
        if(Barber::create($request->all()))
        {
            return response()->json(["uzenet"=> "Sikeres Rögzítés"], 202, [JSON_UNESCAPED_UNICODE]);
        }
        else
        {
            return response()->json(["uzenet"=> "Sikertelen Rögzítés"], 202, [JSON_UNESCAPED_UNICODE]);
        }
        
    }
    public function destroy(Request $request)
    {
        $appointment = Barber::find($request->id);
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
