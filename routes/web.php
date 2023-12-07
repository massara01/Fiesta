<?php
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\serviiceController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\temoignageController;
use App\Http\Controllers\TypeServiceController;
use App\Models\serviice;
use App\Http\Controllers\ControllerAbonnement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactsController;
use App\Models\TypeService;
use App\Models\Abonnement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    return view('test');
});

Route::get('/client', function () {
    return view('Client/HomeClient');
});

Route::get('/', function () {
    $ListeInverse=Serviice::orderBy('id', 'desc')->get();
    
    $services = $ListeInverse->reverse();

    $services->all();
    $types=TypeService::all();
    $packs=Abonnement::all();
    return view('welcome',compact('services','types','packs'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/private', function () {
        return 'bonjour admin';
    });
});




Route::get('/checkout', function () {
    return view('/front/Cart/checkout');
})->name('checkout');
Route::post('/Reservation', [StripeController::class, 'AjouterReservation']);


Route::resource('/cart', 'CartController');
Route::get('/cart/add/{id}',[CartController::class,'create'])->name('cart.add');
Route::get('/cart/addPack/{id}',[CartController::class,'create_pack'])->name('cart.add.pack');
Route::post('/cart/edit/{id}',[CartController::class,'update']);




Route::middleware(['auth','role:client|prestataire'])->group(function () {
    //user account
    Route::get('/account',  [ClientController::class ,'show'])->name('get.user.account');
    Route::get('/account/edit',  [ClientController::class ,'edit'])->name('get.user.edit');
    Route::POST('/account/update',  [ClientController::class ,'update'])->name('get.user.update');
});


Route::middleware(['auth','role:client'])->group(function () {
   
    Route::view('/add', 'AjoutAbonnement');
    Route::post('add', [ControllerAbonnement::class, 'AjouterAbonnement']);
    //Route::get('/Abonnements', [ControllerAbonnement::class, 'ListReservation'])->name('AbonnementList');

    Route::get('edit/{idAb}', [ControllerAbonnement::class, 'modifier']);
    Route::put('edit/{idAb}', [ControllerAbonnement::class, 'ModifierAbonnement']);

    Route::get('delete/{idAb}',  array('as' => 'id', 'uses' => 'App\Http\Controllers\ControllerAbonnement@SupprimerAbonnement'));

    Route::get('/checkout', function () {return view('/front/Cart/checkout');})->name('checkout');

    
    Route::get('/Reservation', [ReservationController::class, 'ListReservation'])->name('AbonnementList');
    Route::get('Recu/{idR}',  [ReservationController::class,'generatePDF'] ); 


});

//________ service________//

Route::get('/services', [serviiceController::class,'list'])->name('service.show.list');
Route::get('/services/details/{id}', [serviiceController::class,'detailsService'])->name('service.show.details');

Route::get('/packs', [ControllerAbonnement::class,'index'])->name('packs.show.list');

Route::middleware(['auth','role:prestataire'])->group(function () {

    //________ service________//

    Route::get('/account/services', [serviiceController::class,'showByUser'])->name('service.show.account');
    
    Route::get('/account/createS', [serviiceController::class,'store'])->name('service.store');
    Route::post('/createS', [serviiceController::class,'create'])->name('service.add');

});




Route::get('/listservice', [serviiceController::class,'list']);

//________categorie____________
Route::get('/categorie', [TypeServiceController::class,'list']);
Route::post('/addC', [TypeServiceController::class,'create']);
Route::get('editC/{id}', [TypeServiceController::class, 'edit']);
Route::put('editC/editCat/{id}', [TypeServiceController::class, 'edit2']);

Route::get('deleteC/{id}',  array('as' => 'id', 'uses' => 'App\Http\Controllers\TypeServiceController@destroy'));

//_________temoignage___________


//Route::view('addTemoignage/{id}', 'temoignage/{id}');
Route::post('temoignage/addTemoignage/{id}', [temoignageController::class,'create'])->name('temoignage.add');

Route::get('temoignage/{id}', [temoignageController::class,'show']);


//_________________Payment______________
Route::get ( '/card', function () {
    return view ( 'cardForm' );
} );
Route::post ( '/', [StripeController::class,'call'] );
Route::get('/Recu',  [StripeController::class,'generatePDF'] ); 

//________Reservation__________


// admin
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {


    //users
    Route::get('/users/list',  [ClientController::class ,'index'])->name('list.admin.users');
    Route::get('/users/add',  [ClientController::class ,'add'])->name('add.admin.users');
    Route::post('/users/store',  [ClientController::class ,'store'])->name('store.admin.users');
    Route::get('/users/edit/{id}',  [ClientController::class ,'edit_back'])->name('edit.admin.users');
    Route::post('/users/update/{id}',  [ClientController::class ,'update_back'])->name('update.admin.users');
    Route::DELETE('/users/delete/{id}',  [ClientController::class ,'destroy'])->name('destroy.admin.users');

    //services
    Route::get('/services/list',  [serviiceController::class ,'list_back'])->name('list.admin.services');
    Route::get('/services/add',  [serviiceController::class ,'store_back'])->name('add.admin.services');
    Route::post('/services/store',  [serviiceController::class ,'create_back'])->name('store.admin.services');
    Route::get('/services/edit/{id}',  [serviiceController::class ,'edit_back'])->name('edit.admin.services');
    Route::post('/services/update/{id}',  [serviiceController::class ,'update_back'])->name('update.admin.services');
    Route::DELETE('/services/delete/{id}',  [serviiceController::class ,'destroy'])->name('destroy.admin.services');


    //type services
    Route::get('/categories/list',  [TypeServiceController::class ,'index'])->name('list.admin.categories');
    Route::get('/categories/add',  [TypeServiceController::class ,'add'])->name('add.admin.categories');
    Route::post('/categories/store',  [TypeServiceController::class ,'storee'])->name('store.admin.categories');
    Route::DELETE('/categories/delete/{id}',  [TypeServiceController::class ,'destroyy'])->name('destroy.admin.categories');

    //temoignage
    Route::get('/temoignages/list',  [temoignageController::class ,'index'])->name('list.admin.temoignages');
    Route::get('/temoignages/add',  [temoignageController::class ,'add'])->name('add.admin.temoignages');
    Route::post('/temoignages/store',  [temoignageController::class ,'storee'])->name('store.admin.temoignages');
    Route::post('/temoignages/valider/{id}',  [temoignageController::class ,'validate_temoi'])->name('valide.admin.temoignages');
    Route::post('/temoignages/annuler{id}',  [temoignageController::class ,'anuuler'])->name('annuler.admin.temoignages');
    Route::DELETE('/temoignages/delete/{id}',  [temoignageController::class ,'destroyy'])->name('destroy.admin.temoignages');


     //type services
     Route::get('/packs/list',  [ControllerAbonnement::class ,'index_back'])->name('list.admin.packs');
     Route::get('/packs/add',  [ControllerAbonnement::class ,'add'])->name('add.admin.packs');
     Route::post('/packs/store',  [ControllerAbonnement::class ,'store'])->name('store.admin.packs');
     Route::get('/packs/edit/{id}',  [ControllerAbonnement::class ,'edit'])->name('edit.admin.packs');
     Route::post('/packs/update/{id}',  [ControllerAbonnement::class ,'update'])->name('update.admin.packs');
     Route::DELETE('/packs/delete/{id}',  [ControllerAbonnement::class ,'destroy'])->name('destroy.admin.packs');

     //Réservation
     Route::get('/reservation/list',  [ReservationController::class ,'ListReservation_back'])->name('list.admin.reservation');

 
});
     
//contactForm
Route::get('/contacts', [ContactsController::class, 'view'])->name('contact.view');
Route::POST('/contact', [ContactsController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';
