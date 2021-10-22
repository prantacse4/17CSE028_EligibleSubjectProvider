<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Geology_and_Mining extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_phy > 5 )
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Geology and Mining'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Geology and Mining']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>