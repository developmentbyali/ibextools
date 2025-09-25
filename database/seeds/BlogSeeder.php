<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = Blog::where('type','static-page')->where('status','published')->where('slug','about')->get();

        if($about->isEmpty()){
            factory(App\Blog::class, 1)->create([
                'title' => 'About',
                'description' => '<div class="row justify-content-center ">
                 <div class="col-md-8 tool-working shadow-sm p-3 mb-4 bg-white rounded">
                     <strong>About Ibex Tools</strong> <p>
                         The main purpose of this website is to create some simple but useful tools in testing, debugging, and development. Most of these tools use in day to day life and our main focus is to combine them together in a single platform to make these easy to access and use.
                         We know everything is in constant state of improvement. And we will make it better and better InsAllah.
                     </p> <p>
                         You want to suggest us some useful tools?
                     </p> <p>
                         If yes then write us we will be happy to enlist that and surely give you the created.
                     </p>
                 </div>
             </div>',
                'short_description' =>  'The main purpose of this website is to create some simple but useful tools in testing, debugging, and development. Most of these tools use in day to day life and our main focus is to combine them together in a single platform to make these easy to access and use. We know everything is in constant state of improvement. And we will make it better and better InsAllah.',
                'slug' => 'about',
                'user_id' => \App\User::find(1),
                'status' => 'published',
                'tags' => 'about, Ibex tools, Ibex css tools, css minifier, css minifier',
                'identifier' => 'about',
                'type' => 'static-page',
                'updated_at' => now(),
                'created_at' =>  now(),
            ]);
        }
    }
}
