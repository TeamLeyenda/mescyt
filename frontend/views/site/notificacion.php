<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Presentaciones';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->layout='page_header';
//$model =  new \backend\admin\models\form\Signup(); 
use backend\models\PresentacionUser;
?>

<div class="section ">
    <div class="section_wrapper clearfix">

        <div class="column one column_blog">
		<div id="presentacion_ver">
            <div class="blog_wrapper isotope_wrapper">
                  <!--                 -->
                  <?php 
                        
                        foreach ($dataProvider->getModels() as $presentacion):?> 

                           <div class="post-item isotope-item clearfix author-lencarnacion post-1735 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                               <div class="post-desc-wrapper">
                                   <div class="post-desc">
                                       <div class="post-head"></div>
                                            <h1 ><a href="#link de la WEB"><strong><?php echo $presentacion->Titulo;?></strong></a></h1>
                                       <div class="post-footer">
									   <?php
									    $presentacion_user = PresentacionUser::findAll(['user_id'=>Yii::$app->user->identity->id,'presentacion_id'=>$presentacion->id]);
										
									   ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        
                    <?php endforeach;?>
               
                <!--                 -->

            </div>
			</div>
        </div>

    </div>
</div>
