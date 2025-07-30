<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class CreateSuperAdmin extends Command
{
    protected $signature = 'app:create-super-admin
                            {--email= : The admin email address (must be @usep.edu.ph)}
                            {--first-name= : First name}
                            {--last-name= : Last name}
                            {--password= : Temporary password (min 8 chars)}';

    protected $description = 'Create a super admin user with all permissions';

    public function handle()
    {
        if (User::where('account_type', 'super_admin')->exists() && $this->input->isInteractive() && !$this->confirm('A super admin already exists. Create another?')) {
            return $this->warn('Super admin creation cancelled.');
        }

        try {
            $data = $this->getInputData();

            $validator = Validator::make(
                $data,
                [
                    'email' => ['required', 'email', 'ends_with:@usep.edu.ph', 'unique:users,email'],
                    'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
                    'first_name' => 'required|string|max:50',
                    'last_name' => 'required|string|max:50',
                ],
                [
                    'email.ends_with' => 'Email must be an official @usep.edu.ph address',
                ],
            );

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $user = $this->createSuperAdmin($data);
            $this->outputSuperAdminDetails($user, $data['password']);
        } catch (ValidationException $e) {
            $this->error('Validation errors:');
            foreach ($e->errors() as $field => $errors) {
                foreach ($errors as $error) {
                    $this->line("- {$field}: {$error}");
                }
            }
            return 1;
        } catch (\Exception $e) {
            $this->error('Error creating super admin: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }

    protected function getInputData(): array
    {
        $useDefaults = !$this->input->isInteractive();

        return [
            'email' => $this->option('email') ?? ($useDefaults ? 'superadmin@usep.edu.ph' : $this->askValid('Email address (must end with @usep.edu.ph)', 'email', ['required', 'email', 'ends_with:@usep.edu.ph', 'unique:users,email'])),
            'password' => $this->option('password') ?? ($useDefaults ? $this->generateTempPassword() : $this->askValid('Password (min 8 chars with mixed case, numbers & symbols)', 'password', ['required', Password::min(8)->mixedCase()->numbers()->symbols()])),
            'first_name' => $this->option('first-name') ?? ($useDefaults ? 'System' : $this->askValid('First name', 'first_name', ['required', 'string', 'max:50'])),
            'last_name' => $this->option('last-name') ?? ($useDefaults ? 'Admin' : $this->askValid('Last name', 'last_name', ['required', 'string', 'max:50'])),
        ];
    }

    protected function generateTempPassword(): string
    {
        return bin2hex(random_bytes(8)) . '!A1';
    }

    protected function askValid(string $question, string $field, array $rules)
    {
        $value = $this->ask($question);

        if ($message = $this->validateInput($rules, $field, $value)) {
            $this->error($message);
            return $this->askValid($question, $field, $rules);
        }

        return $value;
    }

    protected function validateInput(array $rules, string $field, $value): ?string
    {
        $validator = Validator::make(
            [$field => $value],
            [$field => $rules],
            [
                'email.ends_with' => 'The email must be an official @usep.edu.ph address',
            ],
        );

        return $validator->fails() ? $validator->errors()->first($field) : null;
    }

    protected function createSuperAdmin(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'account_type' => 'super_admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'permissions' => implode(', ', $this->superAdminPermissions()),
            'program_id' => null,
        ]);
    }

    protected function superAdminPermissions(): array
    {
        return ['view-dashboard', 'view-submissions', 'acc-rej-submissions', 'view-inventory', 'add-inventory', 'edit-inventory', 'export-inventory', 'import-inventory', 'view-accounts', 'edit-permissions', 'add-admin', 'view-logs', 'view-backup', 'download-backup', 'allow-restore'];
    }

    protected function outputSuperAdminDetails(User $user, string $plainPassword): void
    {
        $this->info('Super Admin created successfully!');
        $this->line('ID: ' . $user->id);
        $this->line('Name: ' . $user->first_name . ' ' . $user->last_name);
        $this->line('Email: ' . $user->email);
        $this->line('Temporary Password: ' . $plainPassword);
        $this->newLine();
        $this->warn('⚠️ IMPORTANT:');
        $this->line('1. This account has full system access');
        $this->line('2. Change password immediately after first login');
        $this->line('3. Store credentials securely');
        $this->line('4. Enable 2FA for this account');
    }
}
