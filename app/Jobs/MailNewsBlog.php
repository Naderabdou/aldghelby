<?php

namespace App\Jobs;

use App\Mail\BlogNewMail;
use App\Models\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MailNewsBlog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $blog;
    /**
     * Create a new job instance.
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribes = Subscribe::all();



        $data = [
            'message' => "يوجد مقال جديد تم نشره",
            'link' => route('site.blog.show', $this->blog->id),
        ];
        foreach ($subscribes as $subscribe) {
            Mail::to($subscribe->email)->send(new BlogNewMail($data));
        }
    }
}
