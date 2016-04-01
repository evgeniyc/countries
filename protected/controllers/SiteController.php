<?php

class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
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
			if(isset($_GET['Cities']) && $city = $_GET['Cities']['name']){
				$city = Cities::model()->findByPk($city);
				$langs = $city->langs;
				$langs_arr = array();
				foreach($langs as $lang)
					$langs_arr[] = $lang->name;
				$list2 = implode(', ',$langs_arr);
				echo $list2;
				Yii::app()->end();
			}
		}
		$datas = Countries::model()->findAll('1');
		$list = CHtml::listData($datas,'id', 'name');
		$list = array(''=>'')+$list;
		$this->render('index',array('list'=>$list));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	public function actionTest()
	{
		$model = new RestLang('1');
		$this->render('ind',array('model'=>$model));
	}

	
}