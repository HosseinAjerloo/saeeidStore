<?php

namespace App\Jobs;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteExpiredCarts implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    public $uniqueFor = 300;

    public $timeout = 0;

    public $tries = 3;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->onQueue('DeleteExpiredCarts');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $timeNow = Carbon::now()->subDay();

        Cart::where('created_at', '<', $timeNow)->delete();
    }
    public function uniqueId(): string
    {
        return 'DeleteExpiredCarts';
    }
}
