<?php

namespace App\ServiceProvider_Chain;
use Illuminate\Http\Request;

interface ChainInterface
{
    public function setNextChain(Chaininterface $nextChain);
    public function Eligilibility(Request $request);
}



?>