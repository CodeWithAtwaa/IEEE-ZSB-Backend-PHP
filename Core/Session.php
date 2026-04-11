<?php

namespace Core;

class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flashed'][$key])) {
            $value = $_SESSION['_flashed'][$key];
            unset($_SESSION['_flashed'][$key]);
            return $value;
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function flash($key, $value = null)
    {
        $_SESSION['_flashed'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flashed']);
    }

    public static  function flush()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public static function destroy()
    {
        self::flush();
    }
}
