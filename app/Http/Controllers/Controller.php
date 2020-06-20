<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Venoudev\Results\Traits\ApiResponser;

/**
* @OA\Info(title="API PruebaTecnicaqueo", description="API Rest desarrollada por https://venoudev.com Laravel 7.x ", version="1.0")
*
* @OA\Server(url="https://queo.venoudev.com")
*
*
*/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use ApiResponser;
}

