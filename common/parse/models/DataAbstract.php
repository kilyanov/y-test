<?php

declare(strict_types=1);

namespace app\common\parse\models;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

abstract class DataAbstract implements ObserverInterface
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $nameIndex = null;
    public ?string $returnIndex = null;
    public ?array $data = null;
    public string $callClass;

    /**
     * @throws NotFoundHttpException
     */
    public function load(): void
    {
        if (!class_exists($this->callClass)) {
            throw new NotFoundHttpException("Class {$this->callClass} not exists.");
        }
        if (!array_key_exists($this->nameIndex,$this->data)) {
            throw new NotFoundHttpException("Index {$this->nameIndex} not find.");
        }
        if (!empty($this->data[$this->nameIndex])) {
            $this->exist($this->data[$this->nameIndex]);
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    public function exist(string $name): void
    {
        $model = $this->callClass::findOne(['name' => $name]);
        if ($model === null) {
            $model = $this->addData($name);
        }
        $this->setData($model->getAttributes());
    }

    /**
     * @throws NotFoundHttpException
     */
    public function addData(string $name): ActiveRecord
    {
        $model = new $this->callClass(['name' => $name]);
        if (!$model->save()) {
            $errorMsg = implode(',', $model->getFirstErrors());
            throw new NotFoundHttpException("Error: $errorMsg");
        }

        return $model;
    }

    public function setData(array $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

}
