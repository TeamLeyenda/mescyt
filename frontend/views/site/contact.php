<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Congreso';
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
        	
        	<h1 class="col-lg-12 text-left" style="color: blue; font-family: arial">CEICYT 2018</h1>
        	<br>
        	<p class="col-lg-12 text-left" style="color: blue; font-family: arial">
				El Congreso Estudiantil de Investigación Científica y Tecnológica (CEICYT) es un espacio para dar a conocer las iniciativas de investigación de estudiantes universitarios de las áreas vinculadas a las ciencias básicas y aplicadas. Es un evento multidisciplinario que tiene por objetivo:
            </p>
            <br>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">1. Contribuir al fomento de la cultura de investigación e innovación en la nación, con miras a insertarla en la sociedad del conocimiento.</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">2. Motivar a estudiantes a seguir una carrera de investigación.</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">3. Servir de foro para difundir la creatividad y el talento de nuestros jóvenes, mediante la exposición pública de sus trabajos de investigación e innovación.</p>


 


			
			
			<br>
            
        </div>
    </div>
</header>

<section class="page" id="about">
<div class="container">
<div class="site-about">




</div>

</div>
</section>