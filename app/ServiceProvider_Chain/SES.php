<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class SES extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_chem > 5 )
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Soil and Environmental Science'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Soil and Environmental Science']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>