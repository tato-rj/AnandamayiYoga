<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompileLocales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:compile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the json used for localized strings';

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
        $raw = $this->getJsonFiles();
        $files = $this->clean($raw);
        $this->generate($files);        
        
        $this->info('All localized files have been merged and are ready to be used.');
    }

    public function generate($array)
    {
        $ptJson = fopen('resources/lang/pt.json', 'w');
        fwrite($ptJson, $array);
        fclose($ptJson);        
    }

    public function getJsonFiles()
    {
        $array = [];

        foreach(\File::allFiles('resources/lang/strings') as $file) {
            $newJson = file_get_contents($file->getPathname());
            array_push($array, json_decode($newJson));
        }

        return $array;
    }

    public function clean($array)
    {
        $result = str_replace(['[', ']', '},{'], '', json_encode($array));
        $result = str_replace('},null,{', ',', $result);   
        return str_replace('""', '","', $result);   
    }
}
