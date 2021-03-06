<?php

namespace Areal\Controller;

class Base
{
    const STATUS_OK = 'ok';
    const STATUS_ERROR = 'error';
    protected $modelClass = null;
    protected $model = null;

    public function __construct()
    {
        if (!empty($this->modelClass)) {
            $this->model = $this->modelClass;
        }
    }

    public function index()
    {
        if (empty($this->model)) {
            return [];
        }
        return $this->model::getList();
    }

    public function show($id)
    {
        if (empty($this->model)) {
            return [];
        }
        return $this->model::getList([
            'filter' => ['id' => $id]
        ]);
    }

    public function create(array $params = [], array $unsetBodyParams = [])
    {
        $fullParams = $this->getFullParams($params, $unsetBodyParams);
        $result = $this->model::add($fullParams);
//        $fullParams['id'] = $this->getLastId();
        if ($result) {
            return $this->getSuccessResponse($fullParams);
        }
        return $this->error(false);
    }

    public function update($id, array $params = [], array $unsetBodyParams = [])
    {
        $fullParams = $this->getFullParams($params, $unsetBodyParams);
        $result = $this->model::update($id, $fullParams);
        if ($result) {
            return $this->getSuccessResponse($fullParams);
        }
        return $this->error($id);
    }

    private function getFullParams(array $params = [], array $unsetBodyParams = [])
    {
        $fullParams = array_merge(
            $this->getPostParamsFromJson(),
            $params
        );

        if (empty($unsetBodyParams)) {
            return $fullParams;
        }

        foreach ($unsetBodyParams as $paramName) {
            unset($fullParams[$paramName]);
        }

        return $fullParams;
    }

    public function delete($id)
    {
        if (empty($this->model)) {
            return false;
        }
        $this->model::delete($id);
        return $this->successDeleted($id);
    }

    protected function getSuccessResponse($data)
    {
        return array_merge(
            $this->getSuccess(),
            ['data' => $data]
        );
    }

    protected function getErrorResponse($data)
    {
        return array_merge(
            $this->error(),
            ['data' => $data]
        );
    }

    protected function successDeleted($id)
    {
        return [
            'status' => 'ok',
            'message' => 'deleted',
            'id' => $id
        ];
    }

    public function getSuccess()
    {
        return [
            'status' => 'ok',
        ];
    }

    protected function getLastId()
    {
        global $DB;
        return $DB->LastID();
    }

    protected function successUpdatedWithListByFilter($entityName, $filter)
    {
        $list = $this->model::getList([
          'filter' => $filter
        ]);
        return $this->successUpdatedWithList($entityName, $list);
    }

    protected function successUpdatedWithList($entityName, $list)
    {
        return array_merge(
            $this->getSuccess(),
            [
                'entity' => $entityName,
                'list' => $list
            ]
        );
    }

    protected function error($id)
    {
        return [
            'status' => 'error',
            'id' => $id
        ];
    }

    protected function getPostParamsFromJson()
    {
        $result = [];
        $bodyParams = \App\Util::getPostParamsFromJson();
        foreach ($bodyParams as $key => $value) {
            $result[$key] = (is_array($value))
                ? $value
                : htmlspecialchars($value);
        }
        return $result;
    }
}
