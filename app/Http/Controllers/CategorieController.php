<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $categories=Categorie::all();
            return response()->json($categories);
        }catch(\Exception $e){
            return response()->json("impossible d'afficher la liste des catégories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $categorie=new Categorie([
                "nomCategorie"=>$request->input("nomcategorie"),
                "imageCategorie" => $request ->input("imagecategorie"),
            ]);
            $categorie->save();
            return response()->json($categorie);
            
        } catch (\Exception $e) {
            //throw $th;
            return response()->json("Probléme d'ajout");
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try {
            //code...
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json("Probleme d'affichage");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie,$id)
    {
        //
        try {
            //code...
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json("Modification impossible");

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("Categorie supprimée avec succès");
        } catch (\Exception $e) {
            return response()->json("Suppresion impossible");
            //throw $th;
        }
    }
}
