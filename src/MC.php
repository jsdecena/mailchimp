<?php

namespace Jsdecena\MailChimp;

use Mailchimp;
use Exception;
use Mailchimp_Email_AlreadySubscribed;

class MC {

    public $mailchimp;

    /**
     * MC constructor.
     * @param string $api
     */
    function __construct(string $api)
    {
        $this->mailchimp = new Mailchimp($api);
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
     * @param string $listId
     * @param string $email
     * @return \associative_array
     * @throws Exception
     */
    public function subscribe(string $listId, string $email)
    {
        try {
            return $this->mailchimp->lists->subscribe($listId, ['email' => $email]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}