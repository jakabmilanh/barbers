<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments, 202);
        
    }
    public function store(Request $request)
    {
        $request ->validate([
            "name"=> "required|255|string",
            "barber_id"=> "required|255|number",
            "appointment"=> "required|255|date"
            ]);
        if(Appointment::create($request->all()))
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
        $appointment = Appointment::find($id);
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
