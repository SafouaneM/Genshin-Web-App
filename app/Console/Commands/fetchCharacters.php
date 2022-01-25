<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class fetchCharacters extends Command
{
    /**
     * Fetches latest characters from the api and flushes the database
     * (As we need the most recent information)
     *
     * @var string
     */
    protected $signature = 'gensh-app fetch-flush';

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
        return 0;
    }
}
