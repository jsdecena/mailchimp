<?php

Route::post('mailchimp', ['as' => 'mailchimp.store', 'uses' => 'Jsd\MailChimp\MailChimpController@store']);