<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunServer extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:run-server';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Runs some php commands to clear cache before running the php server';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $this->call("cache:clear");
    $this->call("config:cache");
    $this->call("config:clear");
    $this->call("route:cache");
    $this->call("route:clear");
    $this->call("serve", [
      '--host' => '127.0.0.1',
      '--port' => '8000'
    ]);
  }
}
