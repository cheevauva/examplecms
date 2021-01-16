<?php

namespace ExampleCMS\Module\Installer\Field;

class TextFromFilesystem extends \ExampleCMS\Application\Field\Text
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;
    protected $template = 'text-raw';

    public function execute($context)
    {
        $this->metadata['component'] = 'text';

        $data = parent::execute($context);

        if (empty($data['value'])) {
            $data['value'] = $this->metadata['value'];
        }

        $data['value'] = file_get_contents($this->filesystem->preparePath($data['value']));


        return $data;
    }

}
