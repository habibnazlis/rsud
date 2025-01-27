<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
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
            'modelsProgram' => (empty($modelsProgram)) ? [new Program] : $modelsProgram

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
            if (!$valid) {
                // Menampilkan pesan kesalahan untuk model utama (RawatJalan)
                var_dump($model->errors); // Menampilkan error untuk model RawatJalan
                // Menampilkan pesan kesalahan untuk model terkait (Program)
                echo "<br>";
                echo " ";
                echo "<br>";
                var_dump($modelsProgram[0]->errors); // Menampilkan error untuk model Program pertama
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
        Program::deleteAll(['rawat_jalan_id' => $id]);
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

//     public function actionPrintPdf($id)
// {
//     // Ambil data dari database berdasarkan ID
//     $data = Yii::$app->db->createCommand("SELECT * FROM form_kfr WHERE id=:id")
//         ->bindValue(':id', $id)
//         ->queryOne();

//     if (!$data) {
//         throw new \yii\web\NotFoundHttpException("Data dengan ID $id tidak ditemukan.");
//     }

//     try {
//         // Inisialisasi mPDF
//         $mpdf = new \Mpdf\Mpdf();

//         // Render tampilan HTML untuk PDF
//         $html = $this->renderPartial('print', ['data' => $data]);

//         // Tambahkan konten ke mPDF
//         $mpdf->WriteHTML($html);

//         // Output file PDF (D: download, I: tampilkan di browser)
//         $mpdf->Output('form-kfr.pdf', 'I');
//     } catch (\Mpdf\MpdfException $e) {
//         Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat mencetak: ' . $e->getMessage());
//         return $this->redirect(['index']);
//     }
// }

    public function actionPrint($id) 
    {
        $model = $this->findModel($id);
        $modelsProgram = $model->programs;
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('print', [
            'model' => $model,
            'modelsProgram' => $modelsProgram

        ]);
    
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
            // set mPDF properties on the fly
            'options' => ['title' => 'Rawat Jalan Pasien'],
            // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }	

}
