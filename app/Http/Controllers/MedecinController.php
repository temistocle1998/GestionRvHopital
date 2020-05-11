<?php

namespace RvHopital\Http\Controllers;

use RvHopital\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('medecin.add');
    }
    public function getAll()
    {
        // pagination en laravel
        $liste_medecins = Medecin::paginate(5);
        //$liste_medecins = Medecin::all();
        return view('medecin.list', ['liste_medecins' => $liste_medecins]);
    }
    public function edit($id)
    {
        $medecin = Medecin::find($id);
        return view('medecin.edit', ['medecin' => $medecin]);
    }
    public function update(Request $request)
    {
        $medecin = Medecin::find($request->id);
        $medecin->nom = $request->nom;
        $medecin->prenom = $request->prenom;
        $medecin->telephone = $request->telephone; 
        $result = $medecin->save();//1 ou 0
        return redirect ('/medecin/getAll');
        return $this->getAll();
    }
    public function delete($id)
    {
        $medecin = Medecin::find($id);
         if( $medecin != null)
         {
             $medecin->delete();
         }
        return $this->getAll();
    }
    public function persist(Request $request)
    {
        // $medecin = new Medecin();
        // $medecin->nom = $request->nom;
        // $medecin->prenom = $request->prenom;
        // $medecin->telephone = $request->telephone;

        //$result = $medecin->save();//1 ou 0

        $data = request()->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:5',
            'telephone' => 'required'
        ]);

        $result = Medecin::create($data);

        return view('medecin.add')->with('message', 'Medecin ajouté');
    }
}
