<?php

use App\Models\User;
use App\Models\UserType;
use Laravel\Lumen\Testing\DatabaseMigrations;


class UsersControllerTest extends TestCase
{

    use DatabaseMigrations;



    public function test_can_create_a_user()
    {

        UserType::factory(5)->create();

        $user = User::factory()->create();


        $this->actingAs($user);

        $this->call('POST', 'api/users', [
            "lastname" => "Romanov",
            "firstname" => "Suzie",
            "mail" => "suzie.romanov@immoco.fr",
            "username" => "suzieRo",
            "cellphone" => "0699966600",
            'password' => 'zre',
            "phone" => null,
            "user_type_id" => 1,
            "sexe" => 1,
        ]);

        $this->assertResponseStatus(200);

        $this->seeInDatabase('users', [
            'mail' => "suzie.romanov@immoco.fr"
        ]);
    }

    public function test_should_return_users_list()
    {
        UserType::factory(5)->create();

        User::factory(5)->create();

        $user = User::factory()->make();



        // authentifie l'utilisateur
        $this->actingAs($user);
        // Traitement des requêtes https personnalisée.
        $response = $this->call('GET', 'api/users');
        // $this->assertEquals(200, $response->status());

        $this->assertEquals(200, $response->status());

        $this->response->assertJsonStructure([
            '*' => [
                'firstname',
                'lastname',
                'mail',
                'username',
                'cellphone',
                'phone',
                'user_type_id',
                'user_type',
                'sexe',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ]);
    }

    public function test_should_update_user()
    {
        UserType::factory(5)->create();

        $user = User::factory()->create();

        $this->actingAs($user);

        $this->put("api/users/{$user->id}", [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'mail' => 'Jd@tm.fr',
            'username' => 'JDM',
            'user_type_id' => 1
        ]);

        $this->assertResponseStatus(200);

        $this->seeInDatabase('users', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'mail' => 'Jd@tm.fr',
            'username' => 'JDM',
            'user_type_id' => 1
        ]);
    }
}
