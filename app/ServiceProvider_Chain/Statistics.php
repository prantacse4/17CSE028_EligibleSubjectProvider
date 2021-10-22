<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Statistics extends Service{

    public function Eligilibility($request=null)
    {
        if($request->hsc_math == 1)
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Statistics'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Statistics']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>