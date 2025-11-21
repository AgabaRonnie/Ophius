<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'generate:sitemap';

  /**
   * The console command description.
   *
   * @var string
   */

  protected $description = 'Generate sitemap.xml for blog posts';


public function handle()
{
    Log::info('GenerateSitemap command started');
    $sitemap = Sitemap::create();

    // ✅ Add homepage URL
    $sitemap->add(
        Url::create(url('/')) // or url('/home') if that’s your landing page
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0)
    );


    // ✅ Add URLs for all blog posts
    $posts = \App\Models\Post::all(); // Make sure this matches your model

    foreach ($posts as $post) {
        $sitemap->add(
            Url::create(route('post.details', $post->slug))
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
        );
    }


    $sitemap->writeToFile(public_path('sitemap.xml'));

    $this->info('✅ Sitemap generated successfully.');
    Log::info('Sitemap generated successfully');
}

}
