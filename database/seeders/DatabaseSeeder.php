<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::create([
        //     'name' => 'rzjr',
        //     'email' => 'rzjr@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::create([
            'name' => 'Dawn Rzjr',
            'username' => 'dawnrzjr',
            'email' => 'dawn@gmail.com',
            'password' => bcrypt('dwnrz')
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Lilin Besar',
            'slug' => 'lilin-besar'
        ]);

        Category::create([
            'name' => 'Lilin Sedang',
            'slug' => 'lilin-sedang'
        ]);

        Category::create([
            'name' => 'Lilin Kecil',
            'slug' => 'lilin-kecil'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'loremnya judul pertama',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, tenetur sapiente exercitationem molestiae facilis incidunt qui nesciunt voluptate non perspiciatis in nostrum officia necessitatibus? Accusamus nostrum exercitationem quia voluptatem fugiat sapiente repellat veniam error doloremque minus commodi placeat quaerat illum vitae inventore, ad, quis, totam omnis dicta saepe nobis? Quos nisi eos rerum vitae reprehenderit commodi ab perferendis architecto, dolores dolor doloremque distinctio maxime, praesentium autem, eius magni quibusdam nesciunt eligendi sit eveniet corrupti. Aut laboriosam exercitationem dolorem facilis, quibusdam alias? Laborum laboriosam, ratione odio reiciendis distinctio autem aliquid! Reiciendis ducimus pariatur quos vitae totam alias delectus blanditiis consectetur odit.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'loremnya judul kedua',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, tenetur sapiente exercitationem molestiae facilis incidunt qui nesciunt voluptate non perspiciatis in nostrum officia necessitatibus? Accusamus nostrum exercitationem quia voluptatem fugiat sapiente repellat veniam error doloremque minus commodi placeat quaerat illum vitae inventore, ad, quis, totam omnis dicta saepe nobis? Quos nisi eos rerum vitae reprehenderit commodi ab perferendis architecto, dolores dolor doloremque distinctio maxime, praesentium autem, eius magni quibusdam nesciunt eligendi sit eveniet corrupti. Aut laboriosam exercitationem dolorem facilis, quibusdam alias? Laborum laboriosam, ratione odio reiciendis distinctio autem aliquid! Reiciendis ducimus pariatur quos vitae totam alias delectus blanditiis consectetur odit.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'loremnya judul ketiga',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, tenetur sapiente exercitationem molestiae facilis incidunt qui nesciunt voluptate non perspiciatis in nostrum officia necessitatibus? Accusamus nostrum exercitationem quia voluptatem fugiat sapiente repellat veniam error doloremque minus commodi placeat quaerat illum vitae inventore, ad, quis, totam omnis dicta saepe nobis? Quos nisi eos rerum vitae reprehenderit commodi ab perferendis architecto, dolores dolor doloremque distinctio maxime, praesentium autem, eius magni quibusdam nesciunt eligendi sit eveniet corrupti. Aut laboriosam exercitationem dolorem facilis, quibusdam alias? Laborum laboriosam, ratione odio reiciendis distinctio autem aliquid! Reiciendis ducimus pariatur quos vitae totam alias delectus blanditiis consectetur odit.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
