<?php

namespace Jsdecena\MailChimp;

use Jsdecena\MailChimp\Exceptions\AlreadySubscribed;
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
        $this->mailchimp = new Mailchimp(getenv('MAILCHIMP_API_KEY'));
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
            return $this->mailchimp->lists->subscribe(getenv('MAILCHIMP_LIST_ID'), ['email' => $email]);
        } catch (Mailchimp_Email_AlreadySubscribed $e) {
            throw new AlreadySubscribed($e->getMessage(), $e);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}