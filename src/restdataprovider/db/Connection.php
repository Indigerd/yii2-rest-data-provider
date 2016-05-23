<?php

namespace indigerd\restdataprovider\db;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\NotSupportedException;
use yii\caching\Cache;
use indigerd\restdataprovider\db\cache\QueryCacheTrait;
use indigerd\restdataprovider\auth\AuthInterface;
use GuzzleHttp\Client;

class Connection extends Component
{
    use QueryCacheTrait;

    public $baseUrl;

    protected $auth;

    protected $authUse = 'header';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array query cache parameters for the [[cache()]] calls
     */
    private $_queryCacheInfo = [];

    public function __construct(Client $client = null, $config = [])
    {
        $this->client = $client ?: new Client();
        parent::__construct($config);
    }

    public function setAuth(AuthInterface $auth, $authUse = '')
    {
        $this->auth = $auth;
        if (!empty($authUse)) {
            if (!in_array($authUse, ['header', 'query', 'both'])) {
                throw new NotSupportedException('Unsupported auth usage: ' . $authUse);
            }
            $this->authUse = $authUse;
        }
    }

}
