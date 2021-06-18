<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

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
        SitemapGenerator::create('https://uavsurveyaustralia.com')
            ->shouldCrawl(function (UriInterface $url) {
                // All pages will be crawled, except the contact page.
                // Links present on the contact page won't be added to the
                // sitemap unless they are present on a crawlable page.

                return strpos($url->getPath(), '/uploads') === false;
            })
            ->writeToFile(public_path('sitemap.xml'));
        // modify this to your own needs
//        SitemapGenerator::create(config('app.url'))
//            ->writeToFile(public_path('sitemap.xml'));
    }
}
