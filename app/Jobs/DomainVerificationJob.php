<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\DomainVerificationMail;
use App\Models\Tenant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DomainVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $tenant;
    protected $user;
    public function __construct($user,Tenant $tenant)
    {
        $this->tenant = $tenant;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new DomainVerificationMail($this->tenant));
    }
}
