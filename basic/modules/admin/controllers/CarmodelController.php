<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\ImageUpload;
use Yii;
use app\models\Carmodel;
use app\models\CarmodelSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarmodelController implements the CRUD actions for Carmodel model.
 */
class CarmodelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Carmodel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarmodelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carmodel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Carmodel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carmodel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Carmodel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carmodel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carmodel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carmodel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carmodel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSetImage($id)
    {
        $model = new ImageUpload;
        $model->folder='car';
        if(Yii::$app->request->isPost)
        {
            $carmodel = $this->findModel($id);
//            var_dump($carmodel->name);die;
            $file = UploadedFile::getInstance($model, 'image');
            if($carmodel->saveImage($model->uploadImage($file, $carmodel->picture)))
            {
                $this->redirect(['view','id'=>$carmodel->id]);
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionSetCategory($id)
    {
        $carmodel = $this->findModel($id);
        //$category = Category::findOne(1);
        //var_dump($category->carModels); die;
        //var_dump($carmodel->category0->name);
        $currentCategory = $carmodel->category0->id;
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'name');
        if (Yii::$app->request->isPost){
          $category = Yii::$app->request->post('category');
          if($carmodel->saveCategory($category))
          {
              return $this->redirect(['view', 'id'=>$carmodel->id]);
          }
          else{

          }
        }
        return $this->render('category', [
            'carmodel' => $carmodel,
            'selectedCategory' => $currentCategory,
            'categories' => $categories
        ]);

    }
}
