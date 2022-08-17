<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Artist;

class ArtistForceDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artists:force-delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deleting artists at database by force whith avatar';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $artists = Artist::onlyTrashed()->get();
       foreach ($artists as $artist){
           $artist->forceDelete();
       }
        return 0;
    }
}
