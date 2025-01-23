<?php

namespace app\controllers;

use Yii;

use app\models\RawatJalan;
use app\models\RawatJalanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Program;
use app\models\Model;
use yii\helpers\ArrayHelper;


/**
 * RawatJalanController implements the CRUD actions for RawatJalan model.
 */
class RawatJalanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all RawatJalan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RawatJalanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RawatJalan model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RawatJalan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RawatJalan();
        $modelsProgram = [new Program];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $modelsProgram = Model::createMultiple(Program::classname());
            Model::loadMultiple($modelsProgram, Yii::$app->request->post());
        
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsProgram) && $valid;
                    
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsProgram as $modelProgram) {
                            $modelProgram->rawat_jalan_id = $model->id;
                            if (! ($flag = $modelProgram->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        else {    

            return $this->render('create', [
                'model' => $model,
                'modelsProgram' => (empty($modelsProgram)) ? [new Program] : $modelsProgram
            ]);
        }
    
    } 

    /**
     * Updates an existing RawatJalan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsProgram = $model->programs;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsProgram, 'id', 'id');
            $modelsProgram = Model::createMultiple(Program::classname(), $modelsProgram);
            Model::loadMultiple($modelsProgram, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsProgram, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsProgram) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Program::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsProgram as $modelProgram) {
                            $modelProgram->rawat_jalan_id = $model->id;
                            if (! ($flag = $modelProgram->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsProgram' => (empty($modelsProgram)) ? [new Program] : $modelsProgram
        ]);
    }

    /**
     * Deletes an existing RawatJalan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RawatJalan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RawatJalan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RawatJalan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
