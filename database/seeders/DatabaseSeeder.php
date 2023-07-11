<?php

namespace Database\Seeders;
use App\Models\Rol;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Rol::create([
        'nombrerol'=>'prueba',
        'tipo'=>'prueba',
        'estado'=>'prueba',
        ]);
        Rol::create([
        'nombrerol'=>'prueba2',
        'tipo'=>'prueba',
        'estado'=>'prueba',
        ]);
        User::create([
            'name' => 'aaa',
            'name2' => 'bbb',
            'apellido' => 'asdasd',
            'ci' => '12345677',
            'numero1' => '123454',
            'numero2' => '231243',
            'ciudadci' => '1',
            'verificacion' => '1',
            'email' => 'b@gmail.com',
            'email_verified_at' => now(),
            'current_team_id' => 1,
            'profile_photo_path' => 'ruta/imagen.jpg',
            'estado' => '1',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'aaa',
            'name2' => 'bbb',
            'apellido' => 'asdasd',
            'ci' => '12345677',
            'numero1' => '123454',
            'numero2' => '231243',
            'ciudadci' => '1',
            'verificacion' => '1',
            'email' => 'a@gmail.com',
            'email_verified_at' => now(),
            'current_team_id' => 1,
            'profile_photo_path' => 'ruta/imagen.jpg',
            'estado' => '1',
            'password' => Hash::make('12345678'),
        ]);
    }
}
