<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class SessionController extends \Com\Daw2\Core\BaseController {

    function destroySession() {
        session_destroy();
        header("location: \ ");
    }

}
