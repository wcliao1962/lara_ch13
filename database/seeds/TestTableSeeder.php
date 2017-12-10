<?php

use Illuminate\Database\Seeder;

use App\User as UserEloquent;
use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;
use App\Comment as CommentEloquent;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = factory(UserEloquent::class,4)->create();
    	$postTypes = factory(PostTypeEloquent::class,10)->create();
    	$posts = factory(PostEloquent::class,100)->create()->each(function($post) use ($user,$postTypes){
    		$post->type=$postTypes[mt_rand(0, (count($postTypes)-1))]->id;
    		$post->user_id=$user[mt_rand(0, (count($user)-1))]->id;
    		$post->save();
    	});
    }
}
