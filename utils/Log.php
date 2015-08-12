<?php

    require_once 'Input.php';

    class Log
    {
        private $filename;
        private $handle;

        public function __construct ($prefix = 'log')
        {
            // $this->filename = "log/{$prefix}-" . date('Y-m-d') . '.log';
            $this->setFilename($prefix);
            $this->handle = fopen($this->getFilename(), 'a');
        }

        protected function setFilename($prefix)
        {
            if (is_string($prefix))
            {
                $this->filename = "log/" . trim($prefix) . "-" . date('Y-m-d') . '.log';
            } else
            {
                die();
            }

            if (!touch($this->filename) && !is_writable($this->filename))
            {
                die();
            }
        }

        public function getFilename()
        {
            return $this->filename;
        }


        public function logMessage ($logLevel, $message)
        {
            $logSpecificTime =  date("Y-m-d H:i:s");
            $stringToWrite =  "{$logSpecificTime} [{$logLevel}] {$message}";
            fwrite($this->handle, PHP_EOL . $stringToWrite);
        }

        public function logInfo ($message)
        {
            return $this->logMessage('INFO', $message);
        }

        public function logError ($message)
        {
            return $this->logMessage('ERROR', $message);
        }

        public function logWarning ($message)
        {
            return $this->logMessage('WARNING', $message);
        }

        public function __destruct ()
        {
            if (isset($this->handle))
            {
                fclose($this->handle);
            }
        }
    }
?>