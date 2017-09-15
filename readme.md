[![Build Status](https://travis-ci.org/jsdecena/mailchimp.svg?branch=master)](https://travis-ci.org/jsdecena/mailchimp)
[![Latest Stable Version](https://poser.pugx.org/jsdecena/mailchimp/v/stable)](https://packagist.org/packages/jsdecena/mailchimp)
[![Total Downloads](https://poser.pugx.org/jsdecena/mailchimp/downloads)](https://packagist.org/packages/jsdecena/mailchimp)
[![License](https://poser.pugx.org/jsdecena/mailchimp/license)](https://packagist.org/packages/jsdecena/mailchimp)

## MailChimp API v2.0 Laravel PHP Example

## Installation

- Step1: Add this to your root `composer.json` 

```json

	"require": {
	    "jsdecena/mailchimp": "^7.0"
	}
```
Or issue this command:

`composer require jsdecena/mailchimp`

- Step2: Add this to your `config/app.php` in `providers` array

```json

	'providers' => [
	    Jsdecena\MailChimp\MailChimpServiceProvider::class,
	]

```

- Step3: Run this in your terminal

`php artisan vendor:publish --provider="Jsdecena\MailChimp\MailChimpServiceProvider"`

- Step4: Include the template anywhere in your template `@include('mailchimp::mailchimp')`

- Step5: Set the variable in your `.env` file

`MAILCHIMP_API_KEY=YourMailChimpAPIKey`

`MAILCHIMP_LIST_ID=YourMailChimpListId`

- Step6: Enjoy!


## Overriding the template file?


- Yes you can. Override the file in `/resources/views/vendor/mailchimp/mailchimp.blade.php`


## What is new with 1.6?


- Recently, I learned the power of doing TDD (test driven development) on applications using PHPUnit. So now, I am already throwing exception messages whenever there is an issue on the request!

## What are the exception messages we are returning?


- Email that MailChimp does not allow

```json
  {
    "error": "List_RoleEmailMember: test@test.com is an invalid email address and cannot be imported."
  }
```

- Wrong API key provided

```json
  {
    "error":"Invalid MailChimp API key: 1112e36f7f44ef4cc3c5a584747abb05be"
  }
```

- Wrong List ID provided

```json
  {
    "error":"Invalid MailChimp List ID: accf6b0a0e111"
  }
```

## And if the subscription is successful, it will return the email, euid, leid on the data object

```json
  {
    "data": {
      "email":"super@mario.com",
      "euid":"b0b8fdacbd",
      "leid":"430369209"
    }
  }
```