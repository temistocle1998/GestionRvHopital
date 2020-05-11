<?php

namespace RvHopital\Http\Controllers;

use RvHopital\Medecin;
use RvHopital\Rendezvouss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        $medecins = Medecin::all();
        return view('rendezvous.add', ['medecins' => $medecins]);
    }
    public function getAll()
    {
        $liste_rendezvous = Rendezvouss::all();
        return view('rendezvous.list', ['liste_rendezvous' => $liste_rendezvous]);
    }
    public function edit($id)
    {
        $rendezvous = Rendezvouss::find($id);
        return view('rendezvous.edit', ['rendezvous' => $rendezvous]);
    }
    public function update(Request $request)
    {
        $rendezvous = rendezvouss::find($request->id);
        $rendezvous->nom = $request->nom;
        $rendezvous->date = $request->date;
        $rendezvous->medecins = $request->medecins; 
        $rendezvous->user = Auth::id();
        
        
        $result = $rendezvous->save();//1 ou 0
        return redirect ('/rendezvous/getAll');
        return $this->getAll();
    }
    public function delete($id)
    {
        $rendezvous = Rendezvouss::find($id);
         if( $rendezvous != null)
         {
             $rendezvous->delete();
         }
         return redirect ('/rendezvous/getAll');
        }
    public function persist(Request $request)
    { 
        $rendezvous = new Rendezvouss();
        $rendezvous->libelle = $request->libelle;
        $rendezvous->date = $request->date;
        $rendezvous->medecin = $request->medecin;
        $rendezvous->user = Auth::id();

        $result = $rendezvous->save();//1 ou 0
        $medecins = Medecin::all();
        return view('rendezvous.add', ['confirmation' => $result, 'medecins' => $medecins]);
    }
}