<?php

namespace Tests\Unit;

/**
 * @see https://lihui912.wordpress.com/2021/11/15/fix-laravel-facade-not-set-error-in-unittest/
 */

// use PHPUnit\Framework\TestCase;  // original
use Tests\TestCase; // This TestCase supplied by laravel extends the \PHPUnit\Framework\TestCase and starts Laravel properly

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserTest extends TestCase
{
    // Note: it's critical to to run you code after parent::setUp(); 
    // and before parent::tearDown(); this was the only way I could get it to work.
    /*     
protected function setUp(): void
{
    parent::setUp();
    // Do something
}

protected function tearDown(): void
{
    // Do something
    parent::tearDown();
} 
*/

    public function setUp(): void
    {
        parent::setUp();
        $users = array(
            array(
                //  "id" => 1,
                "name" => "test@test.com",
                "email" => "test@test.com",
                //   "email_verified_at" => NULL,
                "password" => '$12$j3.qTN3mhP2vrTFwNwEk9uxbytE9o.82gWSv077PC7BRSCQOy/jKW',
                //   "remember_token" => "Z5NcsvhWEFghmSF4kUJTn1RjRFEjxZmXplmerL02HT8U72OY0HHTZcbJ5N7e",
                //   "created_at" => "2024-05-06 17:50:27",
                //   "updated_at" => "2024-05-06 17:50:27",
            ),
        );

        DB::table('users')->where('email', "test@test.com")->delete(); // obrisi podatke iz tablice
        DB::table('users')->insert($users); // ubaci podatke   

        // dohvati mi ID od prvog usera u tablici
        $first_user_id = DB::scalar('SELECT id FROM users WHERE `email` LIKE ? ', ["test@test.com"]);

        DB::update('UPDATE `sakila`.`users` SET `email_verified_at`=NULL WHERE  `id`=?', [$first_user_id]);

        DB::update('UPDATE `sakila`.`users` 
        SET `remember_token`="3W6LT5Qmis0Sxy9HEaKLHSI2f8Yh814Dx6PMbEvd0cclG1s9FXwRLRRPCoo8" 
        WHERE  `id`=?', [$first_user_id]);

        DB::table('users')->update(['created_at' => Carbon::now()]);  //MOŽE !!
        DB::table('users')->update(['updated_at' => NULL]);  //Proba, ako ne uspije NULL moramonga staviti u navodnike

    }


    public function tearDown(): void
    {
        DB::table('users')->where('email', "test@test.com")->delete(); // obrisi podatke iz tablice
        DB::table('users')->where('email', "test2@test.com")->delete(); // obrisi podatke iz tablice
        parent::tearDown();  // ovo mora biti zadnja linija u teardown()
    }

    /**
     * A basic unit test example.
     */
    public function test_create_user_raw_db(): void
    {
        $this->assertNull(DB::scalar('SELECT id FROM users WHERE `email` LIKE ? ', ["testXXY@test.com"]), "Ovaj user ne postoji");

        /*         
> $u1=DB::select('SELECT * FROM users WHERE email = ?', ['test@test.com']);
= [
    {#6601
      +"id": 24,
      +"name": "test@test.com",
      +"email": "test@test.com",
      +"email_verified_at": null,
      +"password": "$12$j3.qTN3mhP2vrTFwNwEk9uxbytE9o.82gWSv077PC7BRSCQOy/jKW",
      +"remember_token": "3W6LT5Qmis0Sxy9HEaKLHSI2f8Yh814Dx6PMbEvd0cclG1s9FXwRLRRPCoo8",
      +"created_at": "2024-05-06 20:04:44",
      +"updated_at": null,
    },
  ] 

> $u1[0]->name
= "test@test.com"
*/
        $user1 = DB::select('SELECT * FROM users WHERE email = ?', ['test@test.com']);
        $this->assertEquals("test@test.com", $user1[0]->name, "user test@test.com ne postoji ili nema mail test@test.com");
    }
    public function test_create_user_using_model(): void
    {
        /* 
> $u2= new User;
[!] Aliasing 'User' to 'App\Models\User' for this Tinker session.
= App\Models\User {#6634}

> $u2->name="test@test.com";
= "test@test.com"

> $u2->email="test@test.com";
= "test@test.com"

> $u2->password='$12$j3.qTN3mhP2vrTFwNwEk9uxbytE9o.82gWSv077PC7BRSCQOy/jKW';
= "$12$j3.qTN3mhP2vrTFwNwEk9uxbytE9o.82gWSv077PC7BRSCQOy/jKW"

> $u2
= App\Models\User {#6634
    name: "test@test.com",
    email: "test@test.com",
    #password: "$2y$12$.fJOvy6xJ9n7VgR5rv8NNOvmeUR4EcWbXN.ao38f0dtR5vSGmBPDS",
  }

> $u2->save();
= true */
        $u2 = new User;
        $u2->name = "test2@test.com";
        $u2->email = "test2@test.com";
        $u2->password = '$12$j3.qTN3mhP2vrTFwNwEk9uxbytE9o.82gWSv077PC7BRSCQOy/jKW';
        $u2->save();

        $this->assertNull(DB::scalar('SELECT id FROM users WHERE `email` LIKE ? ', ["testXXY@test.com"]), "Ovaj user ne postoji");
        $user2 = DB::select('SELECT * FROM users WHERE email = ?', ['test2@test.com']);
        $this->assertEquals("test2@test.com", $user2[0]->name, "user test2@test.com ne postoji ili nema mail test2@test.com");
    }
}
