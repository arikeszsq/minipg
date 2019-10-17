<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '活动列表', 'icon' => 'file-code-o', 'url' => ['/admin/activity/index']],
                    ['label' => '会员卡', 'icon' => 'circle-o', 'url' => ['/admin/card/index']],
                    ['label' => '优惠卷', 'icon' => 'file-code-o', 'url' => ['/admin/coupon/index']],
                    ['label' => '消费记录', 'icon' => 'circle-o', 'url' => ['/admin/consum-log/index']],
                    ['label' => '用户活动收藏', 'icon' => 'circle-o', 'url' => ['/admin/user-activity-collect/index']],
                    ['label' => '用户活动评价', 'icon' => 'file-code-o', 'url' => ['/admin/user-activity-comment/index']],
                    ['label' => '用户活动报名', 'icon' => 'dashboard', 'url' => ['/admin/user-activity-enroll/index']],
                    ['label' => '用户会员卡', 'icon' => 'circle-o', 'url' => ['/admin/user-card/index']],
                    ['label' => '用户优惠卷', 'icon' => 'dashboard', 'url' => ['/admin/user-coupon/index']],
                    ['label' => '用户管理', 'icon' => 'circle-o', 'url' => ['/admin/user-info/index']],
                    ['label' => '商家管理', 'icon' => 'dashboard', 'url' => ['/admin/business/index']],
                ],
            ]
        ) ?>
    </section>
</aside>
