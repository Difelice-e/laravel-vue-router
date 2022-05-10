<?php
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all();
        $categoriesId = $categories->pluck('id')->all();

        $tags = Tag::all();
        $tagsId = $tags->pluck('id')->all();

        for ($i=0; $i<100; $i++) {
            $post = new Post();
            $post->title = $faker->words(7,true);
            $post->slug = Str::slug($post->title);
            $post->content = $faker->paragraph(10, true);
            $post->published_at = $faker->randomElement([null, $faker->dateTime()]);
            $post->category_id = $faker->optional()->randomElement($categoriesId);

            $randomTags = $faker->randomElements($tagsId,2);

            $user = User::inRandomOrder()->first();
            $post->user_id = $user->id;

            $post->save();
            $post->tags()->attach($randomTags);
        }
    }
}