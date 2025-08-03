<?php

namespace App\Console\Commands;

use App\Mail\TestEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */    
    protected $signature = 'mail:test {email=test@example.com}';    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email to the given address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $to = $this->argument('email');

        Mail::to($to)->send(new TestEmail());

        $this->info("Test email sent to: {$to}");
        return Command::SUCCESS;
    }
}
