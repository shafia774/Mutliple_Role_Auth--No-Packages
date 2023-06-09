<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create An Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Enter the email address(this will be your username) ');
        $mobile = $this->ask('Enter the Mobile Number');
        $password = $this->secret('Enter the password?');
        if ($this->confirm('Do you wish to continue?')) {
            $user = User::create([
                'name' => "admin",
                'email' => $email,
                'mobile' => $mobile,
                'role' => 3,
                'password' => Hash::make($password),
            ]);
            $this->info($email.'Admin created successfully');
        }
        else{
            $this->info('Command Aborted');
        }
    }
}
