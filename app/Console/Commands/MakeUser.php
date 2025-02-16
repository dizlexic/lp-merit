<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class MakeUser extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fname = text(
            label: 'Firstname',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            }
        );

        $lname = text(
            label: 'Lastname',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            }
        );

        $email = text(
            label: 'Email',
            validate: fn (string $value) => match (true) {
                !filter_var($value, FILTER_VALIDATE_EMAIL) => 'The email must be a valid email address.',
                strlen($value) > 255 => 'The email must not exceed 255 characters.',
                default => null
            }
        );

        $username = text(
            label: 'Username',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The username must be at least 3 characters.',
                strlen($value) > 255 => 'The username must not exceed 255 characters.',
                default => null
            }
        );

        $password = password(
            label: 'What is your password?',
            placeholder: 'password',
            validate: fn (string $value) => match (true) {
                strlen($value) < 8 => 'The password must be at least 8 characters.',
                default => null
            },
            hint: 'Minimum 8 characters.'
        );

        $roles = multiselect(
            label: 'What Roles would you like to assign?',
            options: array_map(function ($value) {
                return $value['name'];
            }, Role::all()->toArray())
        );

        $user = User::create([
            'name' => "{$fname} {$lname}",
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole($roles);
    }
}
