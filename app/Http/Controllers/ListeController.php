<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListeController extends Controller
{

    public function index()
    {
        return view('pages/index');
    }

    public function formulaire(Request $request)
    {


        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $telephone = $request->input('telephone');


        $donnees = session('donnees', []);

        $nouvelleDonnees =
            [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
            ];

        $donnees[] = $nouvelleDonnees;

        session(['donnees' => $donnees]);

        //return redirect()->route('pages/index');


        return view('pages/index')->with('donnees', $donnees);

        
        /* $donnees = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
        ];*/
    }

    public function supprimer(Request $request)
    {
        //recuperer donnees
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $telephone = $request->input('telephone');


        //recuperer tableau de donnees session
        $donnees = session('donnees', []);

        //parcourir le tavleau et chercher element 
        foreach ($donnees as $index => $element) {
            if (
                $element['nom'] === $nom &&
                $element['prenom'] === $prenom &&
                $element['email'] === $email &&
                $element['telephone'] === $telephone
            ) {
                unset($donnees[$index]);
            }
        }

        //reorganiser tableau
        $donnees = array_values($donnees);

        //enregistrer mise à jour
        session(['donnees' => $donnees]);

        //redirection
        return redirect()->route('index');
    }




    //
    // function index()
    // {
    //     return view('pages/index');
    // }

    //     public function index(Request $request)
    //     {
    //         $donnees=[
    //             'nom'=> $request-> input('nom'),
    //             'prenom'=> $request-> input('prenom'),
    //             'email'=> $request-> input('email'),
    //             'telephone'=> $request-> input('telephone'),
    //         ];

    //         
    //     }
}
