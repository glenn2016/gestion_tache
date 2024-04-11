<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Objectif;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use App\Models\Tache;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function menu()
    {
        return view('directeurg.resmenu');
    }
    public function menuf()
    {
        return view('directeurg.resmenuf');
    }
    public function menuresponsable()
    {
        return view('responsable.menu');
    }
    public function menufresponsable()
    {
        return view('.menuf');
    }
    public function ajoutres()
    {
        $profiles = Profile::all();
        return view('directeurg.ajoutres', ['profiles' => $profiles]);
    }

    public function ajoutResponsable(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'profile' => 'required|exists:profiles,id',
        ]);
        $user = User::create([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'prenom' => $request->prenom,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $profile = Profile::findOrFail($request->profile);
        $user->profiles()->attach($profile);
    
        return redirect()->back();
    }
    

    public function ajoutsobjectifs()
    {
        // Récupérer le profil "responsable"
        $responsable = Profile::where('nom', 'responsable')->first();

        // Vérifier si le profil "responsable" existe
        if ($responsable) {
            // Récupérer tous les utilisateurs ayant le profil "responsable"
            $responsableUsers = $responsable->users()->get();

            // Retourner les utilisateurs récupérés à la vue 'directeurg.ajoutsobjectifs'
            return view('directeurg.ajoutsobjectifs', ['responsableUsers' => $responsableUsers]);
        } else {
            // Si le profil "responsable" n'existe pas, vous pouvez gérer cette situation comme nécessaire
            return "Le profil 'responsable' n'existe pas.";
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom_objectifs' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'date_fin' => ['required', 'string', 'max:255'], 
            'user_id' => ['required', 'integer',],
        ]);

        
        $Objectif = new Objectif();
        $Objectif->nom_objectifs = $request->input('nom_objectifs');
        $Objectif->description = $request->input('description');
        $Objectif->date_fin = $request->input('date_fin');
        $Objectif->user_id = $request->input('user_id');
        $Objectif->supression = 1;
        $Objectif->etat = 1;
        $Objectif->save();
        return redirect()->back();
    }
    public function listesobjectifes()
    {
        // Récupérer tous les objectifs
        $objectifs = Objectif::all();
        return view('directeurg.listesobjectifes', ['objectifs' => $objectifs]);
    }
    public function mesobjectifs()
    {
        $userId = Auth::id();

        $objectifs = Objectif::where('user_id', $userId)->get();

        return view('responsable.mesobjectifs', ['objectifs' => $objectifs]);
    
    }

    public function ajouttaches()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();
    
        // Récupérer les objectifs de l'utilisateur connecté
        $objectifs = Objectif::where('user_id', $userId)->get();
    
        // Récupérer les utilisateurs avec le profil 'employe'
        $responsable = Profile::where('nom', 'employe')->first();
    
        if ($responsable) {
            // Récupérer les utilisateurs ayant le profil 'employe'
            $responsableUsers = $responsable->users()->get();
    
            // Retourner la vue avec les objectifs de l'utilisateur connecté et les utilisateurs ayant le profil 'employe'
            return view('responsable.ajouttaches', [
                'objectifs' => $objectifs,
                'responsableUsers' => $responsableUsers
            ]);
        } else {
            // Retourner un message si le profil 'responsable' n'existe pas
            return "Le profil 'responsable' n'existe pas.";
        }
    }

    public function ajouttachess(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'objectif_id' => ['required', 'integer',],
            'date_fin' => ['required', 'string', 'max:255'], 
            'user_id' => ['required', 'integer',],
        ]);
        $tache = new Tache();
        $tache->description = $request->input('description');
        $tache->objectif_id = $request->input('objectif_id');
        $tache->date_fin = $request->input('date_fin');
        $tache->user_id = $request->input('user_id');

        $tache->etat = 1;
        $tache->user_responsable = Auth::id();;
        $tache->save();
        return redirect()->back();
    }



    
    public function showTaches($id)
    {
        $objectif = Objectif::findOrFail($id);
        $taches = $objectif->taches()->get();

        return view('responsable.listestaches', ['objectif' => $objectif, 'taches' => $taches]);
    }

    public function showTachesresponsavle($id)
    {
        $objectif = Objectif::findOrFail($id);
        $taches = $objectif->taches()->get();

        return view('directeurg.showtache', ['objectif' => $objectif, 'taches' => $taches]);
    }



    public function listesusers()
    {

        $users = User::whereHas('profiles', function ($query) {
            $query->where('nom', 'responsable');
        })->get();

        return view('directeurg.listesusers',['users' => $users]);
    }

    public function getResponsableUsers()
    {
        
        $users = User::whereHas('profiles', function ($query) {
            $query->where('nom', 'employe');
        })->get();


        return view('directeurg.listeemploye', ['users' => $users]);
    }

    public function listeemployes()
    {
        
        $users = User::whereHas('profiles', function ($query) {
            $query->where('nom', 'employe');
        })->get();

        return view('responsable.listemployeres', ['users' => $users]);
    }

    public function ajoutemploye()
    {
        $profile = Profile::where('nom', 'employe')->first();
        return view('responsable.ajoutemploye', ['profiles' => $profile]);
    }

    public function ajoutemployerst(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'profile' => 'required|exists:profiles,id',
        ]);
        $user = User::create([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'prenom' => $request->prenom,
            'numero_telephone' => $request->numero_telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $profile = Profile::findOrFail($request->profile);
        $user->profiles()->attach($profile);
    
        return redirect()->back();
    }




}