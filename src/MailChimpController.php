<?php

namespace Jsdecena\MailChimp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class MailChimpController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        try {

            $mc = new MC;
            $mc->subscribe($request->input('email'));

            $request->session()->flash('message', 'Subscription successful!');

        } catch (Exception $e) {

            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }
}