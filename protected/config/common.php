<?php

return [
	'components' => [
		'authClientCollection' => [
			'clients' => [
				'facebook' => [
					'class' => 'humhub\modules\user\authclient\Facebook',
					'clientId' => '1516365641795595',
					'clientSecret' => '11bc401aebec38c807a6d0b007fbec35',
				],
				'google' => [
					'class' => 'humhub\modules\user\authclient\Google',
					'clientId' => '909741672549-gqdu4t8q53slhb73oirshmujej32g80i.apps.googleusercontent.com',
					'clientSecret' => '_maaNOxDHiLNvlGuHhB35sDC',
				],
			],
		],
	],
];
