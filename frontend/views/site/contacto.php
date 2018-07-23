<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Contactos';
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

        	<h1 class="col-lg-12 text-left" style="color: blue; font-family: arial">Contactos</h1>
        	<br>
        	<p class="col-lg-12 text-left" style="color: blue; font-family: arial">
				Comité Organizador
            </p>
            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">
                CongresoCEICYT@gmail.com
            </p>
            <br>
            <br>
            <br>
            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">
                Universidad Autónoma de Santo Domingo (UASD)
            </p>
            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">
                Dirección General de Investigaciones Científicas y Tecnológicas
            </p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Biblioteca Pedro Mir, O-303, O-304 y O-305
            </p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Telf.: 809-535-8273, Ext. 8059, 8063, 8068</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Pontificia Universidad Católica Madre y Maestra (PUCMM)</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Vicerrectoría de Investigación e Innovación</p>
 
            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">investigacion@pucmm.edu.do</p>

            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Campus Santiago: Telf.: 809-580-1962, Ext. 4493</p>


            <p class="col-lg-12 text-left" style="color: blue; font-family: arial">Campus Santo Tomás de Aquino: Telf.: 809-535-0111, Ext. 2449</p>
			
            

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