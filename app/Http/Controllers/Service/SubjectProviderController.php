<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\ServiceProvider_Chain\Biochemistry_and_Biotechnology;
use App\ServiceProvider_Chain\Botany;
use App\ServiceProvider_Chain\Chemistry;
use App\ServiceProvider_Chain\Costal_Studies_DM;
use App\ServiceProvider_Chain\CSE;
use App\ServiceProvider_Chain\Geology_and_Mining;
use App\ServiceProvider_Chain\Mathematics;
use App\ServiceProvider_Chain\Physics;
use App\ServiceProvider_Chain\SES;
use App\ServiceProvider_Chain\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Valid;


class SubjectProviderController extends Controller
{


    public function getEligibleSubjects(Request $request)
    {
        $rulse_validation = Valid::make($request->all(),[
            'hsc_math' => 'required|boolean',
            'hsc_bio' => 'required|boolean',
            'gst_phy' => 'required|numeric|min:0|max:20',
            'gst_chem' => 'required|numeric|min:0|max:20',
            'gst_bio' => 'required|numeric|min:0|max:20',

        ],
        [
            'hsc_math.boolean' => 'HSC Math field should be in 1 or 0',
            'hsc_bio.boolean' => 'HSC Biology Field  should be in 1 or 0',
            'gst_phy.boolean' => 'GST Physics score must be in numeric',
            'gst_chem.boolean' => 'GST Chemistry score must be in numeric',
            'gst_bio.boolean' => 'GST Biology score must be in numeric',
        ]);
        if ($rulse_validation->fails()) {
            return response()->json($rulse_validation->errors(), 422);
        }

        $math = new Mathematics();
        $chem = new Chemistry();
        $phy = new Physics();
        $gml = new Geology_and_Mining();
        $cse = new CSE();
        $stat = new Statistics();
        $ses = new SES();
        $botany = new Botany();
        $cdm = new Costal_Studies_DM();
        $biochem = new Biochemistry_and_Biotechnology();
        
        try {
            $math->setNextChain($chem);
            $chem->setNextChain($phy);
            $phy->setNextChain($gml);
            $gml->setNextChain($cse);
            $cse->setNextChain($stat);
            $stat->setNextChain($ses);
            $ses->setNextChain($botany);
            $botany->setNextChain($cdm);
            $cdm->setNextChain($biochem);

            $math->Eligilibility($request);
        }
        catch (\Throwable $th){
            return response()->json("No Eligible Subjects", 404);
        }

        if($request['el_subjects'] == ''){
            return response()->json("No Eligible Subjects", 404);
        }
        
        return response()->json($request['el_subjects'], 200);
    }
}
