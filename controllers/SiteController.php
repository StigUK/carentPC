<?php

namespace app\controllers;

use app\models\Banlist;
use app\models\CarModel;
use app\models\Category;
use app\models\ImageUpload;
use app\models\Order;
use app\models\User;
use app\models\Userinfo;
use DateTime;
use http\Url;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\debug\models\search\Debug;
use yii\debug\models\search\UserSearchInterface;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function($rule,$action)
                {

                    //throw new \yii\web\NotFoundHttpException();
                    //$this->render('site/banned');
                },
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function($rule, $action)
                        {
                            $ban = \app\models\Banlist::find()->where(['user'=>Yii::$app->user->id])->one();
                            if ($ban!=null){
                                if($ban->active==1)

                                {
                                    echo '
                                        <link href="../public/css/style.css" rel="stylesheet">
                                        <div class="banned">
                                        <div class="alert alert-danger">
                                            <h1 color="red">Ваш аккаунт заблоковано!</h1>
                                        </div>
                                        <p>
                                            Дата початку: ';
                                    echo $ban->date_from;
                                    echo '<br>
                                            Дата закінчення: ';
                                    echo $ban->date_to;
                                    echo '</p> <p>
                                            Причина блокування:<br>
                                            ';
                                    echo $ban->reason;
                                    echo '</p>
                                        <br>
                                        <h1><a href="http://carent/auth/logout">LOGOUT</a></h1>
                                        <br>
                                        <p>
                                            Якщо ви вважаєте, що отримали блокування випадково, або ваш аккаунт було взломано зверніться в службу підтримки<!
                                        </p>
                                    </div> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <br>';
                                    return 0;
                                }
                            }
                            return 1;
                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionView($id)
    {
        $carmodel = CarModel::findOne($id);
        return $this->render('car',
            [
                'carmodel' => $carmodel
            ]
        );
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionCars($category = null,$sort=null)
    {
        /*$query = CarModel::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>1]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('cars',[
            'carmodels'=>$carmodels,
            'pagination' => $pagination
            ]);*/
        //var_dump($category); die;

        if($category==null)
        {
            if(!$sort==null)
            {
                if($sort=='1')
                {
                    $query = CarModel::find()->orderBy(['price' => SORT_ASC]);
                }
                else
                {
                    $query = CarModel::find()->orderBy(['price' => SORT_DESC]);
                }
            }
            else{
                $query = CarModel::find();
            }
        }
        else{
            if(!$sort==null)
            {
                if($sort=='1')
                {
                    $query = CarModel::find()->where(['category'=>$category])->orderBy(['price' => SORT_ASC]);
                }
                else
                {
                    $query = CarModel::find()->where(['category'=>$category])->orderBy(['price' => SORT_DESC]);
                }

            }
            else
            {
                $query = CarModel::find()->where(['category'=>$category]);
            }
        }
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>4]);
        $carmodels = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('cars',[
            'carmodels'=>$carmodels,
            'pagination' => $pagination,
            '_category' => $category,
            '_sort' => $sort
        ]);
    }

    public function actionOrders()
    {
        /*$query = CarModel::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>1]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('cars',[
            'carmodels'=>$carmodels,
            'pagination' => $pagination
            ]);*/
        $query = Order::find()->where(['user_id'=>Yii::$app->user->id]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>3]);
        $orders = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('orderlist',[
            'orders'=>$orders,
            'pagination' => $pagination
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionBanned()
    {
        $ban = \app\models\Banlist::find()->where(['user'=>Yii::$app->user->id])->one();
        if ($ban!=null){
            if($ban->active==1)
            {
                return $this->render('banned');
            }
        }
        return $this->redirect('index');
    }

    public function actionUserpage()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->render('userpage');
        }
        else
        {
            return $this->redirect('../auth/login');
        }

    }

    public function actionPasschange(){
        if(!Yii::$app->user->isGuest)
        {
            $user = Yii::$app->user->identity;
            $loadedPost = $user->load(Yii::$app->request->post());

            if($loadedPost&&$user->validate())
            {
                $user->password = $user->newPassword;
                $user->save(false);
                #var_dump($user->errors);
                Yii::$app->session->setFlash('success','Ваш пароль успішно змінено!');
                return $this->refresh();
            }

            return $this->render("passchange",[
                'user' => $user,
            ]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }

    }

    public function actionBook($id)
    {
        if(!Yii::$app->user->isGuest)
        {
                $carmodel = CarModel::findOne($id);
                $order = new Order();
                if($order->load(Yii::$app->request->post()))
                {
                    if(Yii::$app->user->identity->active==1) {
                        $now=new DateTime();
                        $now =date_parse($now->format('Y-m-d'));
                        if((date_parse($order->date))>=$now){
                            $order->user_id=Yii::$app->user->id;
                            $order->car_id=$carmodel->id;
                            $order->price = ($order->term)*($carmodel->price);
                            //$order_ = new Order();
                            //$order_->car_id=1;
                            //var_dump($order_->save(false)); die;

                            if($order->save(false)){
                                //Yii::$app->session->setFlash('success','Ваше бронювання прийнято. Очікуйте підтердження!');
                                //return $this->refresh();
                            }
                            else{
                                Yii::$app->session->setFlash('error','Помилка оформлення замовлення');
                            }
                        }
                        else{
                            Yii::$app->session->setFlash('error','Помилка! Дата початку оренди вказана в минулому часі.');
                            return $this->redirect(Yii::$app->request->referrer);
                        }
                    }
                    else {
                        Yii::$app->session->setFlash('error','Помилка! Ваш аккаунт не підтверджено адміністрацією! Ви не можете здійснювати бронювання!.');
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                    //var_dump(date_parse(date(time())));

                }
                return $this->render('book',[
                    'carmodel' => $carmodel,
                    'order' => $order
                ]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }
    }

    public function actionSetuimage()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new ImageUpload;
            $model->folder='user';
            if(Yii::$app->request->isPost)
            {
                $userinfo = Userinfo::find()->where(['user'=>Yii::$app->user->id])->one();
                $file = UploadedFile::getInstance($model, 'image');
                if($userinfo->saveImage($model->uploadImage($file, $userinfo->photo_user)))
                {
                    $this->redirect('userpage');
                }
            }
            return $this->render('userimage', ['model'=>$model]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }

    }
    public function actionSetpimage()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new ImageUpload;
            $model->folder='user';
            if(Yii::$app->request->isPost)
            {
                $userinfo = Userinfo::find()->where(['user'=>Yii::$app->user->id])->one();
                $file = UploadedFile::getInstance($model, 'image');
                if($userinfo->savepImage($model->uploadImage($file, $userinfo->photo_passport)))
                {
                    $this->redirect('userpage');
                }
            }
            return $this->render('userimage', ['model'=>$model]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }
    }
    public function actionSetdimage()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new ImageUpload;
            $model->folder='user';
            if(Yii::$app->request->isPost)
            {
                $userinfo = Userinfo::find()->where(['user'=>Yii::$app->user->id])->one();
                $file = UploadedFile::getInstance($model, 'image');
                if($userinfo->savedImage($model->uploadImage($file, $userinfo->photo_license)))
                {
                    $this->redirect('userpage');
                }
            }
            return $this->render('userimage', ['model'=>$model]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }

    }

    public function actionEditprofile()
    {
        if(!Yii::$app->user->isGuest)
        {
            $userinfo = Userinfo::find()->where(['user'=>Yii::$app->user->id])->one();

            if ($userinfo->load(Yii::$app->request->post()) && $userinfo->save()) {
                return $this->redirect(['userpage']);
            }

            return $this->render('editprofile', [
                'userinfo' => $userinfo,
            ]);
        }
        else
        {
            return $this->redirect('../auth/login');
        }
    }
}
