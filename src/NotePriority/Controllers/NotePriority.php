<?php

namespace Addons\Plugins\NotePriority\Controllers;

use App\Modules\Core\Controllers\Plugins\Plugin;

class NotePriority extends Plugin
{
    private const IDENTIFIER = 'NotePriority';

    /**
     * Initialise the plugin.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setIdentifier(self::IDENTIFIER);
        $this->registerViewComposer();
    }

    /**
     * Plugins can run an installation routine when they are activated. This will typically include adding default
     * values, initialising database tables and so on.
     *
     * @return boolean
     */
    public function activate(): bool
    {
        return true;
    }

    /**
     * Deactivating serves as temporarily disabling the plugin, but the files still remain. This function should
     * typically clear any caches and temporary directories.
     *
     * @return boolean
     */
    public function deactivate(): bool
    {
        return true;
    }

    /**
     * When a plugin is uninstalled, it should be completely removed as if it never was there. This function should
     * delete any created database tables, and any files created outside of the plugin directory.
     *
     * @return boolean
     */
    public function uninstall(): bool
    {
        return true;
    }

    /**
     * Register the view composer.
     *
     * @return void
     */
    public function registerViewComposer(): void
    {
        \View::composer('operator.default.ticket.ticket', 'Addons\Plugins\NotePriority\Listeners\CheckPriority');
    }
}
