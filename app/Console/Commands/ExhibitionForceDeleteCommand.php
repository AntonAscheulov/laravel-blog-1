<?php

namespace App\Console\Commands;

use App\Models\Exhibition;
use Illuminate\Console\Command;

class ExhibitionForceDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exhibitions:force-delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deleting exhibitions at database by force whith image';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $exhibitions = Exhibition::onlyTrashed()->get();
       foreach ($exhibitions as $exhibition){
           $exhibition->forceDelete();
       }
        return 0;
    }
}
