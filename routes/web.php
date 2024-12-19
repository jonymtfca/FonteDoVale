<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use App\Mail\Reservation;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', function () {
    $startOfWeek = Carbon::now()->startOfWeek()->addDay(); // Start of week (e.g., Monday)
    $endOfWeek = Carbon::now()->endOfWeek();     // End of week (e.g., Sunday)

    // Fetch foods within this week
    $foods = Food::whereBetween('date', [$startOfWeek, $endOfWeek])
        ->orderBy('date')
        ->get();

    $menu = Food::query()
        ->where('is_menu', true)
        ->get();

    // Group foods by date
    $foodsGroupedByDate = $foods->groupBy(function ($food) {
        return Carbon::parse($food->date)->toDateString(); // Group by date string (YYYY-MM-DD)
    });


//    return $menu;

    return view('welcome', [
        'foodsGroupedByDate' => $foodsGroupedByDate,
        'menu' => $menu
    ]);
});

Route::get('/t', function () {
    return view('test');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/search', [DashboardController::class, 'search'])->middleware(['auth', 'verified'])->name('search');


Route::get('/food', [FoodController::class, 'index'])->middleware(['auth', 'verified'])->name('food');
Route::get('/food/create', [FoodController::class, 'create'])->middleware(['auth', 'verified'])->name('createFood');
Route::get('/food/{id}', [FoodController::class, 'edit'])->middleware(['auth', 'verified'])->name('editFood');
Route::post('/food', [FoodController::class, 'store'])->middleware(['auth', 'verified'])->name('storeFood');
Route::post('/food/{id}', [FoodController::class, 'update'])->middleware(['auth', 'verified'])->name('updateFood');
Route::post('/food/{id}/destroy', [FoodController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteFood');
Route::post('/update-date/{id}', [FoodController::class, 'updateDate'])->middleware(['auth', 'verified'])->name('updateDate');
Route::post('/clear-date/{id}', [FoodController::class, 'clearDate'])->middleware(['auth', 'verified'])->name('updateDate');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/reservation', function () {


//    $atributes = request()->validate([
//        'email' => 'required|email'
//    ]);
//    return $atributes;


    Mail::to('sofia@gmail.com')->send(new Reservation(request()->all()));

    return Redirect::to('/#book-a-table')->with('emailsent', 'Mensagem enviada com sucesso! Dentro de alguns minutos irá receber a confirmação da reserva. Obrigado pela preferência');

})->middleware(ProtectAgainstSpam::class);;

require __DIR__.'/auth.php';
