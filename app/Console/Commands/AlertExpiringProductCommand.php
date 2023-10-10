<?php

namespace App\Console\Commands;

use App\Models\Stock;
use App\Models\Setting;
use Illuminate\Console\Command;
use App\Notifications\ExpiringProductNotification;
use Illuminate\Support\Facades\Notification;

class AlertExpiringProductCommand extends Command
{
    public function __construct(Stock $stock)
    {
        parent::__construct();
        $this->stock = $stock;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:alert-expiring-product-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alerts the admin of expiring products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Getting products that will expire');
        $expiringInThreeMonths = $this->stock->with('product')->expiryThreeMonth()->get();
        $expiringInADay = $this->stock->with('product')->expiryWithinDay()->get();
        $expiringInAWeek = $this->stock->with('product')->expiryWithinWeek()->get();
        $expired = $this->stock->with('product')->expired()->get();


        $recipients = Setting::all();

        $this->info('Sending expiry notifications');
        if ($expiringInThreeMonths->count()) {
            $data = [
                'message' => "Stocked products expiring within three months",
                'stocks' => $expiringInThreeMonths
            ];

            Notification::send($recipients, new ExpiringProductNotification($data));
        }

        if ($expiringInADay->count()) {
            $data = [
                'message' => "Stocked products expiring in 24 hours",
                'stocks' => $expiringInADay
            ];
            Notification::send($recipients, new ExpiringProductNotification($data));
        }

        if ($expiringInAWeek->count()) {
            $data = [
                'message' => "Stocked products expiring within a week time",
                'stocks' => $expiringInAWeek
            ];
            Notification::send($recipients, new ExpiringProductNotification($data));
        }

        if ($expired->count()) {
            $data = [
                'message' => "Stocked products that have expired",
                'stocks' => $expired
            ];
            Notification::send($recipients, new ExpiringProductNotification($data));
        }

        $this->info('Alert sent');


    }
}
