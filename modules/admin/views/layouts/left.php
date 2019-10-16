<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'circle-o', 'url' => ['/debug']],
                    ['label' => '活动列表', 'icon' => 'file-code-o', 'url' => ['/admin/activity/index']],
                    ['label' => '商家管理', 'icon' => 'dashboard', 'url' => ['/admin/business/index']],
                    ['label' => '会员卡', 'icon' => 'file-code-o', 'url' => ['/admin/card/index']],
                    ['label' => '优惠卷', 'icon' => 'circle-o', 'url' => ['/admin/consum-log/index']],
                    ['label' => '消费记录', 'icon' => 'file-code-o', 'url' => ['/admin/coupon/index']],
                    ['label' => '用户活动收藏', 'icon' => 'circle-o', 'url' => ['/admin/user-activity-collect/index']],
                    ['label' => '用户活动评价', 'icon' => 'file-code-o', 'url' => ['/admin/user-activity-comment/index']],
                    ['label' => '用户活动报名', 'icon' => 'dashboard', 'url' => ['/admin/user-activity-enroll/index']],
                    ['label' => '用户会员卡', 'icon' => 'circle-o', 'url' => ['/admin/user-card/index']],
                    ['label' => '用户优惠卷', 'icon' => 'dashboard', 'url' => ['/admin/user-coupon/index']],
                    ['label' => '用户管理', 'icon' => 'circle-o', 'url' => ['/admin/user-info/index']],
                ],
            ]
        ) ?>

        <!--        <div class="user-panel">-->
        <!--            <div class="pull-left image">-->
        <!--                <img src="--><?//= $directoryAsset ?><!--/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
        <!--            </div>-->
        <!--            <div class="pull-left info">-->
        <!--                <p>Alexander Pierce</p>-->
        <!---->
        <!--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        <!--            </div>-->
        <!--        </div>-->

        <!--        <form action="#" method="get" class="sidebar-form">-->
        <!--            <div class="input-group">-->
        <!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
        <!--              <span class="input-group-btn">-->
        <!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
        <!--                </button>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--        </form>-->
    </section>
</aside>
