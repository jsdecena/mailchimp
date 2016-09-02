<?php

use Jsdecena\MailChimp\MC;

class MailChimpTest extends PHPUnit_Framework_TestCase
{
    private $faker;
    private $apiKey = '12e36f7f44ef4cc3c5a584747abb05be-us1';

    function __construct()
    {
        parent::__construct();

        $this->faker = Faker\Factory::create();
    }

    /**
     * Retrieve all of the lists defined for your user account and throws an exception
     *
     * @test
     */
    public function it_retrieves_all_the_lists_in_the_account()
    {
        $mailchimp = new MC($this->apiKey);
        $mailchimp->getLists();

        $this->assertInstanceOf(MC::class, $mailchimp);
    }

    /**
     * Retrieve all of the lists defined for your user account and throws an exception
     * @expectedException Exception
     * @expectedExceptionMessage Invalid MailChimp API key: unknown
     *
     * @test
     */
    public function it_errors_when_setting_an_invalid_api_key_to_get_the_lists()
    {
        $mailchimp = new MC('unknown');
        $mailchimp->getLists();
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Invalid MailChimp List ID: 818181818181
     *
     * @test
     */
    public function it_errors_when_the_list_id_is_invalid()
    {
        $mailchimp = new MC($this->apiKey);
        $mailchimp->subscribe('818181818181', $this->faker->email);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage List_RoleEmailMember: email@email.com is an invalid email address and cannot be imported.
     *
     * @test
     */
    public function it_errors_when_the_email_is_not_allowed()
    {
        $mailchimp = new MC($this->apiKey);
        $mailchimp->subscribe('accf6b0a0e', 'email@email.com');
    }

    /**
     * @test
     */
    public function it_correctly_subscribes_the_email_to_the_list()
    {
        $email = $this->faker->email;
        $mailchimp = new MC($this->apiKey);
        $response = $mailchimp->subscribe('accf6b0a0e', $email);

        $this->assertEquals($email, $response['email']);
    }
}