<?php

namespace App\Models;

class Post 
{
    private static $blog_posts = [
        [
         "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "dawnou",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eaque placeat eum vitae quae sint officiis necessitatibus laudantium. Minima ducimus, sit, laudantium quisquam id eum asperiores soluta in quos corrupti tenetur ut, ratione impedit sapiente itaque odio voluptatum quia? Eveniet explicabo asperiores id quae ullam soluta reprehenderit aliquid dignissimos, eos, culpa ipsam omnis assumenda! Iste recusandae cupiditate similique inventore laborum blanditiis error aperiam at? Cupiditate facilis ullam soluta sapiente, asperiores repellendus veritatis aut consequuntur blanditiis perferendis omnis vero, mollitia ea!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "rzjr",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure ducimus amet quaerat reprehenderit neque minima excepturi laborum numquam rerum. Totam est libero distinctio perferendis ipsum, hic voluptatem culpa eum repellendus, error quae dolore iure! Accusantium, amet! Atque, deserunt aperiam earum odio doloremque officiis repellat asperiores provident nam aliquam. Vitae numquam placeat unde suscipit quasi consequuntur, debitis sequi perspiciatis quidem tempora! Pariatur consequatur porro delectus voluptas quasi. Sapiente nemo quod recusandae, nulla cupiditate, laudantium consectetur ratione fugit quibusdam molestiae praesentium, velit a tempore adipisci. Id dignissimos, illo porro a cupiditate dolores praesentium laboriosam sint sequi dolorem deleniti voluptas nisi totam ab."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
