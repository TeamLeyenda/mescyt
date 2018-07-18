<?php
namespace mdm\admin\models\form;

use Yii;
use mdm\admin\models\User;
use yii\base\Model;
use yii\web\UploadedFile;
use backend\models\AreaEspecializacion;
use backend\models\UserAreaEspecializacion;
/**
 * Signup form
 */
class Signup extends Model
{
    public $id;
    public $Nombre;
    public $Apellido;
    public $username;
    public $area_especializacion_id;
    public $email;
    public $password;
    public $tipo_user_id;
    public $afiliacion_id;
    public $Telefono;
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'tipo_user_id'], 'integer'],
            ['Nombre', 'required'],
            [['Nombre'], 'string', 'max' => 50],
            ['Apellido', 'required'],
            [['Apellido'], 'string', 'max' => 50],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Este nombre de usuario ya ha sido tomado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Este email ya ha sido tomado.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['Telefono'], 'string', 'max' => 20],
           // [['image'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if ($this->validate()) {
            $user = new User();
            //$area = new AreaEspecializacion;
            //$userArea = new UserAreaEspecializacion;
            //$userArea->user_id = $this->id;
            $user->Nombre = $this->Nombre;
            $user->Apellido = $this->Apellido;
            $user->username = $this->username;
            //$userArea->area_especializacion_id = $this->area_especializacion_id;
            //$area = AreaEspecializacion::find()->all();
            //$user = $area->user;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->tipo_user_id = $this->tipo_user_id;
            $user->afiliacion_id = $this->afiliacion_id;
            $user->Telefono = $this->Telefono;
            
            /*
            $user->save();
            $area->save();
            $userArea->save();

            $user->link('areaEspecializacions', $area);
            */
            //$user->link('areaEspecializacions', $areaEspecializacions);
            //$user->image->file = UploadedFile::getInstance( $image, 'file' );
            //$user->image = $this->image->saveAs('/backend/perfil/' . $this->image->baseName . '.' . $this->image->extension);
            /*
            $tmp = '/backend/perfil/' . array_pop( explode( '/', $user->image->file->tempName ) );
            $user->image = $tmp;
            $user->image->file->saveAs( Yii::getAlias( '@webroot' ) . $tmp . '.' . $image->file->extension );
            
            //$user->image = $this->image;

            if ($model->file = UploadedFile::getInstance($model,'image')) {
                $model->file->saveAs( '/backend/perfil/'.$image.'.'.$model->file->extension );
                //save the path in DB..
                $model->image = 'backend/perfil/'.$image.'.'.$model->file->extension;
                $model->save();
            }
            */

            if ($user->save()) {
                return $user;
                //return $area;
                //return $userArea;
            }
        }

        return null;
    }
}
