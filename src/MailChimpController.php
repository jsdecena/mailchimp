<?php

namespace Jsdecena\MailChimp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class MailChimpController extends Controller
{
	public function store(Request $request)
	{
        try {

            $mc = new MC(env('MAILCHIMP_API_KEY'));
            $response = $mc->subscribe(env('MAILCHIMP_LIST_ID'), $request->input('email'));

            return response()->json(['data' => $response ]);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()]);
        }
	}
}