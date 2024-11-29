<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalLinkController extends Controller
{
    public function redirectToExternal()
    {
        return redirect()->away('https://www.amazon.co.jp/?&tag=hydraamazonav-22&ref=pd_sl_8eaqjij3p0_e&adgrpid=157529193801&hvpone=&hvptwo=&hvadid=675152705458&hvpos=&hvnetw=g&hvrand=6870138715292486806&hvqmt=e&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9198198&hvtargid=kwd-893523692&hydadcr=27920_14701882&gad_source=1');
    }
}
