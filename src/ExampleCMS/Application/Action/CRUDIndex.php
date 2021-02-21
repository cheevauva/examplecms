<?php

namespace ExampleCMS\Application\Action;

class CRUDIndex extends Action
{

    const META_LIMIT = 'limit';
    const META_QUERY = 'query';

    public function __construct($module, $metadata)
    {
        parent::__construct($module, $metadata);
        
        $this->metadata[static::META_LIMIT] = $this->metadata[static::META_LIMIT] ?? 10;
        $this->metadata[static::META_QUERY] = $this->metadata[static::META_QUERY] ?? 'find';
    }

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $collection = $this->query($this->metadata[static::META_QUERY])->fetch([
            \ExampleCMS\Contract\Application\Query\Find::LIMIT => $this->metadata[static::META_LIMIT],
        ])->collection();

        return $context->withCollection($this->metadata['collection'], $collection);
    }

}
