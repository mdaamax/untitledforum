<?php

namespace app\controllers;

use app\entity\Subsections;
use app\entity\Users;
use app\models\CreateMessage;
use app\models\CreateSection;
use app\models\CreateSubSection;
use app\models\CreateTopic;
use app\models\RegistrationForm;
use app\repository\MessageRepository;
use app\repository\SectionRepository;
use app\repository\SubSectionRepository;
use app\repository\TopicRepository;
use app\repository\UserRepository;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
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
            ],
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
        $Sections = SectionRepository::getSection();
        return $this->render('index', ['section' => $Sections]);
    }
    public function actionSubsection($section_id){
        $Subsection = SubSectionRepository::getSubsection($section_id);
        return $this->render('Subsection', ['Subsection' => $Subsection,'section_id' => $section_id]);
    }
    public function actionTopic($subsection_id){
        $Subsection = TopicRepository::getTopic($subsection_id);
        return $this->render('Topic', ['Topic' => $Subsection, 'subsection_id' => $subsection_id]);
    }

    public function actionMessage($topic_id){



        $model = new CreateMessage();
        $model -> topic_id = $topic_id;
        if ($model->load(Yii::$app->request->post()) && $model->valiDate()) {
            $userId = MessageRepository::createMessage(
                $model->content,
                $model->topic_id,
                Yii::$app->user->id
            );
            $model->content='';
        }
        $Message = MessageRepository::getMessage($topic_id);
        return $this->render('Message', ['Message' => $Message,'model' => $model]);

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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
    public function actionRegistration(){

        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post()) && $model->valiDate()) {
            $userId = UserRepository::createUser(
                $model->email,
                $model->password
            );
            Yii::$app->user->login(Users::findIdentity($userId),0);
            return $this->goBack();
        }
        return $this->render('registration', [
            'model' => $model,
        ]);

    }
    public function actionCreateSection(){
        $model = new CreateSection();
        if ($model->load(Yii::$app->request->post()) && $model->valiDate()) {
            $userId = SectionRepository::createSection(
                $model->name
            );
            return $this->goBack();
        }
        return $this->render('createSection', [
            'model' => $model,
        ]);
    }
    public function actionCreateSubsection($section_id){
        $model = new CreateSubSection();
        $model -> section_id = $section_id;
        if ($model->load(Yii::$app->request->post()) && $model->valiDate()) {
            $userId = SubSectionRepository::createSubSection(
                $model->name,
                $model->section_id
            );
            return $this->goBack();
        }
        return $this->render('createSection', [
            'model' => $model,
        ]);
    }
    public function actionCreateTopic($subsection_id){
        $model = new CreateTopic();
        $model -> subsection_id = $subsection_id;
        if ($model->load(Yii::$app->request->post()) && $model->valiDate()) {
            $userId = TopicRepository::createTopic(
                $model->name,
                $model->subsection_id,
                Yii::$app->user->id
            );
            return $this->goBack();
        }
        return $this->render('createTopic', [
            'model' => $model,
        ]);
    }
}
