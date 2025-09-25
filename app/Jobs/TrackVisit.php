<?php

namespace App\Jobs;

use App\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrackVisit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Link
     */
    public $link;
    /**
     * @var array
     */
    public $metadata;
    /**
     * Create a new job instance.
     *
     * @param Link $link
     * @param array $metadata
     */
    public function __construct(Link $link, $metadata)
    {
        $this->link = $link;
        $this->metadata = $metadata;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->link->visits()->create([
            'metadata' => $this->metadata
        ]);
    }
}
