<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        /* @var $query \ExampleCMS\Module\Installer\Query\FindFormModel */
        $query = $this->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $context->getAttribute('request'),
            $query::FORM => $this->metadata['form'],
        ]);

        $model = $this->query('find')->fetch();
        $formModel->bindTo($model);

        $save = $this->query('save');
        $save->execute([
            $save::MODEL => $model,
        ]);

        $session = $context->getAttribute('session');
        $session->set('language', $model->get('language_installer'));

        return $context;
    }

}
