<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\ParserController;
// use App\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Parser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->url = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
$url = $this->url;
      $parser = new ParserController;
        $parser->parse($url);
      // set_time_limit(1000);
      //     do {
      //         // $html = $this->curl_get($url);
      //         $ch = curl_init();
      //         curl_setopt($ch, CURLOPT_URL, $url);
      //         curl_setopt($ch, CURLOPT_HEADER, false);
      //         curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
      //         curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
      //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //         // curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
      //         $html = curl_exec($ch);
      //
      //
      //   $crawler = new Crawler($html);
      //  if ($crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->count() > 0) {
      //    $page = $crawler->filter('div.main-section > div.pages > ul.pages-arrows > li.pages-arrows-index + li.pages-arrows-item > a')->attr('href');
      //    $url = $page;
      //  }
      //     $cars = $crawler->filter('div.listing div.listing-item-wrap')->each(function(Crawler $node, $i) {
      //   return $node;
      // });
      // foreach ($cars as $car) {
      //   $title = $car->filter('div.listing-item-title > h4 > a')->text();
      //   $href = $car->filter('div.listing-item-title > h4 > a')->attr('href');
      //   // $price = $car->filter('div.listing-item-price > small')->text();
      //   $link = Link::where('link', $href)->first();
      //   if(empty($link)) {
      //     Link::create([
      //       'site_id' => '1',
      //       'link' => $href
      //     ]);
      //   }
      //   }
      // }while(isset($page));

    }
}
