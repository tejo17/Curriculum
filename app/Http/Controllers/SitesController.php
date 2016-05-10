<?php
use App\PersonalSite;
use App\Http\Requests;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function sites()
    {
    	$sites = Sites::lists('site', 'id');
    	return $sites;
    }

   
}
