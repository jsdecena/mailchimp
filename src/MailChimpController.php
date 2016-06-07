<?php

namespace Jsd\MailChimp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mailchimp;

class MailChimpController extends Controller
{
    protected $mailchimp;

    protected $listId;

    /**
     * Pull the Mailchimp-instance from the IoC-container.
     */
    function __construct()
    {
    	$mc = new Mailchimp(env('MAILCHIMP_API_KEY', 'GenerateYourAPIkeyAndReplaceThis'));

        $this->mailchimp = $mc;

        $this->listId = env('MAILCHIMP_LIST_ID', 'GetYourListIDAndReplaceThis');
    }

	public function store(Request $request)
	{
        try {
        	
        	$response = $this->mailchimp
					                ->lists
					                ->subscribe(
					                    $this->listId,
					                    ['email' => $request->input('email')]
					                );
                
            return response()->json(['data' => $response ]);

        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            // do something
            return response()->json(['error' => $e->getMessage()]);

        } catch (\Mailchimp_Error $e) {
            // do something
            return response()->json(['error' => $e->getMessage()]);
        }
	}
}