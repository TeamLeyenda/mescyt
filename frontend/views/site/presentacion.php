<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Conferencias';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->layout='page_header';
?>
<<<<<<< HEAD
<div class="section ">
    <div class="section_wrapper clearfix">

        <div class="column one column_blog">
            <div class="blog_wrapper isotope_wrapper">
                  <!--                 -->
                  <?php 
                        
                        foreach ($dataProvider->getModels() as $presentacion) {
                           echo '
                           <div class="post-item isotope-item clearfix author-lencarnacion post-1735 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                               <div class="date_label">July 4, 2018</div>
                               <div class="image_frame post-photo-wrapper scale-with-grid image">
                                   <div class="image_wrapper">
                                       <a href="#">
                                           <div class="mask"></div><img width="960" height="720" src="'.$presentacion->Vinculo.'" class="scale-with-grid wp-post-image" alt=""></a>
                                   </div>
                               </div>
                               <div class="post-desc-wrapper">
                                   <div class="post-desc">
                                       <div class="post-head"></div>
                                        <h1 ><a href="#link de la WEB"><strong>'.$presentacion->Titulo.'</strong></a></h1>
                                       <div class="post-excerpt">'.$presentacion->Area_Tematica.'<span class="excerpt-hellip"></span></div>
                                       <div class="post-excerpt"> Fecha de Inicio de La presentación :'.$presentacion->Fecha_Inicio.'<span class="excerpt-hellip"></span></div>
                                       <div class="post-excerpt">Fecha de Prevista de Finalización de La presentación :'.$presentacion->Fecha_Final.'<span class="excerpt-hellip"></span></div>
                                       <div class="post-footer">
                                           <div class="button-love"><span class="love-text">Do you like it?</span>
                                           <a href="#" class="mfn-love " data-id="1735"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i>
                                           <i class="icon-heart-fa"></i></span><span class="label">0</span></a></div>
                                           <div class="post-links"><i class="icon-doc-text"></i> <a href="#" class="post-more">Ver mas</a></div>
                                       </div>
                                   </div>
                               </div>
                           </div>';
                        }
                  ?>
               
                <!--                 -->

            </div>
        </div>

    </div>
</div>
<!--
<div class="col-lg-12 text-center">
=======
<div class="col-lg-12 text-center" style="background-color: #235288; border-color: #235288">

    <br>
    <br>
    <br>
        <br>
        

    <h1 class="section-subheading text-muted" style="color: white; font-family: arial">P R O G R A M A</h1>

    <h1 class="section-subheading text-muted" style="color: white; font-family: arial">La UASD reinaugura siete laboratorios con aportes del MESCyT y la Universidad Española</h1>
    <br>
>>>>>>> 3284a481e4a4d4c7d9dcf664d1ece672d93ea07e


    <p class="col-lg-12 text-left" style="color: white; font-family: arial">Con la presencia de la Ministra de  Educación Superior, Ciencia y Tecnología, doctora Alejandrina Germán, del Rector de  la Universidad Autónoma de Santo Domingo, doctor Iván Grullón Fernández y de otras autoridades de la UASD,   la Facultad de Ciencias Agronómicas y Veterinarias de esa academia dejó reinaugurados siete laboratorios pertenecientes a dicha facul- tad. El decano de Ciencias Agronómicas y Veteri- narias, doctor Modesto Reyes, explicó que los laboratorios son de: Alimentos, Suelo, Control de Leche  y de Biología Molecular.</p>

    <p class="col-lg-12 text-left" style="color: white; font-family: arial">El decano de Ciencias Agronómicas y Veterinarias, doctor Modesto Reyes, explicó que los laboratorios son de: Alimentos, Suelo, Control de Leche  y de Biología Molecular.</p>

    <div class="col-lg-12 text-center">

        <br>
        <br>


        
                
	                   <a href="http://www.mescyt.gob.do/uasd-reinaugura-siete-laboratorios-con-aportes-del-mescyt-y-universidad-espanola/" title="&nbsp;UASD REINAUGURA SIETE LABORATORIOS CON APORTES DEL MESCYT Y UNIVERSIDAD ESPAÑOLA" class="vc_gitem-link vc-zone-link">
                       </a>
                       <img src="http://www.mescyt.gob.do/wp-content/uploads/2018/07/DSC_7463-1024x683.jpg" class="vc_gitem-zone-img" alt="">

                       <br>
        <br>
        <br>
        
                    
			        </div>
                    


<<<<<<< HEAD
   <p class="col-lg-12 text-left" style="color: black">También fueron reinaugurados los laboratorios de Biotecnología, Control Biológico y de Cría de Depredadores.</p>

   <p class="col-lg-12 text-left" style="color: black">Reyes expuso que el equipamiento y reinauguración de  estos laboratorios fue gracias a los aportes realizados por el Ministerio de Educación Superior, Ciencia y Tecnología, a través del Fondo de Ciencia y Te- cnología, conocido por sus siglas FONDOCyT.</p>
=======

   <p class="col-lg-12 text-left" style="color: white; font-family: arial">También fueron reinaugurados los laboratorios de Biotecnología, Control Biológico y de Cría de Depredadores.</p>
  
   <p class="col-lg-12 text-left" style="color: white; font-family: arial">Reyes expuso que el equipamiento y reinauguración de  estos laboratorios fue gracias a los aportes realizados por el Ministerio de Educación Superior, Ciencia y Tecnología, a través del Fondo de Ciencia y Te- cnología, conocido por sus siglas FONDOCyT.</p>   
>>>>>>> 3284a481e4a4d4c7d9dcf664d1ece672d93ea07e

   <p class="col-lg-12 text-left" style="color: white; font-family: arial">Con relación a los usos de dichos laboratorios el funcionario de la UASD precisó  que el Laboratorio de Alimentos permitirá que las empresas que procesan alimentos puedan llevar muestras de su producción para ser examinadas y que una vez se realicen los análisis de las mismas certificar la calidad del producto de que se trate.</p>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



 </div>

       <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> 



<<<<<<< HEAD
</div></div>	</div>
</div>
</div>
-->
=======
>>>>>>> 3284a481e4a4d4c7d9dcf664d1ece672d93ea07e
