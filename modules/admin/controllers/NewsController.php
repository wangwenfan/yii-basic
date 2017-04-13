<?php

namespace app\modules\admin\controllers;

use app\models\Cate;
use app\models\Tag;
use app\models\TagNews;
use app\models\Upload;
use Codeception\Lib\Driver\Db;
use Yii;
use app\models\News;
use app\models\SearchNews;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(), // 使用核心过滤器Access 对执行动作进行验证
                'denyCallback' => function ($rule, $action) { //认证失败后回调函数
                    $this->goHome();
                },
                'rules' => [ // 规则
                    [
                        'actions' => [],
                        'allow' => true, // 只允许认证用户进行访问
                        'roles' => ['@'], //?为游客 @为认证用户
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchNews();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $mdoel = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $fmodel = new Upload();
        $tnModel = new TagNews();
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->save();
                $news_id = Yii::$app->db->getLastInsertID();//文章id
                $tag_idArray = Yii::$app->request->post('TagNews')['tag_id'];
                foreach ($tag_idArray as $tag_id) {
                    $data[]=[
                        'tag_id'=>$tag_id,
                        'news_id'=>$news_id,
                        'inputtime'=>time()
                    ];
                }
                Yii::$app->db->createCommand()
                    ->batchInsert(TagNews::tableName(),['tag_id','news_id','inpnttime'],
                        $data)
                    ->execute();
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->news_id]);
            } catch (Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
        } else {
            $model->status = 1;
            $tagRe = $this->findTagData();
            return $this->render('create', [
                'model' => $model,
                'fmodel' => $fmodel,
                'catRe' => $this->findCateData(),
                'tnModel' => $tnModel,
                'tagRe' => $tagRe
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fmodel = new Upload();
        $tnModel = new TagNews();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->news_id]);
        } else {
            $tagRe = $this->findTagData();
            $taglist=$tnModel->getTagList($id);
            return $this->render('update', [
                'model' => $model,
                'fmodel' => $fmodel,
                'catRe' => $this->findCateData(),
                'tnModel' => $tnModel,
                'tagRe' => $tagRe,
                'taglist' =>$taglist
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /** 查询栏目数据
     * @return array
     */
    protected function findCateData()
    {
        $cate = Cate::find(['status' => 1])->all();
        $catRe = [];
        foreach ($cate as $val) {
            $catRe[$val->catid] = $val->catname;
        }
        return $catRe;
    }

    protected function findTagData()
    {
        $t = Tag::find()->all();
        $tagRe = [];
        foreach ($t as $v) {
            $tagRe[$v->tag_id] = $v->tagname;
        }

        return $tagRe;
    }

}
