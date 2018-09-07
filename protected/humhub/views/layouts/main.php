<?php
/* @var $this \yii\web\View */

use humhub\modules\search\models\forms\SearchForm;
use humhub\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $content string */

\humhub\assets\AppAsset::register( $this );
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= strip_tags( $this->pageTitle ); ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#000">
    <link rel="shortcut icon" href="/<?= $this->theme->getBaseUrl(); ?>/img/favicon/apple-touch-icon.png">
    <link rel="stylesheet" href="<?= $this->theme->getBaseUrl(); ?>/css/main.min.css">

	<?php $this->head() ?>
	<?= $this->render( 'head' ); ?>
    <base id="myBase" href="<?= $this->theme->getBaseUrl(); ?>/">
</head>
<body>
<?php $this->beginBody() ?>

<?php $userModel = Yii::$app->user->getIdentity(); ?>


<header class="privHeader">
    <div class="fixed-privHeader-wrap">
        <div class="base-lg-wrap">
            <div class="search-block">
				<?php $form = ActiveForm::begin( [
					'action'      => Url::to( [ '/search/search/index' ] ),
					'method'      => 'GET',
					'fieldConfig' => [
						'options' => [
							'tag' => false,
						],
					],
				] ); ?>
				<?= $form->field( new SearchForm, 'keyword', [ 'errorOptions' => [ 'tag' => null ] ] )->textInput( [
					'placeholder' => Yii::t( 'SearchModule.views_search_index', 'Search for user, spaces and content' ),
					'title'       => Yii::t( 'SearchModule.views_search_index', 'Search for user, spaces and content' ),
					'id'          => 'headerSearch'
				] )->label( false ); ?>
                <input type="submit" value="">
				<?php ActiveForm::end(); ?>
            </div>
            <div class="sidebar-mobile-block">
                <div class="logo-btn">
                    <svg class="icon icon-logo">
                        <use xlink:href="./svg/sprite/sprite.svg#logo"></use>
                    </svg>
                </div>
                <div class="mobile-wrap">
                    <div class="general-menu">
						<?= humhub\widgets\BaseLeftMenu::widget( [ 'id' => 'left-menu-nav-mobile' ] ); ?>
                    </div>
                    <div class="sidebar-mobile-footer">
                        <div class="lang-block">
							<?= humhub\widgets\LanguageChooser::widget(); ?>
                        </div>
                        <div class="search-block"><input type="text" placeholder="Search" id="headerSearch2"><input
                                    type="submit" value=""></div>
                    </div>
                </div>
            </div>
            <div class="activities-menu">
                <?= \humhub\modules\notification\widgets\Overview::widget(); ?>
                <div class="mobile-activities-btn">
                    <p>Activities</p>
                    <div class="activity-counter"><span>9</span></div>
                </div>
                <div class="mobile-wrap">
                    <div class="wrap">
						<?= \humhub\modules\mail\widgets\Notifications::widget(); ?>
						<?= \humhub\modules\friendship\widgets\Notifications::widget(); ?>

                        <div class="item">
                            <a class="mobile-link" href="#"></a>
                            <div class="activity-icon">
                                <svg class="icon icon-notifications">
                                    <use xlink:href="svg/sprite/sprite.svg#notifications"></use>
                                </svg>
                                <div class="activity-counter"><span>4</span></div>
                            </div>
                            <div class="tooltip">Notifications</div>
                            <div class="activity-sub-menu">
                                <div class="notifications-sub-menu">
                                    <div class="sub-menu-header">
                                        <div class="title">Notifications</div>
                                        <div class="counter"><span>1 New</span></div>
                                    </div>
                                    <div class="sub-menu-content">
                                        <div class="newList">
                                            <div class="list-header"><span>New</span></div>
                                            <ul>
                                                <li class="notification">
                                                    <div class="photo"><img src="img/user-2.png"></div>
                                                    <div class="notifi-wrap">
                                                        <div class="text">
                                                            <div class="name">Mary Lockhart</div>
                                                        </div>
                                                        added 5 new photos to album<a href="#"> My Photo.</a>
                                                        <div class="date">an hour ago</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="earlierList">
                                            <div class="list-header"><span>Earlier</span></div>
                                            <ul>
                                                <li class="notification">
                                                    <div class="photo"><img src="img/user-2.png"><span
                                                                class="active"></span></div>
                                                    <div class="notifi-wrap ">
                                                        <div class="text">
                                                            <div class="name">Mary Lockhart</div>
                                                            posted in<a href="#"> Group</a></div>
                                                        <div class="date">October 30 at 23:03</div>
                                                    </div>
                                                </li>
                                                <li class="notification">
                                                    <div class="photo"><img src="img/user-2.png"><span
                                                                class="active"></span></div>
                                                    <div class="notifi-wrap ">
                                                        <div class="text">
                                                            <div class="name">Christopher Lawrence</div>
                                                            have birthday today.<a href="#"> Сongratulate him!</a></div>
                                                        <div class="date">October 30 at 23:03</div>
                                                    </div>
                                                </li>
                                                <li class="notification">
                                                    <div class="photo"><img src="img/user-2.png"><span
                                                                class="active"></span></div>
                                                    <div class="notifi-wrap has-img">
                                                        <div class="text">
                                                            <div class="name">Lary Mockhart</div>
                                                            likes your photo:<a href="#"> Road to Africa.</a></div>
                                                        <div class="img-block"><img src="img/notify-img-1.png"></div>
                                                        <div class="date">October 30 at 23:03</div>
                                                    </div>
                                                </li>
                                                <li class="notification">
                                                    <div class="photo"><img src="img/user-2.png"><span
                                                                class="active"></span></div>
                                                    <div class="notifi-wrap ">
                                                        <div class="text">
                                                            <div class="name">Lary Mockhart</div>
                                                            that the hope that has overcome fear in my country will help
                                                            vanquish it around the world.
                                                        </div>
                                                        <div class="date">October 30 at 23:03</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sub-menu-footer"><a class="markAsRead" href="#">Mark all as read</a><a
                                                class="seeAll" href="#">See all</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a class="mobile-link" href="#"></a>
                            <div class="activity-icon">
                                <svg class="icon icon-favorites">
                                    <use xlink:href="svg/sprite/sprite.svg#favorites"></use>
                                </svg>
                            </div>
                            <div class="tooltip">Favorites</div>
                            <div class="activity-sub-menu">
                                <div class="favorites-sub-menu">
                                    <div class="sub-menu-header">
                                        <div class="title">Favorites</div>
                                    </div>
                                    <div class="sub-menu-content">
										<?= \humhub\modules\favorite\widgets\TopWindows::widget(); ?>
                                    </div>
                                    <div class="sub-menu-footer"><a class="seeAll" href="#">See all</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a class="mobile-link" href="#"></a>
                            <div class="activity-icon">
                                <svg class="icon icon-add">
                                    <use xlink:href="svg/sprite/sprite.svg#add"></use>
                                </svg>
                            </div>
                            <div class="tooltip">Add new</div>
                            <div class="activity-sub-menu">
                                <div class="add-sub-menu">
                                    <div class="add-header"> Add new</div>
                                    <div class="form-block">
										<?= \humhub\modules\user\widgets\UserChangeStatus::widget(); ?>

                                    </div>
                                    <div class="add-link-block">
                                        <div class="link greatest-desire"><a
                                                    href="<?= Url::to( [ '/desire/desire/create' ] ); ?>">
                                                <svg class="icon icon-earth_green">
                                                    <use xlink:href="svg/sprite/sprite.svg#earth_green"></use>
                                                </svg>
                                                Greatest Desire</a></div>
                                        <div class="link"><a href="<?= Url::to( [ '/blog/blog/create' ] ); ?>">
                                                <svg class="icon icon-success_stories">
                                                    <use xlink:href="svg/sprite/sprite.svg#success_stories"></use>
                                                </svg>
                                                Success story</a></div>

                                        <div class="link">
                                            <a data-target="#globalModal"
                                               href="<?= $userModel->createUrl( '/gallery/custom-gallery/edit' ); ?>">
                                                <svg class="icon icon-photos">
                                                    <use xlink:href="svg/sprite/sprite.svg#photos"></use>
                                                </svg>
                                                Photos
                                            </a>
                                        </div>

                                        <div class="link"><a href="<?= Url::to( [ '/blog/blog/create' ] ); ?>">
                                                <svg class="icon icon-blog">
                                                    <use xlink:href="svg/sprite/sprite.svg#blog"></use>
                                                </svg>
                                                Blog post</a></div>
                                        <div class="link"><a href="#">
                                                <svg class="icon icon-Group">
                                                    <use xlink:href="svg/sprite/sprite.svg#Group"></use>
                                                </svg>
                                                Group</a></div>
                                        <div class="link"><a
                                                    href="<?= $userModel->createUrl( '/polls/poll/create' ); ?>">
                                                <svg class="icon icon-poll">
                                                    <use xlink:href="svg/sprite/sprite.svg#poll"></use>
                                                </svg>
                                                Poll</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <a class="mobile-link" href="#"></a>
                            <div class="activity-icon">
                                <svg class="icon icon-invite">
                                    <use xlink:href="svg/sprite/sprite.svg#invite"></use>
                                </svg>
                            </div>
                            <div class="tooltip">Invite friend</div>
                            <div class="activity-sub-menu">
                                <div class="invite-sub-menu">
                                    <a href="#">
                                        <div class="inv-icon">
                                            <svg class="icon icon-email">
                                                <use xlink:href="svg/sprite/sprite.svg#email"></use>
                                            </svg>
                                        </div>
                                        Invite Friends by E-mail</a>
                                    <a href="#">
                                        <div class="inv-icon">
                                            <svg class="icon icon-facebook">
                                                <use xlink:href="svg/sprite/sprite.svg#facebook"></use>
                                            </svg>
                                        </div>
                                        Invite Friends from Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-navigation">
                <div class="wrap">
                    <div class="account-block">
                        <a href="<?= $userModel->createUrl( '/user/profile/home' ); ?>">
                            <div class="user-img"><img src="<?= $userModel->getProfileImage()->getUrl(); ?>"></div>
                            <span>My Account</span></a>
                    </div>
                    <div class="setting-block">
                        <a href="<?= Url::toRoute( '/user/account/edit' ); ?>">
                            <div class="setting-img">
                                <svg class="icon icon-settings">
                                    <use xlink:href="svg/sprite/sprite.svg#settings"></use>
                                </svg>
                            </div>
                            <span>Settings</span></a>
                    </div>
					<?php if ( \humhub\modules\admin\widgets\AdminMenu::canAccess() ) { ?>
                        <div class="setting-block">
                            <a href="<?= Url::toRoute( '/admin' ); ?>">
                                <div class="setting-img">
                                    <svg class="icon icon-settings">
                                        <use xlink:href="svg/sprite/sprite.svg#settings"></use>
                                    </svg>
                                </div>
                                <span>Admin</span></a>
                        </div>
					<?php } ?>
                    <div class="logOut">
                        <a href="<?= Url::toRoute( '/user/auth/logout' ); ?>">
                            <div class="logOut-img">
                                <svg class="icon icon-logout">
                                    <use xlink:href="svg/sprite/sprite.svg#logout"></use>
                                </svg>
                            </div>
                            <span>Logout</span></a>
                    </div>
                </div>
                <div class="mobile-user-block">
                    <div class="mobile-user-btn">
                        <div class="user-img"><img src="img/user-1.png"></div>
                    </div>
                    <div class="mobile-wrap">
                        <div class="name"><?= Yii::$app->user->getIdentity()->username; ?></div>
						<?= \humhub\modules\user\widgets\ProfileMenu::widget( [ 'user' => Yii::$app->user->getIdentity() ] ); ?>
                        <div class="user-controls-btn">
                            <div class="setting-block">
                                <a href="<?= Url::toRoute( '/user/account/edit' ); ?>">
                                    <div class="setting-img">
                                        <svg class="icon icon-settings">
                                            <use xlink:href="svg/sprite/sprite.svg#settings"></use>
                                        </svg>
                                    </div>
                                    <span>Settings</span></a>
                            </div>
							<?php if ( \humhub\modules\admin\widgets\AdminMenu::canAccess() ) { ?>
                                <div class="setting-block">
                                    <a href="<?= Url::toRoute( '/admin' ); ?>">
                                        <div class="setting-img">
                                            <svg class="icon icon-settings">
                                                <use xlink:href="svg/sprite/sprite.svg#settings"></use>
                                            </svg>
                                        </div>
                                        <span>Admin</span></a>
                                </div>
							<?php } ?>
                            <div class="logOut">
                                <a href="<?= Url::toRoute( '/user/auth/logout' ); ?>">
                                    <div class="logOut-img">
                                        <svg class="icon icon-logout">
                                            <use xlink:href="svg/sprite/sprite.svg#logout"></use>
                                        </svg>
                                    </div>
                                    <span>Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="base-col-layout">
    <div class="base-lg-wrap">
        <aside class="left-side">
            <div class="left-sidebar">
                <div class="logo"><a href="<?= Url::home(); ?>">
                        <svg class="icon icon-logo">
                            <use xlink:href="./svg/sprite/sprite.svg#logo"></use>
                        </svg>
                    </a></div>

                <div class="lang-block">
					<?= humhub\widgets\LanguageChooser::widget(); ?>

                </div>
                <div class="general-menu">
					<?= humhub\widgets\BaseLeftMenu::widget(); ?>

                </div>
                <div class="sidebar-notification">
<!--                    <div class="item">-->
<!--                        <div class="title">Today is</div>-->
<!--                        <div class="close-btn">-->
<!--                            <svg class="icon icon-close">-->
<!--                                <use xlink:href="./svg/sprite/sprite.svg#close"></use>-->
<!--                            </svg>-->
<!--                        </div>-->
<!--                        <div class="img-block"><img src="img/user-2.png"><span class="active"></span></div>-->
<!--                        <div class="item-wrap">-->
<!--                            <div class="name">Christopher Lawrence</div>-->
<!--                            <div class="event">-->
<!--                                <svg class="icon icon-birthday-cake">-->
<!--                                    <use xlink:href="./svg/sprite/sprite.svg#birthday-cake"></use>-->
<!--                                </svg>-->
<!--                                <p>Birthday!</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="date">17.03.2016</div>-->
<!--                    </div>-->
					<?= \humhub\modules\birthday\widgets\BirthdaySidebarWidget::widget(); ?>
                </div>
            </div>
        </aside>

		<?= $content; ?>
		<?php if ( isset( $_GET['test'] ) ) { ?>
			<?= \humhub\widgets\TopMenu::widget(); ?>
		<?php } ?>
    </div>

    <div class="popular-desire-tags">
        <div class="base-lg-wrap">
	        <?= \humhub\modules\tags\widgets\TagsCloud::widget(); ?>

        </div>
    </div>

</main>
<footer>
    <div class="top">
        <div class="base-wrap">
            <div class="logo">
                <svg class="icon icon-logo">
                    <use xlink:href="./svg/sprite/sprite.svg#logo"></use>
                </svg>
            </div>
            <div class="footer-menu">
                <ul>
                    <li><a href="succes-stories-public.html">Discover more about network</a></li>
                    <li><a href="privacy-police-public.html">Privacy policy</a></li>
                    <li><a href="single-success-stories-public.html">Terms and Conditions</a></li>
                    <li><a href="faq-public.html">FAQ</a></li>
                    <li><a href="contacts-public.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-form">
                <form>
                    <div class="form-item"><label for="footer-email">E-mail*</label><input id="footer-email"
                                                                                           type="email"></div>
                    <label>Message*
                        <div class="textarea-wrap"><textarea rows="1"></textarea></div>
                    </label>
                    <div class="base-sm-btn"><input type="submit" value="Send"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="base-wrap">
            <div class="copy">© All rights reserved.</div>
            <div class="dev-logo"><a href="#">
                    <svg class="icon icon-logo_footer">
                        <use xlink:href="./svg/sprite/sprite.svg#logo_footer"></use>
                    </svg>
                </a></div>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
<script src="<?= $this->theme->getBaseUrl(); ?>/js/scripts.min.js"></script>
<script src="<?= $this->theme->getBaseUrl(); ?>/js/main.js"></script>
</body>
</html>
<?php $this->endPage() ?>
