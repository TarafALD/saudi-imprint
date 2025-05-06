<?php
namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;


class CompletePastTours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'complete-past-tours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark past tours as completed if they are paid and the booking date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date and time
        $now = Carbon::now();

        
        $bookings = Booking::where('payment_status', 'paid')
            ->where('status', '!=', 'completed')
            ->whereDate('booking_date', '<=', $now)
            ->get();

        foreach ($bookings as $booking) {
            // Mark the tour as completed
            $booking->status = 'completed';
            $booking->save();

  
            $this->info("Booking {$booking->id} marked as completed.");
        }

        if ($bookings->isEmpty()) {
            $this->info('No bookings to mark as completed.');
        }
    }
   
}
