<?php

namespace App\Jobs;

use App\Models\Subscribe;
use Illuminate\Bus\Queueable;
use App\Mail\MakenServicesEmail;
use App\Mail\AlJADANIServicesEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\Sql\SubscribeRepository;

class SendNewServiceEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $service;
    /**
     * Create a new job instance.
     */
    protected $subscribeRepository;

    public function __construct($service)
    {

        $this->service = $service;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribes = Subscribe::all();



        $message = 'مرحبا، لدينا خدمات جديدة اسم:' . $this->service->name_ar . '   ' .  'تحقق منها!';

        foreach ($subscribes as $subscribe) {
            Mail::to($subscribe->email)->send(new AlJADANIServicesEmail($message));
        }
    }
}
