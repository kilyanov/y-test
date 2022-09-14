<?php

declare(strict_types=1);

namespace app\commands;

use app\common\parse\XmlParse;
use app\common\service\CatalogService;
use yii\console\Controller;
use yii\web\NotFoundHttpException;

class ParseController extends Controller
{
    /**
     * @throws \Exception
     */
    public function actionIndex($fileParse = null)
    {
        if (empty($fileParse)) {
            $fileParse = \Yii::$app->params['defaultFileData'];
        }
        $fileParse = \Yii::getAlias('@app') . $fileParse;
        if (!file_exists($fileParse)) {
            throw new NotFoundHttpException("File {$fileParse} not exists.");
        }
        $service = new CatalogService(new XmlParse());
        $service->checkData($fileParse);
    }
}
