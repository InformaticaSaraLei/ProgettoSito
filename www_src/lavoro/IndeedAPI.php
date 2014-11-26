<?php

class IndeedAPI
{

    private $version = 2;

    private $pubID;

    private $format = 'json';

    private $rootURL = 'http://api.indeed.com/ads/apisearch';

    private $url = '';

    private $acceptedParams = array('q', 'l', 'sort', 'radius', 'st', 'jt', 'start', 'limit', 'highlight', 'filter', 'latlong', 'co', 'chnl', 'jobkeys');

    private $defaultParams = array();

    public function __construct($pubID, $format = '')
    {
        // Pass in pubisher ID as integer
        $this->pubID = $pubID;
        // Check that argument is either `json` or `xml`
        if (in_array(strtolower($format), array(
            'json',
            'xml'
        )))
            $this->format = strtolower($format);
    }

    public function setDefaultParams($params = array())
    {
        $this->defaultParams = $params;
    }

    public function getDefaultParams()
    {
        return $this->defaultParams;
    }

    public function query($params, $raw = false)
    {
        $url = $this->rootURL . '?publisher=' . $this->pubID . '&v=' . $this->version . '&format=' . $this->format;
        if (is_array($params)) {
            $url .= $this->makeURI($params);
        } elseif (is_string($params)) {
            $url .= $this->makeURI(array(
                'q' => $params
            ));
        }
        $this->url = $url;
        if ($raw === false && $this->format === 'json') {
            $file   = file_get_contents($url);
            $output = json_decode($file);
        } elseif ($raw === false && $this->format === 'xml') {
            $output = simplexml_load_file($url);
        } else {
            $output = file_get_contents($url);
        }
        return $output;
    }

    public function getURL()
    {
        return $this->URL;
    }

    private function makeURI($params = array())
    {
        $params = array_merge($this->defaultParams, $params);
        $uri    = '';
        foreach ($params as $key => $value) {
            if (in_array($key, $this->acceptedParams))
                $uri .= '&' . $key . '=' . urlencode($value);
        }
        if (isset($_SERVER['REMOTE_ADDR']))
            '&userip=' . urlencode($_SERVER['REMOTE_ADDR']);
        if (isset($_SERVER['HTTP_USER_AGENT']))
            '&useragent=' . urlencode($_SERVER['HTTP_USER_AGENT']);
        return $uri;
    }
}


class IndeedAPI2 {
    const DEFAULT_FORMAT = "json";
    const API_SEARCH_ENDPOINT = "http://api.indeed.com/ads/apisearch";
    const API_JOBS_ENDPOINT = "http://api.indeed.com/ads/apigetjobs";
    private static $API_SEARCH_REQUIRED = array("userip", "useragent", array("q", "l"));
    private static $API_JOBS_REQUIRED = array("jobkeys");
    public function __construct($publisher, $version = "2"){
        $this->publisher = $publisher;
        $this->version = $version;
    }
    public function search($args){
        return $this->process_request(self::API_SEARCH_ENDPOINT, $this->validate_args(self::$API_SEARCH_REQUIRED, $args));
    }
    public function jobs($args){
        $valid_args = $this->validate_args(self::$API_JOBS_REQUIRED, $args);
        $valid_args["jobkeys"] = implode(",", $valid_args['jobkeys']);
        return $this->process_request(self::API_JOBS_ENDPOINT, $valid_args);
    }
    private function process_request($endpoint, $args){
        $format = (array_key_exists("format", $args) ? $args["format"] : self::DEFAULT_FORMAT);
        $raw = ($format == "xml" ? true : (array_key_exists("raw", $args) ? $args["raw"] : false));
        $args["publisher"] = $this->publisher;
        $args["v"] = $this->version;
        $args["format"] = $format;
        $c = curl_init(sprintf("%s?%s", $endpoint, http_build_query($args)));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($c);
        curl_close($c);
        $r = (!$raw ? json_decode($result, $assoc = true) : $result);
        return $r;
    }
    private function validate_args($required_fields, $args){
        foreach($required_fields as $field){
            if(is_array($field)){
                $has_one_required = false;
                foreach($field as $f){
                    if(array_key_exists($f, $args)){
                        $has_one_required = True;
                        break;
                    }
                }
                if(!$has_one_required){
                    throw new Exception(sprintf("You must provide one of the following %s", implode(",", $field)));
                }
            } elseif(!array_key_exists($field, $args)){
                throw new Exception("The field $field is required");
            }
        }
        return $args;
    }
}

?>