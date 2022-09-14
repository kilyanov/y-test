<?php

declare(strict_types=1);

namespace app\common\service;

use app\common\parse\models\BodyTypeObserver;
use app\common\parse\models\ColorObserver;
use app\common\parse\models\EngineTypeObserver;
use app\common\parse\models\GearTypeObserver;
use app\common\parse\models\GenerationObserver;
use app\common\parse\models\MarkObserver;
use app\common\parse\models\ModelObserver;
use app\common\parse\models\ObserverInterface;
use app\common\parse\models\TransmissionObserver;
use app\common\parse\ParseInterface;
use app\models\Catalog;

class CatalogService implements CatalogObservableInterface
{
    private ParseInterface $parser;
    private array $observers = [];
    private array $updateIds = [];
    private array $listAttach = [];

    public function __construct(ParseInterface $parser)
    {
        $this->parser = $parser;
        $this->listAttach = [
            ModelObserver::class,
            MarkObserver::class,
            ColorObserver::class,
            GenerationObserver::class,
            BodyTypeObserver::class,
            EngineTypeObserver::class,
            TransmissionObserver::class,
            GearTypeObserver::class
        ];
    }

    public function checkData(string $file)
    {
        foreach ($this->parser->parse($file) as $data) {
            $data = $this->parser->extract($data);
            foreach ($this->listAttach as $attach) {
                $this->attach(new $attach($data));
            }
            $this->load($data);
        }
        Catalog::deleteAll(['not in', 'id', $this->updateIds]);
    }

    public function attach(ObserverInterface $instance)
    {
        if (in_array($instance, $this->observers, true)) {
            return false;
        }

        $this->observers[] = $instance;
    }

    public function detach(ObserverInterface $instance)
    {
        foreach ($this->observers as $key => $observer) {
            if ($instance === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function load(array $data)
    {
        $model = Catalog::findOne(['id' => $data['id']]);
        if ($model === null) {
            $model = new Catalog([
                'id' => $data['id'],
                'year' => $data['year'],
                'run' => $data['run'],
                'generation_id' => $data['generation_id'],
            ]);
        }
        else {
            $model->setAttributes([
                'year' => $data['year'],
                'run' => $data['run'],
                'generation_id' => $data['generation_id'],
            ]);
        }
        foreach ($this->observers as $observer) {
            $observer->load();
            $model->setAttribute($observer->returnIndex, $observer->id);
        }
        if ($model->save()) {
            $this->updateIds[] = $model->id;
        }
    }
}
