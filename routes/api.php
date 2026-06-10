use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CompteController;
use App\Http\Controllers\Api\TransactionController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [UserController::class,'profile']);

    Route::get('/comptes', [CompteController::class,'index']);
    Route::get('/comptes/{id}', [CompteController::class,'show']);

    Route::get('/transactions', [TransactionController::class,'index']);
    Route::post('/transactions', [TransactionController::class,'store']);

    Route::post('/logout', [AuthController::class,'logout']);
});
