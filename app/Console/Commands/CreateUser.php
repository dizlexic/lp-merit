<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use function Laravel\Prompts\multiselect;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an administrative user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'Name',
            validate: fn (string $value) => match (true) {
                strlen($value) < 3 => 'The name must be at least 3 characters.',
                strlen($value) > 255 => 'The name must not exceed 255 characters.',
                default => null
            }
        );

        $email = text(
            label: 'Email',
            validate: fn(string $value) => match (true) {
                !filter_var($value, FILTER_VALIDATE_EMAIL) => 'The email must be a valid email address.',
                strlen($value) > 255 => 'The email must not exceed 255 characters.',
                default => null
            }
        );

        $password = password(
            label: 'User password?',
            placeholder: 'password',
            validate: fn(string $value) => match (true) {
                strlen($value) < 8 => 'The password must be at least 8 characters.',
                default => null
            },
            hint: 'Minimum 8 characters.'
        );

        password(
            label: 'Confirm password',
            placeholder: 'password',
            validate: fn(string $value) => match (true) {
                $value !== $password => 'The password confirmation does not match.',
                default => null
            }
        );

        $roles = multiselect(
            label: 'What Roles would you like to assign?',
            options: array_map(function ($value) {
                return $value['name'];
            }, Role::all()->toArray()),
            default: [],
        );

        $user = User::create([
            'name' => "{$name}",
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if (!empty($roles)) {
            $user->assignRole($roles);
        }
    }
}
