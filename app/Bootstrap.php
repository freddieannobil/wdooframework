<?php

$bootFile = __DIR__ . '/';

require $bootFile . 'App/app.php';

//require $bootFile.'Error/exceptions.php';
require $bootFile.'Database/credentials.php';

require $bootFile.'Config/config.php';

require $bootFile.'Config/bundles.php';

require $bootFile . 'App/providers.php';

//require $bootFile . 'App/translators.php';

//require $bootFile . 'Web/routes.php';
