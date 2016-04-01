<?php
/**
 * @method bool isPost()
 * @method bool isPut()
 * @method bool isDelete()
 * @method string renderRest(string $view, array $data = null, bool $return = false, array $fields = array())
 * @method void redirectRest(string $url, bool $terminate = true, int $statusCode = 302)
 * @method bool isRestService()
 * @method \rest\Service getRestService()
 */
class LangsRestController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return array(
            'restAPI' => array('class' => '\rest\controller\Behavior')
        );
    }

    public function actionIndex()
    {
        $models = Langs::model()->findAll();
        $dat = CHtml::listData($models,'id','name');
		$data = array(
            'table' => 'langs',
            'data' => $dat,
		);
		$this->render('empty', $data, false, array('table','data'));
    }

    public function actionView()
    {
        $model = $this->loadModel();
		$data = array(
            'id' => $model->id,
            'name' => $model->name,
		);
        $this->render('empty', $data, false, array('id', 'name'));
    }

    public function actionCreate()
    {
        $model = new Langs;

        if ($this->isPost() && ($data = $_POST)) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model), true, 201);
            }
        }
        $this->render('empty', array('model' => $model));
    }

    public function actionUpdate()
    {
        $model = new Langs;
        $data = array(
            'id' => Yii::app()->request->getPut('id'),
            'name' => Yii::app()->request->getPut('name'),
        );

        if ($this->isPut() && $data) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model));
            }
        }
        $this->render('empty', array('model' => $model));
    }

    public function actionDelete()
    {
        if ($this->isDelete()) {
            $model = $this->loadModel();
            $this->redirect(array('index', $model));
        } else {
            throw new \CHttpException(400, Yii::t('app', 'Invalid delete request'));
        }
    }

    /**
     * @return RestUser
     * @throws CHttpException
     */
    public function loadModel()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $object = Langs::model()->findByPk($id);
		//$object = CHtml::listData($object,'id','name');
        if ($id != $object->id) {
            throw new CHttpException(404, Yii::t('app', 'Object not found'));
        }
        return $object;
    }



    /**
     * Renders a view with a layout.
     *
     * @param string $view name of the view to be rendered. See {@link getViewFile} for details
     * about how the view script is resolved.
     * @param array $data data to be extracted into PHP variables and made available to the view script
     * @param boolean $return whether the rendering result should be returned instead of being displayed to end users.
     * @param array $fields allowed fields to REST render
     * @return string the rendering result. Null if the rendering result is not required.
     * @see renderPartial
     * @see getLayoutFile
     */
    public function render($view, $data = null, $return = false, $fields = array())
    {
        if (($behavior = $this->asa('restAPI')) && $behavior->getEnabled()) {
            if (isset($data['model']) && $this->isRestService() &&
                count(array_intersect(array_keys($data), $fields)) == 1) {
                $data = $data['model'];
                $fields = null;
            }
            return $this->renderRest($view, $data, $return, $fields);
        } else {
            return parent::render($view, $data, $return);
        }
    }

    /**
     * Redirects the browser to the specified URL or route (controller/action).
     * @param mixed $url the URL to be redirected to. If the parameter is an array,
     * the first element must be a route to a controller action and the rest
     * are GET parameters in name-value pairs.
     * @param boolean|integer $terminate whether to terminate OR REST response status code !!!
     * @param integer $statusCode the HTTP status code. Defaults to 302. See {@link http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html}
     * for details about HTTP status code.
     */
    public function redirect($url, $terminate = true, $statusCode = 302)
    {
        if (($behavior = $this->asa('restAPI')) && $behavior->getEnabled()) {
            $this->redirectRest($url, $terminate, $statusCode);
        } else {
            parent::redirect($url, $terminate, $statusCode);
        }
    }
}