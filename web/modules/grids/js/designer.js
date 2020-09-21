var designer = angular.module('designer', []);

designer.controller('grid', ['$scope', '$http', function ($scope, $http) {
        $().dropdown('toggle');
        $scope.columnTypes = [
            {
                key: 'default',
                label: 'default'
            }
        ];
        $scope.fieldTypes = [
            {
                key: 'string',
                label: 'string'
            },
            {
                key: 'link',
                label: 'link'
            },
            {
                key: 'label',
                label: 'label'
            }

        ];

        var request = $http.get('rest/grids/designer/' + $('#grid_id').val());

        request.success(function (data, status, headers, config) {
            $scope.grid = data.view.model;
        });

        $scope.addRow = function () {
            if (typeof ($scope.grid.rows) == 'undefined') {
                $scope.grid.rows = [];
            }

            var index = $scope.grid.rows.push({
                type: 'default',
                columns: []
            });

            //$scope.addColumn($scope.grid.rows[index - 1]);
        };

        $scope.remove = function (array, index) {
            array.splice(index, 1);
        };

        $scope.copy = function (array, row) {
            array.push(angular.copy(row));
        };

        $scope.moveUp = function (array, element) {
            var index = array.indexOf(element);

            if (index == -1) {
                return false;
            }

            if (array[index - 1]) {
                array.splice(index - 1, 2, array[index], array[index - 1]);
            } else {
                return 0;
            }
        };

        $scope.moveDown = function (array, element) {
            console.log(array, element);
            var index = array.indexOf(element);

            if (index == -1) {
                return false;
            }

            if (array[index + 1]) {
                array.splice(index, 2, array[index + 1], array[index]);
            } else {
                return 0;
            }
        };

        $scope.addColumn = function (row) {
            row.columns.push({
                type: 'default',
                fields: []
            });
        };

        $scope.removeColumn = function (columns, index) {
            columns.splice(index, 1);
        };

        $scope.addField = function (column) {
            column.fields.push({
                type: 'label',
                label: 'label'
            });
        };

        $scope.save = function () {
            console.log(angular.toJson($scope.grid), $('#grid_id').val());

            $http.post('rest/grids/designer/' + $('#grid_id').val(), angular.toJson($scope.grid));
        };

    }]);
