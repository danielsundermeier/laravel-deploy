<?php

use D15r\Deployment\Http\Controllers\DeploymentController;
use Illuminate\Support\Facades\Route;

Route::post('/deploy', [DeploymentController::class, 'store']);

?>