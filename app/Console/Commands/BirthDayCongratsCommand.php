<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Support\Facades\Mail;
class BirthDayCongratsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthday-congrats-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usersWithBirthday = User::whereDay('birthday', now()->day)
            ->whereMonth('birthday', now()->month)
            ->get();

        foreach ($usersWithBirthday as $user) {
            Mail::raw('Happy Birthday!', function ($message) use ($user) {
                $message->to($user->email)->subject('Birthday Congrats');
            });

            $this->info("Birthday congrats sent to {$user->name}");
    }
}
}
