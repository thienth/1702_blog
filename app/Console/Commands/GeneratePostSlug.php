<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Slug;
use DB;
class GeneratePostSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generate-post-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate post slug';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::all();
        foreach ($posts as $p) {
            $slug = Slug::where([
                    'entity_type' => $p->entityType,
                    'entity_id' => $p->id
                ])->first();
            if($slug){
                continue;
            }

            $postSlug = slug_generate($p->title);
            DB::table('slugs')->insert([
                    'entity_type' => $p->entityType,
                    'entity_id' => $p->id,
                    'slug' => $postSlug
                ]);
        }
    }
}
