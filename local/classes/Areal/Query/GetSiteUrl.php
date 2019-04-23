<?php

namespace Areal\Query;

class GetSiteUrl implements QueryInterface
{
    public function get(array $params = [])
    {
        $baseUrl = SITE_SERVER_NAME ?? $_SERVER['HTTP_HOST'];
        if (strpos('http', $baseUrl)) {
            return SITE_SERVER_NAME;
        }
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true
            ? 'https://'
            : 'http://';
        return $protocol . $baseUrl;
    }
}
