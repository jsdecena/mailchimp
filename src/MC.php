<?php

namespace Jsdecena\MailChimp;

use Mailchimp;
use Exception;
use Mailchimp_Email_AlreadySubscribed;

class MC {

    public $mailchimp;

    /**
     * MC constructor
     */
    function __construct()
    {
        $this->mailchimp = new Mailchimp(env('MAILCHIMP_API_KEY'));
    }

    /**
     * @return \associative_array
     * @throws Exception
     */
    function getLists()
    {
        try {
            return $this->mailchimp->lists->getList();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param string $email
     * @return \associative_array
     * @throws Exception
     */
    public function subscribe(string $email)
    {
        try {
            return $this->mailchimp->lists->subscribe(env('MAILCHIMP_LIST_ID'), ['email' => $email]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}