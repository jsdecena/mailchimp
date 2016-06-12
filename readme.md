## MailChimp API v2.0 Laravel PHP Example

## Installation

- Step1: Add this to your root `composer.json` 

```json

	"require": {
	    "jsdecena/mailchimp": "1.6.*"
	}

```

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

- Yes you can. Override the file in /resources/views/vendor/mailchimp/mailchimp.blade.php