<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Inscripción';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->layout='page_header';
/*echo Yii::$app->formatter->asDateTime(time(), 'short');
echo Yii::$app->formatter->asDateTime(time(), 'medium');
echo Yii::$app->formatter->asDateTime(time(), 'long');
echo Yii::$app->formatter->asDateTime(time(), 'full');*/
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@dixonsatit/agencyTheme/dist');
$this->registerJsFile($directoryAsset.'/js/cbpAnimatedHeader.min.js');
?>

<header >
    <div class="container">
        <div class="intro-text">
        	
            <br>
            <br>
            <br>
            <br>
            <br>

        	<h1 class="col-lg-12 text-left" style="color: blue; font-family: arial">Inscripción</h1>
        	<br>
        	<p class="col-lg-12 text-left" style="color: blue; font-family: arial">
				Todos los estudiantes universitarios de grado de las áreas de ciencias básicas y aplicadas están invitados a participar de este evento, como expositores de trabajos científicos o como participantes. En ambos casos deben contar con el aval de su institución.
            </p>

            <br>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Si desea asistir como expositor, favor seguir las indicaciones referidas en el enlace de Sometimiento de trabajos.</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Si desea asistir como participante, por favor contacte a la Vicerrectoría, Dirección o Unidad de Investigación de su universidad y posteriormente refiérale vía correo electrónico el formulario de inscripción que se encuentra en esta sección. Los contactos a los que debe referirse dentro de su universidad para gesti- onar su participación se encuentran en la sección de Contáctanos.</p>

            


 


			
			
			<br>
            
        </div>
    </div>
</header>

<br>
<br>
<br>
<br>
<br>

<section class="page" id="about">
<div class="container">
<div class="site-about">




</div>

</div>
</section>