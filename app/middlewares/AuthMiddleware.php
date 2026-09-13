<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Middleware: AuthMiddleware
 */
class AuthMiddleware
{
    /**
     * Handle the incoming request
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        $session = load_class('Session', 'libraries');

        if (!$session->has_userdata('user_id')) {
            redirect('login');
            exit;
        }

        return $next();
    }
}