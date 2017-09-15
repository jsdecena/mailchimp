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
            $mc->subscribe($request->input('email'));

            return $request->session()->flash('message', 'Subscription successful!');

        } catch (Exception $e) {

            return $request->session()->flash('error', $e->getMessage());
        }
	}
}