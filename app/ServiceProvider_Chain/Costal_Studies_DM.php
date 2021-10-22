<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Costal_Studies_DM extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_phy > 5 || $request->gst_math >6)
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Costal Studies and Disaster Management'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Costal Studies and Disaster Management']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>