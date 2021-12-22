<?php

namespace App\Jobs;

use App\Models\Token;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Web3\Contract;

class CalculatePriceJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Token
     */
    protected $token;

    /**
     * @param Token $token
     */
    public function __construct(Token $token)
    {
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        dispatch_sync(new CalculatePriceJobEth($this->token));

        //dispatch_sync(new CalculatePriceJobBsc($this->token));
    }
}
