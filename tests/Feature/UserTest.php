<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory; 

class UserTest extends TestCase
{
    use DatabaseTransactions;
   
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */

    public function checking_getting_store_or_not(){
      

        $payload = [
            'id'=>1,
            'name'=>'dilshad',
            'email'=>'dilshad@gmail.com',
            'phone'=>9372624008
        ];
        $response = $this->json('post', route('Users.store'), $payload,[
            'X-CSRF-TOKEN' => csrf_token()])
            ->assertStatus(201);        
        // dd( $response );
    }
    /**
     * @test
     */

    public function checking_data_updated_or_not(){
      
        User::create([
            'id'=>1,
            'name'=>'dilshad',
            'email'=>'dilshad@gmail.com',
            'phone'=>9372624008
       ]);
       $forupdate = [
             'id'=>1,
            'name'=>'zeeshan',
            'email'=>'dilshadaa@gmail.com',
            'phone'=>000000000
       ];
       $response = $this->json('PUT',route('Users.update',['id'=>1]),$forupdate,['X-CSRF-TOKEN' => csrf_token()])
       ->assertStatus(201);
    //    dd($response->getContent());
        
       
    
    }
/**
 * @test
 */

    public function list_of_blogs_added(){
        
        $response = $this->json('GET', route('Users.userlist'),[
         'X-CSRF-TOKEN' => csrf_token()])
             ->assertStatus(200);
     }
     /**
      * @test
      */

     public function list_deleted_or_not(){
        User::create([
            'id'=>1,
              'name'=>'dilshad',
              'email'=>'dilshad@gmail.com',
              'phone'=>000000000

           ]);
        $response = $this->json('get', route('Users.destroy',['id'=>1]),[
            'X-CSRF-TOKEN' => csrf_token()])
            ->assertStatus(204);

       $this->assertCount(0 , User::all());
    }
    
}
