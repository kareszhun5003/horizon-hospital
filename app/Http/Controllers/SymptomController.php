<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Symptom;

class SymptomController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $symptoms = Symptom::orderBy('name')->paginate(20);

        return view('symptoms.index')->withSymptoms($symptoms);
    }

     public function create()
    {
        return view('symptoms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $symptom = new Symptom;

        $symptom->name = $request->input('name');

        $symptom->save();

        return redirect()->route('symptoms.index')->with('success','Symptom added successfully');;
    }

     public function edit($id)
    {

        return view('symptoms.edit')->withSymptom(Symptom::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $symptom = Symptom::find($id);

        $symptom->name = $request->input('name');

        $symptom->save();

        return redirect()->route('symptoms.index')->with('success','Symptom updated successfully');;
    }


    public function destroy($id)
    {
        $symptom = Symptom::find($id);
        $symptom->delete();

        return redirect()->route('symptoms.index')
                        ->with('success','Symptom deleted successfully');
    }


}
