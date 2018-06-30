<?php
$name = Yii::$app->user->identity->username;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo $name ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu administrativo', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Usuarios',
                                'icon' => 'users',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Registrar', 'icon' => 'sign-in', 'url' => ['/admin/user/signup'],],
                                    ['label' => 'Participante', 'icon' => 'user', 'url' => ['/participante'],],
                                    ['label' => 'Presentador', 'icon' => 'user', 'url' => ['/presentador'],],
                                    ['label' => 'Moderador', 'icon' => 'user', 'url' => ['/moderador'],],
                                    ['label' => 'Usuarios', 'icon' => 'user', 'url' => ['/user'],],
                                ],
                            ],

                            ['label' => 'Programa',
                                        'icon' => 'building',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Congreso', 'icon' => 'building-o', 'url' => ['/congreso'],],
                                            ['label' => 'Salas', 'icon' => 'cube', 'url' => ['/sala'],],
                                            ['label' => 'Presentaciones', 'icon' => 'comments-o', 'url' => ['/presentacion'],],
                                            ['label' => 'Afiliaciones', 'icon' => 'credit-card', 'url' => ['/afiliacion'],],
                                        ],
                                    ],

                            ['label' => 'Ubicacion',
                                    'icon' => 'globe',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Pais', 'icon' => 'circle-o', 'url' => ['/pais'],],
                                        ['label' => 'Provincias', 'icon' => 'circle-o', 'url' => ['/provincia'],],
                                    ],
                                ],
                    /*
                    ['label' => 'Administracion',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            
                        ],
                    ],
                    */
                ],
            ]
        ) ?>

    </section>

</aside>
