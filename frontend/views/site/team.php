<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sometimiento de Trabajos';
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
    <div class="container" style="background-color: #235288; border-color: #235288">
        <div class="intro-text" style="background-color: #235288; border-color: #235288">
        	
            <br>
            <br>
            <br>
            <br>
            <br>

        	<h1 class="col-lg-12 text-left" style="color: white; font-family: arial">Sometimiento de Trabajos</h1>
        	<br>
            <br>
            <br>
        	<p class="col-lg-12 text-left" style="color: white; font-family: arial">
				Se convoca a la presentación de trabajos de investigación en las siguientes áreas o campos disciplinarios:
            </p>
            <br>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">1. Ciencias Básicas: Biología, Química, Física, Matemática, aplicaciones, fronteras y campos emergentes; Neurociencia, Econofísica.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">2. Ciencias Agropecuarias y Recursos Naturales: Ciencias Agroalimentarias y Forestales, Medio Ambiente, Biotecnología, y Veterinaria.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">3. Ingeniería y Tecnología: Ingenierías, Arquitectura, Tecnologías de la Información y Comunicación (TIC), Desarrollo de Software y Aplicaciones, &nbsp;&nbsp;&nbsp;&nbsp;Microprocesadores y Microcontroladores, Mecatrónica y Robótica, Bioingeniería, Energía Renovable, Procesos Industriales y Manufactura.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">4. Ciencias de la Salud: Medicina (medicina interna, medicina quirúrgica, medicina experimental), Medicina Molecular (incluida Biomedicina), Nutrición, &nbsp;&nbsp;&nbsp;&nbsp;Enfermería, Farmacia, y Odontología.</p>
 
            <p class="col-lg-12 text-left" style="color: white; font-family: arial">5. Educación Científica y Educación Matemática, con énfasis en uso de TIC (plataformas digitales en general) para promover aprendizaje.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Los trabajos deben ser sometidos por estudiantes de grado de las universidades dominicanas o por egresados con seis meses o menos de graduado, siempre y cuando los trabajos a presentar hayan sido realizados durante sus estudios de grado.</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            

            <h1 class="col-lg-12 text-left" style="color: white; font-family: arial">¿Cómo someter tu trabajo?</h1>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">1. Somete tu trabajo a la Unidad de Investigación de tu universidad (Vicerrectoría, Dirección o Departamento), incluyendo un resumen siguiendo el formato solic- &nbsp;&nbsp;&nbsp;&nbsp;itado para el congreso, indicado más abajo. Además, entrega el formulario de inscripción. El sometimiento de estos trabajos debe realizarse antes del  23 de &nbsp;&nbsp;&nbsp;&nbsp;marzo.</p>
			
            <p class="col-lg-12 text-left" style="color: white; font-family: arial">2. Tu universidad escogerá los trabajos que la representarán y los someterá al Comité Científico del CEICYT 2018, antes del 30 de marzo.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">La inscripción de participantes (personas que no expondrán trabajos) deberá hacerse por universidad antes del 30 de abril.</p>

			<h1 class="col-lg-12 text-left" style="color: white; font-family: arial">Formato para la presentación de resúmenes </h1>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Los resúmenes deben ser sometidos acompañados por el formulario de inscripción al evento. Cada resumen deberá estar escrito en español y contener un má- ximo de 2,500 caracteres. El título debe estar limitado a 150 caracteres. El cuerpo del resumen debe estar redactado en un solo párrafo y sin citas, y debe inclu- ir:</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Tema y formulación del problema. (delimitado al alcance de su participación)</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Preguntas críticas e hipótesis.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Materiales y método. (Metodología de trabajo)</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Hallazgos y conclusiones (¿Qué se encontró? ¿Qué se aprendió?)</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Los resúmenes que no se ajusten estrictamente a este formato, serán rechazados por el sistema. </p>

            <h1 class="col-lg-12 text-left" style="color: white; font-family: arial">Formatos para las ponencias en el congreso</h1>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Presentación Oral:</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Es una exposición oral de un máximo de 20 minutos (17 mins. presentación + 3 mins. preguntas y respuestas). Podrá estar apoyada en diapositivas, en forma- to Microsoft PowerPoint, versión 2007-2016, sin o con animación simple, o en formato Adobe PDF.</p>

            <h1 class="col-lg-12 text-left" style="color: white; font-family: arial">Presentación Cartel / Póster:</h1>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Tamaño: 90 cm ancho x 120 cm alto.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Título y filiación: Las letras para el título deben ser de 2.5 cm de altura, con tinta oscura, que contraste con el resto del cartel. También debe incluir, de menor tam- año, nombre(s) del (de los) autor(es), filiación y correo electrónico.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Cuerpo: Los encabezados de los cuadros y figuras, así como el texto, deben ser de por lo menos 1cm de altura, de manera que puedan ser leídos a 2 metros de distancia.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Posición: Todos los carteles deben diseñarse para ser leídos en posición vertical.</p>

            <p class="col-lg-12 text-left" style="color: white; font-family: arial">Los carteles impresos deben ser entregados al coordinador de su salón antes de las 9:00 a.m. del día del evento, dicho coordinador le será indicado en la com- unicación de aceptación del trabajo.</p>

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
        <br>
        <br>
        <br>
        <br>
        <br>
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