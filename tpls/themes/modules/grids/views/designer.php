<?php return function ($this, $metadata) { ?>
    <div ng-app="designer" ng-controller="grid">
        <input 
            type="hidden"
            id="grid_id" 
            value="<?= $metadata['model']['id']; ?>"
            />
        <span ng-include="'modules/grids/tpls/designer.html'"></span>
    </div>
<?php } ?>