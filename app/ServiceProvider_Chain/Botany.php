<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Botany extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_bio > 5  && $request->hsc_bio == 1)
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Botany'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Botany']]);
            }
        }
        return $this->setNextEligible($request);

    }
}


?>