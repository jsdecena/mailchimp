<?php

Route::post('mailchimp', ['as' => 'mailchimp.store', 'uses' => 'Jsdecena\MailChimp\MailChimpController@store']);