<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class DoBackup extends Command
{
    protected $signature = 'app:do-backup';

    protected $description = 'Make Data Backup , Save a Copy and Send another To Mail';

    public function handle()
    {
        $path  = "C:\\Users\\BAB AL SAFA\Downloads\\";
        $users = User::all();
        (new FastExcel($users))->export($path . 'file.xlsx');
        // new \App\Mail\ExampleEmail()
        Mail::to('aymancoom3@gmail.com')->send(new \App\Mail\ExcelFile());
        $this->info('Email sent successfully.');
    }
}
