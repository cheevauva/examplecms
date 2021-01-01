<?php

namespace ExampleCMS\Application\Field;

class Link extends Base
{

    protected $type = 'link';

    protected function getTemplateId()
    {
        if (!$this->checkRouteAccess($this->metadata['route'])) {
            return $this->getEmptyTemplatePath();
        }

        return parent::getTemplateId();
    }

    public function checkRouteAccess($route)
    {
        $currentUser = $this->context->getUser();
        $operation = $this->router->getOperation($route);

        return $currentUser->hasAccess($this->getModule(), $operation);
    }

    public function execute($request)
    {
        $metadata = parent::getData($request);

        $metadata['label'] = $metadata['name'];
        $metadata['url'] = $request->router->make($metadata['route'], array(
            'module' => $this->getModule(),
            'id' => $this->get('id'),
        ));

        if (empty($metadata['use_label'])) {
            $metadata['label'] = $this->model->get($metadata['label']);
        }

        return $metadata;
    }

}
