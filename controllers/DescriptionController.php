<?php

namespace app\controllers;

use Yii;
use app\models\Description;
use app\models\Tag;
use app\models\DescriptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DescriptionController implements the CRUD actions for Description model.
 */
class DescriptionController extends Controller
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
        ];
    }

    public function actionIndex()
    {
        

        $searchModel = new DescriptionSearch();
        //Problemi!!! It didn't work :(
       // $model = Description::findBySql('SELECT * FROM `description` AS a INNER JOIN `tag` AS b ON a.`tag`=b.`tag_id` ')->all();
       // $model = Description::find()->join('INNER JOIN','tag','description.tag=tag.tag_id')->all();
        $model = Description::find()->all();
        $tag = Tag::find()->all();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',['model'=>$model,'tag'=>$tag]);
    }

    public function actionRead($id)
    {
        return $this->render('read', [
            'model' => $this->findModel($id)
        ]);
    }


    /**
     * Lists all Description models.
     * @return mixed
     */
    public function actionTable()
    {
        $searchModel = new DescriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('table2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Description model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Description model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Description();
        $tag = new Tag();

        if ($model->load(Yii::$app->request->post())) {

            // Upload photo
            $imgName = $model->header;
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs( "uploads/".$imgName.".".$model->file->extension );
                $model->photo= "uploads/".$imgName.".".$model->file->extension;
            }
            $model->date=date('d-m-Y H:i:s');
            $model->save();

            return $this->redirect(['read', 'id' => $model->desid]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tag' =>  $tag,
            ]);
        }
    }

    /**
     * Updates an existing Description model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tag = new tag();

        if ($model->load(Yii::$app->request->post())) {
            // Upload photo
            $imgName = $model->header;
            if($model->file = UploadedFile::getInstance($model,'file')){
                $model->file->saveAs( "uploads/".$imgName.".".$model->file->extension );
                $model->photo= "uploads/".$imgName.".".$model->file->extension;
            }
            $model->save();
            return $this->redirect(['read', 'id' => $model->desid]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tag' => $tag,
            ]);
        }
    }

    /**
     * Deletes an existing Description model.
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
     * Finds the Description model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Description the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Description::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function getTegName($id)
    {
        if (($tag = Tag::findOne($id)) !== null) {
            return $tag->tag_name;
        } else {
            throw new NotFoundHttpException('The requested page does not exist. (getTegName())');
        }
    }

}
