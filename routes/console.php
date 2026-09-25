<?php

use App\Jobs\DeleteExpiredCarts;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new DeleteExpiredCarts)->withoutOverlapping(155)->dailyAt('00:00');
Schedule::command('queue:work --queue=DeleteExpiredCarts --stop-when-empty')->dailyAt('00:00');
