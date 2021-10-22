<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\Service;

class Biochemistry_and_Biotechnology extends Service{

    public function Eligilibility($request=null)
    {
        if($request->gst_bio > 5  && $request->hsc_bio == 1)
        {
            if (!empty($request['el_subjects'])) {
                $request->merge(['el_subjects' => array_merge($request['el_subjects'],['Biochemistry and Biotechnology'])]);
            }
            else{
                $request->merge(['el_subjects'=>['Biochemistry and Biotechnology']]);
            }
        }
        return $this->setNextEligible($request);

    }
}

?>