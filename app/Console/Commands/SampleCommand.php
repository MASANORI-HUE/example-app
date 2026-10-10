<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('sample-command')]
#[Description('Sample Command')]
class SampleCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo 'このコマンドはサンプルです。';

        return Command::SUCCESS;
    }
}
