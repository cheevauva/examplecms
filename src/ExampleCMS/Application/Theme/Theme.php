<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Theme;

class Theme implements \ExampleCMS\Contract\Application\Theme
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
    protected $themes = [];

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    protected function closureByFilename($filename)
    {
        $filename = $this->filesystem->preparePath($filename);

        $callback = function ($data) use ($filename) {
            $_ = $this->getVarByData('languages', $data);

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

    public function render(array $data)
    {
        $templateId = implode('.', $data['templateId']);

        if (!empty($this->templates[$templateId])) {
            return $this->templates[$templateId]($data);
        }

        $templates = $this->getVarByData('templates', $data);
        $assets = $this->getVarByData('assets', $data);

        if (empty($templates[$templateId])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('template "%s" is not define in "%s" theme', $templateId, $this->options['name']));
        } else {
            $this->templates[$templateId] = $this->closureByFilename($templates[$templateId]);
        }

        if (!empty($assets[$templateId])) {
            foreach ($assets[$templateId] as $id => $path) {
                list ($type, $pathName) = explode('.', $id, 2);
                $this->assets[$type][$pathName] = $path;
            }
        }

        return $this->render($data);
    }

    protected function getVarByData($var, $data)
    {
        $language = $data['language'];
        $module = (string) $data['module'];
        $theme = $this->options['name'];

        if (!empty($data['theme'])) {
            $theme = $data['theme'];
        }

        if (empty($this->themes[$theme][$module])) {
            $this->themes[$theme][$module]['templates'] = $this->metadata->get([
                'theme_templates',
                $theme,
                $module,
            ]);
            $this->themes[$theme][$module]['assets'] = $this->metadata->get([
                'theme_assets',
                $theme,
                $module,
            ]);
            $this->themes[$theme][$module]['languages'] = $this->metadata->get(array(
                'languages',
                $language,
                $module,
            ));
        }

        return $this->themes[$theme][$module][$var];
    }

    public function __invoke($data)
    {
        return $this->render($data);
    }

}
