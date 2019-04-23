<?php

namespace Areal;

/**
 * Класс ответов
 */
class Response
{
    const SUCCESS = [
        'status' => 'ok',
    ];

    const ERROR = [
        'status' => 'error',
    ];

    public function success($data)
    {
        if ($data['status'] == 'error') {
            return $data;
        }
        return array_merge(
            self::SUCCESS,
            ['data' => $data]
        );
    }

    public function error($data)
    {
        return array_merge(
            self::ERROR,
            ['data' => $data]
        );
    }

    private function getLastId()
    {
        global $DB;
        return $DB->LastID();
    }


}
