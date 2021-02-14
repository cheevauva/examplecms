<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Renderer implements \ExampleCMS\Contract\Renderer
{

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    /**
     * @var array
     */
    protected $templates;

    /**
     * @var array
     */
    protected $assets = [];

    /**
     * @var array 
     */
    protected $options = [];

    /**
     * @var array 
     */
    protected $renderers = [];

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    protected function closureByFilename($filename)
    {
        $filename = $this->filesystem->preparePath($filename);

        $callback = function ($data) use ($filename) {
            $_ = $this->getVarByData('languages', $data);
            $e = function ($string) {
                return htmlspecialchars($string);
            };

            if (!is_array($data)) {
                echo '<pre>';
                print_r($data);
                die;
            }

            ob_start();
            extract($data);

            require $filename;

            return ob_get_clean();
        };

        \Closure::bind($callback, $this);

        return $callback;
    }

    public function execute(array $data)
    {
        $templateId = implode('.', $data['templateId']);

        if (!empty($this->templates[$templateId])) {
            return $this->templates[$templateId]($data);
        }

        $templates = $this->getVarByData('templates', $data);
        $assets = $this->getVarByData('assets', $data);

        if (empty($templates[$templateId])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('template "%s" is not define in "%s" renderer', $templateId, $this->options['name']));
        } else {
            $this->templates[$templateId] = $this->closureByFilename($templates[$templateId]);
        }

        if (!empty($assets[$templateId])) {
            foreach ($assets[$templateId] as $id => $path) {
                list ($type, $pathName) = explode('.', $id, 2);
                $this->assets[$type][$pathName] = $path;
            }
        }

        return $this->execute($data);
    }

    protected function getVarByData($var, $data)
    {
        $language = $data['language'];
        $module = $data['module'];
        $renderer = $this->options['name'];

        if (!empty($data['renderer'])) {
            $renderer = $data['renderer'];
        }

        if (empty($this->renderers[$renderer][$module])) {
            $this->renderers[$renderer][$module]['templates'] = $this->metadata->get(['renderer_templates', $renderer, $module]);
            $this->renderers[$renderer][$module]['assets'] = $this->metadata->get(['renderer_assets', $renderer, $module]);
            $this->renderers[$renderer][$module]['languages'] = $this->metadata->get(['languages', $language, $module]);
        }

        return $this->renderers[$renderer][$module][$var];
    }

    public function __invoke($data)
    {
        return $this->execute($data);
    }

}
