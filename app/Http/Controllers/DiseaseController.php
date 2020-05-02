<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disease;
use App\Symptom;
use App\SymptomDisease;

class DiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $diseases = Disease::orderBy('name')->paginate(20);
        $symptoms = Symptom::orderBy('name')->get();

        return view('diseases.index')->withDiseases($diseases)->withSymptoms($symptoms);
    }

     public function create()
    {
        return view('diseases.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $disease = new Disease;

        $disease->name = $request->input('name');

        $disease->save();

        return redirect()->route('diseases.index')->with('success','Disease added successfully');;
    }

     public function edit($id)
    {

        return view('diseases.edit')->withDisease(Disease::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $disease = Disease::find($id);

        $disease->name = $request->input('name');

        $disease->save();

        return redirect()->route('diseases.index')->with('success','Disease updated successfully');;
    }


    public function destroy($id)
    {
        $disease = Disease::find($id);
        $disease->delete();

        return redirect()->route('diseases.index')
                        ->with('success','Disease deleted successfully');
    }

    public function getSymptomsByDiseaseId($id){

        $disease = Disease::findOrFail($id);

        return response()->json(['symptoms' => $disease->symptoms]);
    }

    public function saveSymptomsForDisease(Request $request){
        $symId = $request->symptom_id;
        $disId = $request->disease_id;

        $duplicate = SymptomDisease::where([
                        ['disease_id', '=', $disId],
                        ['symptom_id', '=', $symId],
                    ])->exists();

        if ($duplicate) {
            return response('Duplicated data',409);
        }

        $pivot = new SymptomDisease;
        $pivot->disease_id = $disId;
        $pivot->symptom_id = $symId;
        $pivot->save();

        return response()->json(['success' => 'success'], 200);
    }

    public function deleteSymptomForDisease(Request $request){
        $symId = $request->symptom_id;
        $disId = $request->disease_id;

        $pivot = SymptomDisease::where([
                        ['disease_id', '=', $disId],
                        ['symptom_id', '=', $symId],
                    ])->first();

        if (!isset($pivot)) {
            return "Nincs ilyen model";
        }

        $pivot->delete();

        return response()->json(['success' => 'success'], 200);

    }


}
