<?php

class job {
    public function task(ConsoleLogger $logger) {
         for($i=1; $i<11; $i++) {
            $logger = new ConsoleLogger();
            $logger->log("Task nr $i was complited");

        }
    }
}

class ConsoleLogger implements Logger {
    public function log($message) {
        echo $message . "\n";
    }
}

interface Logger {
    public function log($message);
}

class NothingLogger {
    public function log($message) {
        // do nothing
    }
}

class FileLogger {
    public function log($message) {
       $file = fopen("log.log", "a");
         fwrite($file, $message . "\n");
         fclose($file);
    
    }
}


$job = new job();
$logger = new ConsolesLogger;
$job->task($logger);