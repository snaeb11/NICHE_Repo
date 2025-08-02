<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Get program IDs
        $undergradPrograms = Program::undergraduate()->pluck('id');
        $gradPrograms = Program::graduate()->pluck('id');
        $allPrograms = $undergradPrograms->merge($gradPrograms);

        // 1. Create super admin
        $this->createSuperAdmin([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@usep.edu.ph',
            'password' => '!2Qwerty',
        ]);

        // 2. Create program admins
        $allPrograms->each(function ($programId) {
            $program = Program::find($programId);

            User::create([
                'first_name' => Crypt::encrypt('Program'),
                'last_name' => Crypt::encrypt($program->name . ' Admin'),
                'email' => Crypt::encrypt(strtolower(str_replace(' ', '', $program->name)) . 'admin@usep.edu.ph'),
                'email_hash' => hash('sha256', strtolower(str_replace(' ', '', $program->name)) . 'admin@usep.edu.ph'),
                'password' => Hash::make('!2Qwerty'),
                'account_type' => User::ROLE_ADMIN,
                'program_id' => $programId,
                'status' => 'active',
                'email_verified_at' => now(),
                'permissions' => implode(', ', $this->adminPermissions()),
            ]);
        });

        // 3. Create students
        User::factory()
            ->count(50)
            ->student()
            ->create(['program_id' => fn() => $undergradPrograms->random()]);

        User::factory()
            ->count(20)
            ->student()
            ->create(['program_id' => fn() => $gradPrograms->random()]);
    }

    protected function createSuperAdmin(array $data): User
    {
        return User::create([
            'first_name' => Crypt::encrypt($data['first_name']),
            'last_name' => Crypt::encrypt($data['last_name']),
            'email' => Crypt::encrypt($data['email']),
            'email_hash' => hash('sha256', $data['email']),
            'password' => Hash::make($data['password']),
            'account_type' => User::ROLE_SUPER_ADMIN,
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

    protected function adminPermissions(): array
    {
        return ['view-dashboard', 'view-submissions', 'acc-rej-submissions', 'view-inventory', 'add-inventory', 'edit-inventory', 'export-inventory'];
    }
}
