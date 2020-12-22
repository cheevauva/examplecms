<?php

namespace ExampleCMS\Session;

class File extends Session
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;
    
    protected function getPath()
    {
        return $this->filesystem->preparePath('cache/sessions/' . $this->sessionId);
    }

    protected function readFromStorage()
    {
        opcache_invalidate($this->getPath());
        
        return include $this->getPath();
    }

    protected function writeToStorage()
    {
        $path = $this->getPath();
        
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        
        file_put_contents($path, "<?php\nreturn " . var_export($this->session, true) . ';');
    }

}
