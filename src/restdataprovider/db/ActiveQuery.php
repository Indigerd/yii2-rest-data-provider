<?php

namespace indigerd\restdataprovider\db;

use yii\base\NotSupportedException;
use yii\db\ActiveQueryInterface;
use yii\db\ActiveQueryTrait;
use yii\db\ActiveRelationTrait;
use yii\helpers\ArrayHelper;

class ActiveQuery extends Query implements ActiveQueryInterface
{
    use ActiveQueryTrait;
    //use ActiveRelationTrait;

    /**
     * @event Event an event that is triggered when the query is initialized via [[init()]].
     */
    const EVENT_INIT = 'init';

    /**
     * Constructor.
     *
     * @param string $modelClass the model class associated with this query
     * @param array $config configurations to be applied to the newly created query object
     */
    public function __construct($modelClass, $config = [])
    {
        $this->modelClass = $modelClass;
        parent::__construct($config);
    }

    /**
     * Initializes the object.
     * This method is called at the end of the constructor. The default implementation will trigger
     * an [[EVENT_INIT]] event. If you override this method, make sure you call the parent implementation at the end
     * to ensure triggering of the event.
     */
    public function init()
    {
        parent::init();
        $this->trigger(self::EVENT_INIT);
    }

    public function populateRelation($name, &$primaryModels)
    {
        throw new NotSupportedException('populateRelation method not supported');
    }

    public function via($relationName, callable $callable = null)
    {
        throw new NotSupportedException('via method not supported');
    }

    public function findFor($name, $model)
    {
        throw new NotSupportedException('findFor method not supported');
    }
}
