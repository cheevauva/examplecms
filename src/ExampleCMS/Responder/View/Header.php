<?php

namespace ExampleCMS\Responder\View;

class Header extends Basic
{
    public function getMenuItems()
    {
        $itemsQuery = $this->module->getQuery('all-without-parent');

        return $this->filter($itemsQuery);
    }

    protected function filter($query)
    {
        $items = array();
        $rawItems = $query->fetchMany();

        foreach ($rawItems as $rawItem) {
            if (!$rawItem->checkAccessByRoute($rawItem->get('route'))) {
                continue;
            }
            $items[] = array(
                'name' => $rawItem->getName(),
                'role' => $rawItem->getRole(),
                'targetLink' => $rawItem->getTargetLink(),
                'class' => $rawItem->getClass(),
            );
        }
        
        return $items;
    }

    public function getSubMenuItems()
    {
        $findQuery = $this->module->getQuerty('find');
        $findQuery->setParam('module', $this->context->getBundle());
        
        $current = $findQuery->fetchOne();
        
        if (!$current) {
            return array();
        }

        $subItemsQuery = $this->module->getQuery('find');
        $subItemsQuery->setParam('menuitem_id', $current->get('id'));

        return $this->filter($subItemsQuery);
    }

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $metadata['items'] = $this->getMenuItems();
        $metadata['subItems'] = $this->getSubMenuItems();

        return $metadata;
    }
}
