<?php

namespace App\ServiceProvider_Chain;

use Illuminate\Http\Request;
use App\ServiceProvider_Chain\ChainInterface;

abstract class Service implements ChainInterface{
    protected $nextChain;

    public function setNextChain(ChainInterface $nextChain)
    {
        $this->nextChain = $nextChain;
    }
    public function setNextEligible($request)
    {
        if($this->nextChain){
            return $this->nextChain->Eligilibility($request);
        }
    }

}



?>