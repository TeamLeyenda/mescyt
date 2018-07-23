<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Congresos Pasados';
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
        	
        	<h1 class="col-lg-12 text-left" style="color: blue; font-family: arial">CONFERENCISTA MAGISTRAL</h1>
        	<h1 class="col-lg-12 text-left" style="color: blue; font-family: arial">Sixto J. Incháustegui</h1>
        	<br>
        	<p class="col-lg-12 text-left" style="color: blue; font-family: arial">
				Biólogo dominicano. Profesor universitario. Investigador. Conservacionista. Consultor ambiental. Con más de 45 años de experiencia docente-administrativa. Miembro fundador e investigador del Museo Nacional de Historia Natural “Profesor Eugenio de Jesús Marcano”. Este señor ha sido director de la escuela de biología de la UASD, representante nacional Comité Científico de CITES, representante regional (América Latina y Caribe) del Comité de Fauna CITES, vic- epresidente para el Caribe de la Comisión Mundial de Áreas Protegidas de la UICN. Ex-Oficial Ambiental del PNUD-RD. Miembro de la Academia de Cien- cias de la República Dominicana. Investigador FONDOCYT. Asesor Viceministerio Ciencia y Tecnología, MESCYT. Miembro Consejo de Investigación de IN-TEC. Consejo editorial Novitates Caribaea. Miembro de comisiones de especialistas de fauna de la UICN. Cofundador Grupo Jaragua y CEBSE. El Cofund- ador congresos biodiversidad del Caribe, UASD. 
			</p>
			
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
