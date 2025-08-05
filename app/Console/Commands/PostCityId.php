<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PostCityId extends Command
{
    protected $signature = 'post:cityid {city_id}';
    protected $description = 'Send POST request to makeupstore.co.il with city_id';

    public function handle()
    {
        $cityId = $this->argument('city_id');

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With' => 'XMLHttpRequest',
            'Referer' => 'https://makeupstore.co.il/ru/checkout/',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ])->withCookies([
            'PHPSESSID' => 'u6kr7ibhq3tvqo46gdm2qskgsibot93u',
            '_gcl_au' => '1.1.224848530.1754329683',
            '_gid' => 'GA1.3.1452517848.1754329684',
            'cookie' => 'accepted',
            'views' => 'eNo1ykEKwyAQQNGrlFlrGXVMrZcJo2NAkDQEk03I3WsX3X14%2F4IN4gUv45Dcrzj3%2BlkhrkdrCvjk2ji1ArHvR1Fw8l557XOV%2F7LtNQ8mfJJVcGzCvcjMHSJYtF5j0EgPi9FP0Xm4bwV5mFAICQPrLGbSREY0v5ei3VKcTUb8ksb8BSsELpk%3D',
            'lang' => 'ru',
            '_ga' => 'GA1.3.948351876.1754329684',
            '_gat_UA-246824634-1' => '1',
            '_ga_66H92D84V6' => 'GS2.1.s1754329683$o1$g1$t1754330635$j60$l0$h0',
        ], 'makeupstore.co.il')->asForm()->post('https://makeupstore.co.il/checkout/ajax/', [
            'city_id' => $cityId
        ]);

        $this->info('Response status: ' . $response->status());
        $this->line('Response body:');
        $data = $response->json();

        if (isset($data['address'])) {
            $address = $data['address'];            
            echo "Город: {$address['city']}\n";
            echo "Индекс: {$address['zip']}\n";
            
        } else {
            echo "Адрес не найден в ответе.\n";
        }
    }
}
