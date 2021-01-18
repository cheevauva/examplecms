<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class Layout extends \ExampleCMS\Application\Responder\Responder
{

    /**
     * @var string
     */
    protected $templateType = 'layouts';

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['basePath'] = $context['basePath'] ?? null;

        if (empty($this->metadata['views'])) {
            $this->metadata['views'] = [];
        }

        $views = $this->metadata['views'];

        if (!empty($context['views'])) {
            foreach ($context['views'] as $name => $view) {
                $views[$name] = $view;
            }
        }

        foreach ($views as $name => $view) {
            $data['views'][$name] = $this->module->view($view)->execute($context);
        }

        return $data;
    }

}
