<?php
class LogoutController
{
    public function logout()
    {
        session_unset();     // remove all session variables
        session_destroy();
    }
}
