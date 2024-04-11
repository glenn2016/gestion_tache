<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Tache;
use App\Models\Objectif;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [ProfileController::class, 'link']);

Route::middleware(['auth', 'profile:directeurg'])->group(function () {
    Route::get('/directeurg.dashbord', function () {

        $ObjectifesPasFaites = Objectif::where('etat', 1)->get();
        $objectifsFaites = Objectif::where('etat', 2)->get();


        $tachesPasFaites = Tache::where('etat', 1)->get();
        $tachesFaites = Tache::where('etat', 2)->get();


        return view('directeurg.dashbord',['ObjectifesPasFaites' => $ObjectifesPasFaites, 'objectifsFaites' => $objectifsFaites,'tachesPasFaites' => $tachesPasFaites, 'tachesFaites' => $tachesFaites]);
    })->middleware(['auth', 'verified'])->name('directeurg.dashbord');
    Route::get('/menu', [UserController::class, 'menu']);
    Route::get('/menuf', [UserController::class, 'menuf']);
    Route::get('/ajoutres', [UserController::class, 'ajoutres']);
    Route::post('/ajoutresponsables', [UserController::class, 'ajoutResponsable']);
    Route::post('/ajoutsobjectifss', [UserController::class, 'store']);
    Route::get('/ajoutsobjectifs', [UserController::class, 'ajoutsobjectifs']);
    Route::get('/listesobjectifes', [UserController::class, 'listesobjectifes']);   
    Route::get('/listesusers', [UserController::class, 'listesusers']);
    Route::get('/listeemploye', [UserController::class, 'getResponsableUsers']);
    Route::get('/objectif/{id}/tachess', [UserController::class, 'showTachesresponsavle  '])->name('objectif.tachess');
});


Route::middleware(['auth', 'profile:responsable'])->group(function () {
    Route::get('/responsable.dashbord', function () {

        return view('responsable.dashbord');
    })->middleware(['auth', 'verified'])->name('responsable.dashbord');
    Route::get('/responsable.menu', [UserController::class, 'menuresponsable']);
    Route::get('/responsable.menuf', [UserController::class, 'menufresponsable']);
    Route::get('/mesobjectifs', [UserController::class, 'mesobjectifs']);
    Route::get('/ajouttaches', [UserController::class, 'ajouttaches']);
    Route::post('/ajouttachess', [UserController::class, 'ajouttachess']);
    Route::get('/objectif/{id}/taches', [UserController::class, 'showTaches'])->name('objectif.taches');
    Route::get('/listemployeres', [UserController::class, 'listeemployes']);
    Route::get('/ajoutemploye', [UserController::class, 'ajoutemploye']);

    Route::post('/ajoutemployesss', [UserController::class, 'ajoutemployerst']);

});

Route::middleware(['auth', 'profile:employe'])->group(function () {
    Route::get('/employe.dashbord', function () {

        $userId = Auth::id();

        $tachesPasFaites = Tache::where('etat', 1)->where('user_id', $userId)->get();
        $tachesFaites = Tache::where('etat', 2)->where('user_id', $userId)->get();

        return view('employe.dashbord', ['tachesPasFaites' => $tachesPasFaites, 'tachesFaites' => $tachesFaites]);
    })->middleware(['auth', 'verified'])->name('employe.dashbord');
    Route::get('/employeempmenu', [EmployeController::class, 'empmenu']);
    Route::get('/employeempmenuf.', [EmployeController::class, 'empmenuf']);
    Route::get('/mestaches', [EmployeController::class, 'mestaches']);
    Route::put('/update-tache/{id}', [EmployeController::class, 'update'])->name('update.tache');


});


require __DIR__.'/auth.php';
