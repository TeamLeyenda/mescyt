<?php

namespace backend\controllers;

use Yii;
use backend\models\Presentador;
use backend\models\CongresoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresentadorController implements the CRUD actions for Presentador model.
 */
class PresentadorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new', 'add-catalogo', 'add-presentador-area-especializacion', 'add-presentador-conferencia', 'add-presentador-grado-academico', 'add-presentador-sala'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Presentador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CongresoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Presentador model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerCatalogo = new \yii\data\ArrayDataProvider([
            'allModels' => $model->catalogos,
        ]);
        $providerPresentadorAreaEspecializacion = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorAreaEspecializacions,
        ]);
        $providerPresentadorConferencia = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorConferencias,
        ]);
        $providerPresentadorGradoAcademico = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorGradoAcademicos,
        ]);
        $providerPresentadorSala = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorSalas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerCatalogo' => $providerCatalogo,
            'providerPresentadorAreaEspecializacion' => $providerPresentadorAreaEspecializacion,
            'providerPresentadorConferencia' => $providerPresentadorConferencia,
            'providerPresentadorGradoAcademico' => $providerPresentadorGradoAcademico,
            'providerPresentadorSala' => $providerPresentadorSala,
        ]);
    }

    /**
     * Creates a new Presentador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Presentador();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Presentador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Presentador();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Presentador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export Presentador information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerCatalogo = new \yii\data\ArrayDataProvider([
            'allModels' => $model->catalogos,
        ]);
        $providerPresentadorAreaEspecializacion = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorAreaEspecializacions,
        ]);
        $providerPresentadorConferencia = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorConferencias,
        ]);
        $providerPresentadorGradoAcademico = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorGradoAcademicos,
        ]);
        $providerPresentadorSala = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentadorSalas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerCatalogo' => $providerCatalogo,
            'providerPresentadorAreaEspecializacion' => $providerPresentadorAreaEspecializacion,
            'providerPresentadorConferencia' => $providerPresentadorConferencia,
            'providerPresentadorGradoAcademico' => $providerPresentadorGradoAcademico,
            'providerPresentadorSala' => $providerPresentadorSala,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new Presentador model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id) {
        $model = new Presentador();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the Presentador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presentador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presentador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Catalogo
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCatalogo()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Catalogo');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCatalogo', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PresentadorAreaEspecializacion
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPresentadorAreaEspecializacion()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PresentadorAreaEspecializacion');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPresentadorAreaEspecializacion', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PresentadorConferencia
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPresentadorConferencia()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PresentadorConferencia');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPresentadorConferencia', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PresentadorGradoAcademico
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPresentadorGradoAcademico()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PresentadorGradoAcademico');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPresentadorGradoAcademico', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PresentadorSala
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPresentadorSala()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PresentadorSala');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPresentadorSala', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
