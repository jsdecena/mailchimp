## MailChimp API v2.0 Laravel PHP Example

## Installation

- Step1: Add this to your root `composer.json` 

```json

	"require": {
	    "jsd/mailchimp": "1.4"
	}

```

- Step2: Add this to your `config/app.php` in `providers` array

```json

	'providers' => [
	    Jsd\MailChimp\MailChimpServiceProvider::class,
	]

```

- Step3: Run this in your terminal

`php artisan vendor:publish --provider="Jsd\MailChimp\MailChimpServiceProvider" --tag=view`

- Step4: Include the template anywhere in your template

`@include('mailchimp')`

- Step5: Set the variable in your `.env` file

`MAILCHIMP_API_KEY=YourMailChimpAPIKey`

`MAILCHIMP_LIST_ID=YourMailChimpListId`

- Step6: Enjoy!
