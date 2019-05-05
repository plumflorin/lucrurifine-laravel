<?php

namespace App\Http\Controllers;

use App\Produse;
use App\Imagini;
use App\Categorii;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;


class ProduseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorii = Categorii::All();
        $produse = Produse::with('categorii', 'imagini')->get();
        //$imagini = Imagini::All();
        return view('admin.viewprod', compact('produse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {

        $categorii = Categorii::All();

        return view('admin.adaugprod', ['categorii' => $categorii]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nume'=>'required',
            'descriere'=>'required',
            'pret'=> 'required|numeric',
            'pret2'=> 'nullable|numeric',
            'categorie' => 'required',
          ]);

        $produs = new Produse;
        $produs->nume_produs = $request->nume;
        $produs->descriere_produs = $request->descriere;
        $produs->pret_produs = $request->pret;
        $produs->pret_vechi_produs = $request->pret2;
        $produs->id_categorie_produs = $request->categorie;
                
         
        
        
         if ($produs->save()) {
            $id = $produs->id;
            $folder = $id . '_' . date('d.m.Y_H-i-s');
               
            $images = $request->file('images');

            foreach ($images as $image) {
                
            $path = $image->store('public/images/'.$folder);
            //Storage::putFileAs('image', new File($directory), '5.jpg');
            //$file = $request->file('image') ? $request->file('image')->store($directory. '/') : null;
            $file = basename($path);
            //echo $file .'<br>';
            //echo $directory .'<br>';
            //echo $path .'<br>';
                
            $imagine = new Imagini;
            $imagine->id_produs_imagine = $id;
            $imagine->folder_imagine = $folder;
            $imagine->nume_imagine = $file;

            $imagine->save();
            
        }

        Session::flash('success', 'Produsul a fost adaugat!');
        return redirect('/produse');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Produse  $produse
     * @return \Illuminate\Http\Response
     */
    public function show(Produse $produse)
    {
        $produs = Produse::with('imagini')->find($produse);

        $delfolder = storage_path('app/public/images/' . $produs[0]->imagini[0]->folder_imagine);
        return dd($delfolder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produse  $produse
     * @return \Illuminate\Http\Response
     */
    public function edit(Produse $produse)
    {
        $produs = Produse::find($produse);
        $categorii = Categorii::All();
        return view('admin.modifprod', compact('produs', 'categorii'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produse  $produse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produse)
    {
         $produs = Produse::find($produse);
         $request->validate([
            'nume'=>'required',
            'descriere'=>'required',
            'pret'=> 'required|integer',
            'categorie' => 'required',
          ]);
          
          $produs->update([
          'nume_produs' => $request->nume,
          'descriere_produs' => $request->descriere,
          'pret_produs' => $request->pret,
          'pret_vechi_produs' => $request->pret2,
          'id_categorie_produs' => $request->categorie
          ]);
          //$produs->save();
          Session::flash('success', 'Produsul a fost actualizat!');
          return redirect('/produse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produse  $produse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produse::with('imagini')->find($id);
        $imagini = Imagini::where('id_produs_imagine', $id)->delete();
        
        $delfolder = $prod->imagini[0]->folder_imagine;

        $prod->delete();

        
        File::deleteDirectory(public_path('storage/images/' . $delfolder));
        
        Session::flash('success', $delfolder);
        
    }
}
