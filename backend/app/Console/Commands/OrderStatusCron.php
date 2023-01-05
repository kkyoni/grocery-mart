<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class OrderStatusCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OrderStatus:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $order = Order::whereIn('status', ['processing', 'accepted', 'ontheway'])->get();
        if (sizeof($order) > 0) {
            $current_date = date("Y-m-d");
            foreach ($order as $value) {
                if ($value->status == 'accepted') {
                    $accepted_date = date("Y-m-d", strtotime('+3 day', strtotime($value->created_at)));
                    if ($accepted_date == $current_date) {
                        Order::where('id', $value->id)->update([
                            'status' => 'ontheway',
                        ]);
                    }
                } elseif ($value->status == 'ontheway') {
                    $ontheway_date = date("Y-m-d", strtotime('+7 day', strtotime($value->created_at)));
                    if ($ontheway_date == $current_date) {
                        Order::where('id', $value->id)->update([
                            'status' => 'delivered',
                        ]);
                    }
                } else {
                    Order::where('id', $value->id)->update([
                        'status' => 'accepted',
                        'date'   => date("Y-m-d", strtotime('+7 day', strtotime($value->created_at)))
                    ]);
                }
            }
        }
        $this->info('Order Status Success');
    }
}
