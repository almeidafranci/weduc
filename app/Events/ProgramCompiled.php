<?php

namespace App\Events;

use App\Models\Program;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProgramCompiled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $program;
    public $exception;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Program  $program
     * @param \Exception|null  $exception
     * @return void
     */
    public function __construct(Program $program, \Exception $exception = null)
    {
        $this->program = $program;
        $this->exception = $exception;
    }
}
