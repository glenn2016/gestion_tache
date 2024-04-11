<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Objectif;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use App\Models\Tache;


class EmployeController extends Controller
{
    //
    
    
    public function empmenu()
    {
        return view('employe.empmenu');
    }
    public function empmenuf()
    {
        return view('employe.empmenuf');
    }


    public function mestaches()
    {

        $userId = Auth::id();

        $taches = Tache::where('user_id', $userId)->get();


        return view('employe.mestaches', ['taches' => $taches]);
    }

    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);
        $tache->etat = 2; 
        $tache->save();

        return redirect()->back()->with('success', 'La tâche a été mise à jour avec succès.');
    }

}