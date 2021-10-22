<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Physics extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_phy > 5 )
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Physics'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Physics']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>