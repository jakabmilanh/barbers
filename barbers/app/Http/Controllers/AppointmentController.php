<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Validation\ValidationException;
class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments, 202);
        
    }
    public function store(Request $request)
    {   try {
        $request ->validate([
            "name"=> "required|max:255|string",
            "barber_id"=> "required|max:255|integer|exists:barbers,id",
            "appointment"=> "required|max:255|date"
            ]);
    } catch (ValidationException $th) {
       return response()->json([$th->errors()], 400);
    }
        
        if(Appointment::create($request->all()))
        {
            return response()->json([["uzenet"=> "Sikeres Rögzítés"]]);
        }
        else
        {
            return response()->json([["uzenet"=> "Sikertelen Rögzítés"]]);
        }
        
    }
    public function destroy(Request $request)
    {
        $appointment = Appointment::find($request->id);
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
