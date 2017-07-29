<aside class=" main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '主菜单', 'options' => ['class' => 'header']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => '商品管理',
                        'icon' => 'fa fa-share',
                        'visible'=> isset($permissions['goods']) ? 1 : 0,
                        'url' => '#',
                        'active' => Yii::$app->controller->module->id == 'goods',
                        'items' => [
                            ['label' => '商品列表', 'icon' => 'fa fa-dot-circle-o','active' => Yii::$app->controller->id == 'goods', 'visible'=> isset($permissions['goods']['goods']['index']) ? 1 : 0, 'url' => ['/goods/goods/index']],
                        ],
                    ],
                    [
                        'label' => '新闻管理',
                        'icon' => 'fa fa-share',
                        'visible'=> isset($permissions['events']) ? 1 : 0,
                        'url' => '#',
                        'active' => Yii::$app->controller->module->id == 'events',
                        'items' => [
                            ['label' => '新闻列表', 'icon' => 'fa fa-dot-circle-o','active' => Yii::$app->controller->id == 'events', 'visible'=> isset($permissions['events']['events']['index']) ? 1 : 0, 'url' => ['/events/events/index']],
                        ],
                    ],

                    [
                        'label' => '用户管理',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'active' => Yii::$app->controller->module->id == 'users',
                        'visible'=> isset($permissions['users']) ? 1 : 0,
                        'items' => [
                            ['label' => '用户列表', 'icon' => 'fa fa-dot-circle-o','active' => Yii::$app->controller->id == 'users'&&Yii::$app->controller->action->id == 'index','visible'=> isset($permissions['users']['users']['index']) ? 1 : 0, 'url' => ['/users/users/index']],

                            ['label' => '用户组', 'icon' => 'fa fa-dot-circle-o','active' => Yii::$app->controller->id == 'role','visible'=> isset($permissions['role']['role']['index']) ? 1 : 0, 'url' => ['/role/role/index']],
                        ],
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
