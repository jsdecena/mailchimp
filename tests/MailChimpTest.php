<?php

use Jsdecena\MailChimp\MC;

class MailChimpTest extends PHPUnit_Framework_TestCase
{
    public $faker;

    public function setUp()
    {
        $env_file_path = __DIR__ . '/../';
        if (file_exists($env_file_path . '.env')) {
            $dotenv = new Dotenv\Dotenv($env_file_path);
            $dotenv->load();
        }

        $this->faker = Faker\Factory::create();
    }
    /**
     * Retrieve all of the lists defined for your user account and throws an exception
     *
     * @test
     */
    public function it_retrieves_all_the_lists_in_the_account()
    {
        $mailchimp = new MC;
        $list = $mailchimp->getLists();

        $this->assertArrayHasKey('total', $list);
        $this->assertArrayHasKey('data', $list);
    }

    /** @test */
    public function it_errors_when_setting_an_invalid_api_key_to_get_the_lists()
    {
        $this->getExpectedException(Exception::class);

        $mailchimp = new MC('unknown');
        $mailchimp->getLists();
    }

    /** @test */
    public function it_errors_when_the_list_id_is_invalid()
    {
        $this->getExpectedException(Exception::class);

        $mailchimp = new MC;
        $mailchimp->subscribe($this->faker->email);
    }

    /** @test */
    public function it_errors_when_the_email_is_not_allowed()
    {
        $this->getExpectedException(Exception::class);

        $mailchimp = new MC;
        $mailchimp->subscribe($this->faker->email);
    }

    /** @test */
    public function it_correctly_subscribes_the_email_to_the_list()
    {
        $email = $this->faker->email;
        $mailchimp = new MC;
        $response = $mailchimp->subscribe($email);

        $this->assertEquals($email, $response['email']);
    }
}