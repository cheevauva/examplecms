<?php

namespace ExampleCMS\Session;

abstract class Session implements \ExampleCMS\Contract\Session
{

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @var array
     */
    protected $session = array();

    /**
     * @var true
     */
    protected $isUsed = false;
    protected $isRead = false;

    public function isUsed()
    {
        return $this->isUsed;
    }

    public function getSessionId()
    {
        return $this->sessionId;
    }

    public function setSessionId($sessionId)
    {
        $this->sessionId = preg_replace('/\W+/', '', $sessionId);
    }

    public function get($path, $default = null)
    {
        $this->read();

        if (is_string($path)) {
            $path = explode('.', $path);
        }

        $tmp = $this->session;

        foreach ($path as $cursor) {
            if (empty($tmp[$cursor])) {
                return $default;
            }
            $tmp = $tmp[$cursor];
        }

        return $tmp;
    }

    public function set($path, $value)
    {
        $this->read();

        $val = & $this->session;

        if (is_string($path)) {
            $path = explode('.', $path);
        }

        foreach ($path as $cursor) {
            if (!isset($val[$cursor])) {
                $val[$cursor] = array();
            }

            $val = & $val[$cursor];
        }

        $this->isUsed = true;
        $val = $value;
    }

    public function read()
    {
        if (empty($this->sessionId) || $this->isRead) {
            return false;
        }

        try {
            $this->session = $this->readFromStorage();
        } catch (\Exception $e) {
            $this->isUsed = true;
            $this->write();
        }

        $this->isRead = true;

        return true;
    }

    public function write()
    {
        if (!$this->isUsed) {
            return false;
        }

        if (empty($this->sessionId)) {
            $this->setSessionId($this->generateSessionId());
        }

        $this->writeToStorage();
    }

    abstract protected function readFromStorage();

    abstract protected function writeToStorage();

    /**
     * @return string
     */

    public function __debugInfo()
    {
        return [];
    }

}
