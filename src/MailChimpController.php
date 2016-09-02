<?php

namespace Jsdecena\MailChimp;

use Illuminate\Http\Request;

class MailChimpController
{
	public function store(Request $request)
	{
        try {

            $mc = new MC(env('MAILCHIMP_API_KEY'));
            $response = $mc->subscribe(env('MAILCHIMP_LIST_ID'), $request->input('email'));
                
            return response()->json(['data' => $response ]);

        } catch (\Mailchimp_Error $e) {

            return response()->json(['error' => $e->getMessage()]);
        }
	}
}