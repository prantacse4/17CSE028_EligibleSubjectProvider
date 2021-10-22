<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Mathematics extends Service{

    public function Eligilibility($request=null)
    {
        if($request->hsc_math == 1 && $request->gst_math > 5 )
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Mathematics'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Mathematics']]);
            }
        }
        return $this->setNextEligible($request);

    }
}



?>