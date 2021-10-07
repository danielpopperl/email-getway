<?php

namespace App\Http\Controllers;

use App\Models\Sensedia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getF() {
        $model = new Sensedia();
        $modelAtt = $model->getFillable();
        dd($modelAtt);

        // foreach($model as $key => $value){
        //     print($value);
        // }

    }
}
