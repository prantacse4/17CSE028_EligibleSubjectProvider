<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Chemistry extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_chem > 5 )
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Chemistry'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Chemistry']]);
            }
        }
        return $this->setNextEligible($request);

    }
}


?>