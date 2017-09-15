<?php

namespace Jsdecena\MailChimp;

use Illuminate\Http\Request;
use Exception;

class MailChimpController
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
	{
        try {

            $mc = new MC;
            $response = $mc->subscribe($request->input('email'));

            return response()->json(['data' => $response ]);

        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()]);
        }
	}
}