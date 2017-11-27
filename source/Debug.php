<?php

/**
 * CodeMommy DebugPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\DebugPHP;

use Whoops\Run;
use Whoops\Util\Misc;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

/**
 * Class Debug
 * @package CodeMommy\DebugPHP
 */
class Debug
{
    /**
     * Debug constructor.
     */
    public function __construct()
    {
    }

    /**
     * On
     */
    public static function on()
    {
        $whoops = new Run();
        if (Misc::isAjaxRequest()) {
            $whoops->pushHandler(new JsonResponseHandler());
        } else {
            $whoops->pushHandler(new PrettyPageHandler());
        }
        $whoops->register();
    }

    /**
     * Off
     */
    public static function off()
    {
        $whoops = new Run();
        $whoops->unregister();
    }

    /**
     * Show
     * @param null $data
     * @param bool $isExit
     *
     * @return bool
     */
    public static function show($data = null, $isExit = false)
    {
        if (Misc::isAjaxRequest()) {
            var_dump($data);
        } else {
            dump($data);
        }
        if ($isExit) {
            exit();
        }
        return true;
    }
}
