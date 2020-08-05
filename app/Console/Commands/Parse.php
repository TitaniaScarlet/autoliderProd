<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Admin\ParserController;
use App\Parameter;
use App\Link;
use App\Data;

class Parse extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'parse:auto';

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
  * @return mixed
  */
  public function handle()
  {
    $parameters = Parameter::get();

    foreach($parameters as $parameter) {
      if($parameter->action == 'parse') {
        $url = 'https://cars.av.by/search?brand_id%5B0%5D=' . $parameter->marka_id. '&model_id%5B0%5D=' . $parameter->model_id. '&year_from=' . $parameter->min_year . '&year_to=' . $parameter->max_year . '&currency=USD&price_from=' . $parameter->min_price . '&price_to=' . $parameter->max_price . '&body_id=&engine_volume_min=&engine_volume_max=&driving_id=&mileage_min=&mileage_max=&region_id=&interior_material=&interior_color=&exchange=&search_time=';
        $parser = new ParserController;
        $links = $parser->parse_auto($url, $parameter->id);
        // foreach ($links as $link) {
        //   $message = [$link->id, $link->link];
        //         foreach ($chatid as $id) {
        //           $ch = curl_init();
        //           curl_setopt_array(
        //             $ch,
        //             array(
        //               CURLOPT_URL => 'https://api.telegram.org/bot' . $token->number . '/sendMessage',
        //               CURLOPT_POST => TRUE,
        //               CURLOPT_RETURNTRANSFER => TRUE,
        //               CURLOPT_TIMEOUT => 10,
        //               CURLOPT_POSTFIELDS => array(
        //                 'chat_id' => $id->number,
        //                 'text' => json_encode($message,  JSON_UNESCAPED_UNICODE)
        //               ),
        //             )
        //           );
        //           curl_exec($ch);
        //         }
        // }

      }

    }
  }
}
