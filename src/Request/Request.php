<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 9:15
 */

class Request
{
    /**
     * @var array
     */
    private $query;
    /**
     * @var array
     */
    private $request;

    /**
     * Request constructor.
     * @param array $query - Get params
     * @param array $request - Post params
     */
    public function __construct(array $query = [], array $request = [])
    {
        $this->query = $query;
        $this->request = $request;
    }

    public function get()
    {

    }
}