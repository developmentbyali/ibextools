<?php

namespace App\Http\Controllers;

use App\Jobs\TrackVisit;
use App\Link;
use Stevebauman\Location\Facades\Location;

class RedirectController extends Controller
{
    public function index($uuid)
    {
        $link = Link::where('Uuid', $uuid)->firstOrFail();
        $metadata = [
            'referrer' => request()->headers->get('referer'),
            'ip' => request()->ip(),
            'locale' => request()->getLocale(),
            'location' => Location::get('2400:adc7:105:4600:a590:c9be:3fc:2f1'),
        ];
        $job = new TrackVisit($link, $metadata);
        dispatch($job);
        return redirect($link->url);
    }
}
