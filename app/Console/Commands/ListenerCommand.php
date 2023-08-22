<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PAMI\Client\Exception\ClientException;
use PAMI\Client\Impl\ClientImpl;

class ListenerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Asterisk:Listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private const PAMI_CLIENT_OPTIONS  = [
        'host' => '127.0.0.1',
        'scheme' => 'tcp://',
        'port' => '5038',
        'username' => 'vpbrasilfone' ,
        'secret' => 'vpbsf',
        'connect_timeout' => 60000,
        'read_timeout' => 60000
    ];

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
     * Open connection with asterisk.
     *
     * @return void
     * @throws ClientException
     */
    public function handle(): void
    {
        $pmiClient = (new ClientImpl(self::PAMI_CLIENT_OPTIONS));
        $pmiClient->open();
        $pmiClient->close();
    }
}
