<?php

namespace Controller;

use Database;

class UserHandler {
    static function userExists($userName): bool {
        return in_array($userName, Database::selectAllUserNames());
    }
}