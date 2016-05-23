<?php

namespace indigerd\restdataprovider\db;

use Yii;
use yii\base\Component;
use yii\db\QueryInterface;
use yii\db\QueryTrait;

class Query extends Component implements QueryInterface
{
    use QueryTrait;

    public function all($db = null)
    {

    }

    public function one($db = null)
    {

    }

    public function count($q = '*', $db = null)
    {

    }

    public function exists($db = null)
    {

    }
}