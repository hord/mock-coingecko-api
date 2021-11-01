<?php

namespace App\Console\Commands;

use App\Jobs\CalculatePriceJob;
use App\Models\Token;
use Illuminate\Console\Command;

class UpdatePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:prices';

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
        $tokens = Token::all();

        foreach ($tokens as $token) {
            try {
                dispatch_sync(new CalculatePriceJob($token));
            }catch (\Exception $e) {}
        }

        return Command::SUCCESS;
    }
}
