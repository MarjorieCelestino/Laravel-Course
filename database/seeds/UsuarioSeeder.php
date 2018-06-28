<?php

use Illuminate\Database\Seeder;
use App\User;

/*
* php artisan db:seed -> roda todas seeders
* php artisan db:seed --class=nomeClasse -> roda uma classe seeder
*/
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
          'name' => 'Marjorie',
          'email' => 'marjorie@gmail.com',
          'password' => bcrypt('123456'),
        ];

        if (User::where('email', '=', $dados['email'])->count()) {
          $usuario = User::where('email', '=', $dados['email'])->first();
          $usuario->update($dados);
          echo 'Usuario alterado!';
        }else{
          User::create($dados);
          echo 'Usuario criado!';
        }
    }
}
