<?php return array(
    'root' => array(
        'name' => 'janitha/php-project',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '626c1de955a0ea244c7dca0c18b6fe36db858a54',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'janitha/php-project' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '626c1de955a0ea244c7dca0c18b6fe36db858a54',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'phpmailer/phpmailer' => array(
            'pretty_version' => 'v6.10.0',
            'version' => '6.10.0.0',
            'reference' => 'bf74d75a1fde6beaa34a0ddae2ec5fce0f72a144',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpmailer/phpmailer',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
    ),
);
