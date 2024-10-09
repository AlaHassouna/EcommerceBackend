<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            $scategories = Scategorie::with("categorie")->get();
            return response()->json($scategories);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage(), $e->getCode());
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
            $scategorie = new Scategorie([
                "nomscategorie"=> $request->input("nomscategorie"),
                "imagescategorie"=> $request->input("imagescategorie"),
                "categorieID"=> $request->input("categorieID"),
            ]);
            $scategorie->save();
            return response()->json($scategorie);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage(), $e->getCode());
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
            $scategorie=Scategorie::with("categorie")->findOrFail($id);
            return response()->json($scategorie);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $scategorie = Scategorie::findOrFail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage(), $e->getCode());
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
            $scategorie = Scategorie::findOrFail($id);
            $scategorie->delete();
            return response()->json("Sous catégorie supprimée avec succées");
        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage(), $e->getCode());

        }
    }
}
