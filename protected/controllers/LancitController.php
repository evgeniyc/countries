<?php

class LancitController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->request->isAjaxRequest){
			if(isset($_GET['Countries']) && $country = $_GET['Countries']['name']){
				$models = Cities::model()->findAllByAttributes(array('country_id' => $country));
				$list1 = '<option value="" selected="selected"></option>';
				foreach($models as $mod)
					$list1 = $list1.'<option value="'.$mod->id.'">'.$mod->name.'</option>';	
				echo $list1;
				Yii::app()->end();
			}
		}
		$model=new Lancit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lancit']))
		{
			$model->attributes=$_POST['Lancit'];
			try{
				$model->save();
			}catch(CDbException $e){
				//Yii::app()->user->setFlash('create','Ошибка составления запроса. Содержание ошибки: '.$e->errorInfo[2]);
				Yii::app()->user->setFlash('create','Ошибка сохранения. Скорее всего, такая запись уже существует.');
			}
			if(!Yii::app()->user->hasFlash('create'))
				Yii::app()->user->setFlash('create','Данные успешно сохранены.');
			$this->refresh();
			
		}
		$countr_obj = Countries::model()->findAll('1');
		$list = CHtml::listData($countr_obj,'id', 'name');
		$list = array(''=>'')+$list;
		
		$langs_obj = Langs::model()->findAll(array('order'=>'name ASC'));
		$list2 = CHtml::listData($langs_obj,'id', 'name');
		$list2 = array(''=>'')+$list2;
		
		$this->render('create',array(
			'model'=>$model, 
			'list'=>$list,
			'list2'=>$list2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lancit']))
		{
			$model->attributes=$_POST['Lancit'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lancit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lancit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lancit']))
			$model->attributes=$_GET['Lancit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lancit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lancit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lancit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lancit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
