<?php

namespace Addons\Plugins\NotePriority\Listeners;

use Illuminate\View\View;

class CheckPriority
{
    private const TYPE_NOTE = 1;


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view): void
    {
        $messages = $view->messages;

        $messagesOrder = [];

        foreach ($messages as $message) {
            if ($message->type === self::TYPE_NOTE && str_contains($message->excerpt, '[PRIORITY]')) {
                array_unshift($messagesOrder, $message);
            } else {
                $messagesOrder[] = $message;
            }
        }

        $view->messages = new \Illuminate\Database\Eloquent\Collection($messagesOrder);
    }
}
