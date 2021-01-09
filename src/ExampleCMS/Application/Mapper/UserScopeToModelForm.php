<?php

namespace ExampleCMS\Application\Mapper;

class UserScopeToModelForm implements \ExampleCMS\Contract\Application\Mapper
{

    public function execute(array $params)
    {
        /** @var \ExampleCMS\Contract\Model $model */
        $model = $params[static::TO];
        $metadata = $model->getMetadata();

        /** @var \Psr\Http\Message\ServerRequestInterface $request */
        $request = $params[static::FROM];
        $body = $request->getParsedBody();

        $form = isset($body[$metadata['name']]) ? $body[$metadata['name']] : [];

        if (empty($metadata['map'])) {
            $metadata['map'] = [];
        }

        $map = $metadata['map'];
        $data = [];

        foreach ($map as $from => $to) {
            $value = null;
            
            if (isset($form[$from])) {
                $value = $form[$from];
            }
            
            $data[$to] = $value;
        }

        $model->fromArray($data);
    }

}
