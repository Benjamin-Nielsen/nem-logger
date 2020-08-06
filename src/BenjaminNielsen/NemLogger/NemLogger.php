<?php

namespace BenjaminNielsen\NemLogger;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class NemLogger
{
    protected $logsDirectory;

    public function __construct($logsDirectory)
    {
        $this->logsDirectory = $logsDirectory;
    }

    public function logIpWithResource($id, $ip, $resource)
    {
        $timestamp = Carbon::now()->timezone('UTC')->format('Y-m-d H:i:s');
        Log::channel('secure_info')->info("Log ressource forespørgsel", [
            'id' => $id,
            'ip' => $ip,
            'resource' => $resource,
            'timestamp' => $timestamp,
        ]);
    }

    /**
     * The Nem logging policy requires the implementor to log to a secure file that is not editable by any user.
     * This function will log anything put in to the name value $attributes map given.
     * @param $attributes The names and values to log in to the secure channel.
     */
    public function log(string $message = "Log ressource forespørgsel", array $attributes = [])
    {
        if (count($attributes) > 0) {
            Log::channel('secure_info')->info($message, $attributes);
        }
    }
}
