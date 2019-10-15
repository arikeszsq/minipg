<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'circle-o', 'url' => ['/debug']],
                    ['label' => '产品列表', 'icon' => 'file-code-o', 'url' => ['/admin/product/index']],
                    ['label' => '会员卡管理', 'icon' => 'dashboard', 'url' => ['/admin/member-card/index']],
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
