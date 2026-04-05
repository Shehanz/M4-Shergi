<?php

use App\Http\Controllers\Api\ArmadaPesawatTempurApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('armada-pesawat-tempur', ArmadaPesawatTempurApiController::class);
Route::put('/armada-pesawat-tempur/{id}', [ArmadaPesawatTempurApiController::class, 'update']);
