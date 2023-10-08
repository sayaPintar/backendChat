<?php

namespace App\Listeners;

use App\Events\CacheCleared;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class RewriteCache
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CacheCleared $event): void
    {
        //forget cache.
        Cache::forget('chats');
    }
}
