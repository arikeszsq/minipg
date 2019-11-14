<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '活动列表', 'icon' => 'file-code-o', 'url' => ['/admin/event/index']],
                    ['label' => '会员卡', 'icon' => 'circle-o', 'url' => ['/admin/card/index']],
                    ['label' => '商家管理', 'icon' => 'circle-o', 'url' => ['/admin/business/index']],
                    ['label' => '优惠券', 'icon' => 'circle-o', 'url' => ['/admin/coupon/index']],

                    ['label' => '用户管理', 'icon' => 'circle-o', 'url' => ['/admin/user-info/index']],
                    ['label' => '管理员', 'icon' => 'circle-o', 'url' => ['/admin/admin/index']],
                    ['label' => '用户会员卡', 'icon' => 'dashboard', 'url' => ['/admin/user-card/index']],

                    ['label' => '消费记录', 'icon' => 'dashboard', 'url' => ['/admin/consum-log/index']],
                    ['label' => '用户优惠卷', 'icon' => 'dashboard', 'url' => ['/admin/user-coupon/index']],

                    ['label' => '活动报名表', 'icon' => 'dashboard', 'url' => ['/admin/event-enroll/index']],
                    ['label' => '订单表', 'icon' => 'dashboard', 'url' => ['/admin/order/index']],
                    ['label' => '后台操作日志', 'icon' => 'dashboard', 'url' => ['/admin/backend-log/index']],
                    ['label' => '首页轮播图管理', 'icon' => 'dashboard', 'url' => ['/admin/banner/index']],

                ],
            ]
        ) ?>
    </section>
</aside>
