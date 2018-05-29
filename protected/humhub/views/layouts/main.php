<?php
/* @var $this \yii\web\View */

use yii\helpers\Url;

/* @var $content string */

\humhub\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= strip_tags($this->pageTitle); ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#000">
        <link rel="shortcut icon" href="/<?= $this->theme->getBaseUrl(); ?>/img/favicon/apple-touch-icon.png">
        <link rel="stylesheet" href="<?= $this->theme->getBaseUrl(); ?>/css/style.min.css">
        <base href="<?= $this->theme->getBaseUrl(); ?>/">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body>
        <?php $this->beginBody() ?>


       <?php if(!isset($_GET['old'])) { ?>

        <header class="privHeader">
            <div class="fixed-privHeader-wrap">
                <div class="base-lg-wrap">
                    <div class="search-block"><input type="text" placeholder="Search" id="headerSearch"><input type="submit" value=""></div>
                    <div class="activities-menu">
                        <div class="mobile-activities-btn">
                            <p>Activities</p>
                            <div class="activity-counter"><span>9</span></div>
                        </div>
                        <div class="wrap">
                            <?= \humhub\modules\mail\widgets\Notifications::widget(); ?>
                            <?= \humhub\modules\friendship\widgets\Notifications::widget(); ?>

                            <div class="item">
                                <div class="activity-icon"><svg class="icon icon-notifications"><use xlink:href="svg/sprite/sprite.svg#notifications"></use></svg>
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
                                                            </div> added 5 new photos to album<a href="#"> My Photo.</a>
                                                            <div class="date">an hour ago</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="earlierList">
                                                <div class="list-header"><span>Earlier</span></div>
                                                <ul>
                                                    <li class="notification">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="notifi-wrap ">
                                                            <div class="text">
                                                                <div class="name">Mary Lockhart</div> posted in<a href="#"> Group</a></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                    <li class="notification">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="notifi-wrap ">
                                                            <div class="text">
                                                                <div class="name">Christopher Lawrence</div> have birthday today.<a href="#"> Сongratulate him!</a></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                    <li class="notification">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="notifi-wrap has-img">
                                                            <div class="text">
                                                                <div class="name">Lary Mockhart</div> likes your photo:<a href="#"> Road to Africa.</a></div>
                                                            <div class="img-block"><img src="img/notify-img-1.png"></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                    <li class="notification">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="notifi-wrap ">
                                                            <div class="text">
                                                                <div class="name">Lary Mockhart</div> that the hope that has overcome fear in my country will help vanquish it around the world.</div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sub-menu-footer"><a class="markAsRead" href="#">Mark all as read</a><a class="seeAll" href="#">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="activity-icon"><svg class="icon icon-favorites"><use xlink:href="svg/sprite/sprite.svg#favorites"></use></svg></div>
                                <div class="tooltip">Favorites</div>
                                <div class="activity-sub-menu">
                                    <div class="favorites-sub-menu">
                                        <div class="sub-menu-header">
                                            <div class="title">Favorites</div>
                                        </div>
                                        <div class="sub-menu-content">
                                            <div class="latestList">
                                                <div class="list-header"><span>Latest</span></div>
                                                <ul>
                                                    <li class="favorite">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="favorite-wrap has-img">
                                                            <div class="text">
                                                                <div class="name">Lary Mockhart</div> likes your photo:<a href="#"> Road to Africa.</a></div>
                                                            <div class="img-block"><img src="img/notify-img-1.png"></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                    <li class="favorite">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="favorite-wrap ">
                                                            <div class="text">
                                                                <div class="name">Christopher Lawrence</div> blog post:.<a href="#"> Australia</a></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                    <li class="favorite">
                                                        <div class="photo"><img src="img/user-2.png"><span class="active"></span></div>
                                                        <div class="favorite-wrap ">
                                                            <div class="text">
                                                                <div class="name">Lary Mockhart</div> <a href="#"> Poll</a></div>
                                                            <div class="date">October 30 at 23:03</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="anotherFavorites">
                                                <ul>
                                                    <li><a href="#">Photos (245)</a></li>
                                                    <li><a href="#">Albums (75)</a></li>
                                                    <li><a href="#">Blog Posts (234565)</a></li>
                                                    <li><a href="#">Desires</a></li>
                                                    <li><a href="#">Polls (2)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sub-menu-footer"><a class="seeAll" href="#">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="activity-icon"><svg class="icon icon-add"><use xlink:href="svg/sprite/sprite.svg#add"></use></svg></div>
                                <div class="tooltip">Add new</div>
                                <div class="activity-sub-menu">
                                    <div class="add-sub-menu">
                                        <div class="add-header"> Add new</div>
                                        <div class="form-block">
                                            <?= \humhub\modules\user\widgets\UserChangeStatus::widget(); ?>

                                        </div>
                                        <div class="add-link-block">
                                            <div class="link greatest-desire"><a href="<?= Url::to(['/desire/desire/create']); ?>"><svg class="icon icon-earth_green"><use xlink:href="svg/sprite/sprite.svg#earth_green"></use></svg> Greatest Desire</a></div>
                                            <div class="link"><a href="<?= Url::to(['/blog/blog/create']); ?>"><svg class="icon icon-success_stories"><use xlink:href="svg/sprite/sprite.svg#success_stories"></use></svg> Success story</a></div>
                                            <div class="link"><a href="<?= Url::to(['/gallery/list']); ?>"><svg class="icon icon-photos"><use xlink:href="svg/sprite/sprite.svg#photos"></use></svg> Photos</a></div>
                                            <div class="link"><a href="<?= Url::to(['/blog/blog/create']); ?>"><svg class="icon icon-blog"><use xlink:href="svg/sprite/sprite.svg#blog"></use></svg> Blog post</a></div>
                                            <div class="link"><a href="#"><svg class="icon icon-Group"><use xlink:href="svg/sprite/sprite.svg#Group"></use></svg> Group</a></div>
                                            <div class="link"><a href="#"><svg class="icon icon-poll"><use xlink:href="svg/sprite/sprite.svg#poll"></use></svg> Poll</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="activity-icon"><svg class="icon icon-invite"><use xlink:href="svg/sprite/sprite.svg#invite"></use></svg></div>
                                <div class="tooltip">Invite friend</div>
                                <div class="activity-sub-menu">
                                    <div class="invite-sub-menu">
                                        <a href="#">
                                            <div class="inv-icon"><svg class="icon icon-email"><use xlink:href="svg/sprite/sprite.svg#email"></use></svg></div>Invite Friends by E-mail</a>
                                        <a href="#">
                                            <div class="inv-icon"><svg class="icon icon-facebook"><use xlink:href="svg/sprite/sprite.svg#facebook"></use></svg></div>Invite Friends from Facebook</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-navigation">
                        <div class="wrap">
                            <div class="account-block">
	                            <?php $userModel = Yii::$app->user->getIdentity(); ?>
                                <a href="<?= $userModel->createUrl('/user/profile/home'); ?>">
                                    <div class="user-img"><img src="<?= $userModel->getProfileImage()->getUrl(); ?>"></div><span>My Account</span></a>
                            </div>
                            <div class="setting-block">
                                <a href="<?= Url::toRoute('/user/account/edit'); ?>">
                                    <div class="setting-img"><svg class="icon icon-settings"><use xlink:href="svg/sprite/sprite.svg#settings"></use></svg></div><span>Settings</span></a>
                            </div>
                            <?php if (\humhub\modules\admin\widgets\AdminMenu::canAccess()) { ?>
                            <div class="setting-block">
                                <a href="<?= Url::toRoute('/admin'); ?>">
                                    <div class="setting-img"><svg class="icon icon-settings"><use xlink:href="svg/sprite/sprite.svg#settings"></use></svg></div><span>Admin</span></a>
                            </div>
                            <?php } ?>
                            <div class="logOut">
                                <a href="<?= Url::toRoute('/user/auth/logout'); ?>">
                                    <div class="logOut-img"><svg class="icon icon-logout"><use xlink:href="svg/sprite/sprite.svg#logout"></use></svg></div><span>Logout</span></a>
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
                           <div class="logo"><a href="<?= Url::home(); ?>"><svg class="icon icon-logo"><use xlink:href="./svg/sprite/sprite.svg#logo"></use></svg></a></div>

                           <div class="lang-block">
	                           <?= humhub\widgets\LanguageChooser::widget(); ?>

                           </div>
                           <div class="general-menu">
                               <ul>
                                   <li><a href="<?= Url::to(['/desire/desire/list']); ?>">Desires</a></li>
                                   <li><a href="#">Chat</a></li>
                                   <li><a href="<?= Url::to(['/gallery/list']); ?>">Photos</a></li>
                                   <li><a href="<?= Url::to(['/blog/blog/list']); ?>">Blogs</a></li>
                                   <li><a href="#">Groups</a></li>
                                   <li><a href="#">Polls</a></li>
                                   <li><a href="#">News</a></li>
                               </ul>
                           </div>
                           <div class="sidebar-notification">
                               <div class="item">
                                   <div class="title">Today is</div>
                                   <div class="close-btn"><svg class="icon icon-close"><use xlink:href="./svg/sprite/sprite.svg#close"></use></svg></div>
                                   <div class="img-block"><img src="img/user-2.png"><span class="active"></span></div>
                                   <div class="item-wrap">
                                       <div class="name">Christopher Lawrence</div>
                                       <div class="event"><svg class="icon icon-birthday-cake"><use xlink:href="./svg/sprite/sprite.svg#birthday-cake"></use></svg>
                                           <p>Birthday!</p>
                                       </div>
                                   </div>
                                   <div class="date">17.03.2016</div>
                               </div>
                           </div>
                       </div>
                   </aside>
                   <div class="right-side-wrap">
	                   <?= $content; ?>
                   </div>
               </div>
               <div class="popular-desire-tags">
                   <div class="base-lg-wrap">
                       <div class="title">Popular desire tags</div>
                       <div id="all-footer-tags"><span data-weight="91"><a href="#">Trip</a></span><span data-weight="21"><a href="#">Voice</a></span><span data-weight="41"><a href="#">Love</a></span><span data-weight="13"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="91"><a href="#">Power</a></span><span data-weight="21"><a href="#">Speed</a></span><span data-weight="41"><a href="#">Ocean</a></span><span data-weight="13"><a href="#">Safety</a></span><span data-weight="78"><a href="#">Alaska</a></span>
                           <span
                                   data-weight="91"><a href="#">Business</a></span><span data-weight="21"><a href="#">Car</a></span><span data-weight="41"><a href="#">Apple</a></span><span data-weight="13"><a href="#">Trip</a></span><span data-weight="78"><a href="#">Ireland</a></span>
                           <span
                                   data-weight="91"><a href="#">Trip</a></span><span data-weight="21"><a href="#">Voice</a></span><span data-weight="41"><a href="#">Love</a></span><span data-weight="13"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="91"><a href="#">Power</a></span><span data-weight="21"><a href="#">Speed</a></span><span data-weight="41"><a href="#">Ocean</a></span><span data-weight="13"><a href="#">Safety</a></span><span data-weight="78"><a href="#">Alaska</a></span>
                           <span
                                   data-weight="91"><a href="#">Business</a></span><span data-weight="21"><a href="#">Car</a></span><span data-weight="41"><a href="#">Apple</a></span><span data-weight="13"><a href="#">Trip</a></span><span data-weight="78"><a href="#">Ireland</a></span>
                           <span
                                   data-weight="91"><a href="#">Trip</a></span><span data-weight="21"><a href="#">Voice</a></span><span data-weight="41"><a href="#">Love</a></span><span data-weight="13"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="91"><a href="#">Power</a></span><span data-weight="21"><a href="#">Speed</a></span><span data-weight="41"><a href="#">Ocean</a></span><span data-weight="13"><a href="#">Safety</a></span><span data-weight="78"><a href="#">Alaska</a></span>
                           <span
                                   data-weight="51"><a href="#">Business</a></span><span data-weight="31"><a href="#">Car</a></span><span data-weight="11"><a href="#">Apple</a></span><span data-weight="93"><a href="#">Trip</a></span><span data-weight="28"><a href="#">Ireland</a></span>
                           <span
                                   data-weight="41"><a href="#">Trip</a></span><span data-weight="31"><a href="#">Voice</a></span><span data-weight="61"><a href="#">Love</a></span><span data-weight="23"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="11"><a href="#">Power</a></span><span data-weight="91"><a href="#">Speed</a></span><span data-weight="41"><a href="#">Ocean</a></span><span data-weight="80"><a href="#">Safety</a></span><span data-weight="34"><a href="#">Alaska</a></span>
                           <span
                                   data-weight="11"><a href="#">Business</a></span><span data-weight="81"><a href="#">Car</a></span><span data-weight="21"><a href="#">Apple</a></span><span data-weight="23"><a href="#">Trip</a></span><span data-weight="90"><a href="#">Ireland</a></span>
                           <span
                                   data-weight="80"><a href="#">Communication</a></span><span data-weight="60"><a href="#">Communication</a></span><span data-weight="40"><a href="#">Communication</a></span><span data-weight="20"><a href="#">Communication</a></span>
                           <span
                                   data-weight="60"><a href="#">Snowboarding</a></span><span data-weight="91"><a href="#">Trip</a></span><span data-weight="31"><a href="#">Voice</a></span><span data-weight="51"><a href="#">Love</a></span>
                           <span
                                   data-weight="23"><a href="#">Theatre</a></span><span data-weight="58"><a href="#">House</a></span><span data-weight="31"><a href="#">Power</a></span><span data-weight="81"><a href="#">Speed</a></span>
                           <span
                                   data-weight="51"><a href="#">Ocean</a></span><span data-weight="93"><a href="#">Safety</a></span><span data-weight="48"><a href="#">Alaska</a></span><span data-weight="11"><a href="#">Business</a></span>
                           <span
                                   data-weight="91"><a href="#">Car</a></span><span data-weight="21"><a href="#">Apple</a></span><span data-weight="53"><a href="#">Trip</a></span><span data-weight="38"><a href="#">Ireland</a></span>
                           <span
                                   data-weight="41"><a href="#">Trip</a></span><span data-weight="51"><a href="#">Voice</a></span><span data-weight="21"><a href="#">Love</a></span><span data-weight="73"><a href="#">Theatre</a></span>
                           <span
                                   data-weight="28"><a href="#">House</a></span><span data-weight="31"><a href="#">Power</a></span><span data-weight="61"><a href="#">Speed</a></span><span data-weight="11"><a href="#">Ocean</a></span>
                           <span
                                   data-weight="33"><a href="#">Safety</a></span><span data-weight="58"><a href="#">Alaska</a></span><span data-weight="41"><a href="#">Business</a></span><span data-weight="41"><a href="#">Car</a></span>
                           <span
                                   data-weight="11"><a href="#">Apple</a></span><span data-weight="23"><a href="#">Trip</a></span><span data-weight="78"><a href="#">Ireland</a></span><span data-weight="31"><a href="#">Trip</a></span>
                           <span
                                   data-weight="31"><a href="#">Voice</a></span><span data-weight="41"><a href="#">Love</a></span><span data-weight="13"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="31"><a href="#">Power</a></span><span data-weight="61"><a href="#">Speed</a></span><span data-weight="81"><a href="#">Ocean</a></span><span data-weight="53"><a href="#">Safety</a></span>
                           <span
                                   data-weight="18"><a href="#">Alaska</a></span><span data-weight="31"><a href="#">Business</a></span><span data-weight="61"><a href="#">Car</a></span><span data-weight="11"><a href="#">Apple</a></span>
                           <span
                                   data-weight="33"><a href="#">Trip</a></span><span data-weight="28"><a href="#">Ireland</a></span><span data-weight="41"><a href="#">Trip</a></span><span data-weight="31"><a href="#">Voice</a></span>
                           <span
                                   data-weight="61"><a href="#">Love</a></span><span data-weight="23"><a href="#">Theatre</a></span><span data-weight="78"><a href="#">House</a></span>
                           <span
                                   data-weight="11"><a href="#">Power</a></span><span data-weight="61"><a href="#">Speed</a></span><span data-weight="41"><a href="#">Ocean</a></span>
                           <span
                                   data-weight="40"><a href="#">Safety</a></span><span data-weight="34"><a href="#">Alaska</a></span><span data-weight="11"><a href="#">Business</a></span>
                           <span
                                   data-weight="31"><a href="#">Car</a></span><span data-weight="21"><a href="#">Apple</a></span><span data-weight="23"><a href="#">Trip</a></span>
                           <span
                                   data-weight="30"><a href="#">Ireland</a></span><span data-weight="50"><a href="#">Communication</a></span><span data-weight="60"><a href="#">Communication</a></span>
                           <span
                                   data-weight="70"><a href="#">Communication</a></span><span data-weight="20"><a href="#">Communication</a></span><span data-weight="60"><a href="#">Snowboarding</a></span></div>
                       <div
                               class="search-tags">
                           <p>Find your like-minded people</p>
                           <div class="form-wrap"><input type="text" placeholder="Desire keywords"><input type="submit" value="Search"></div>
                       </div>
                   </div>
               </div>
           </main>
           <footer>
               <div class="top">
                   <div class="base-wrap">
                       <div class="logo"><svg class="icon icon-logo"><use xlink:href="./svg/sprite/sprite.svg#logo"></use></svg></div>
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
                               <div class="form-item"><label for="footer-email">E-mail*</label><input id="footer-email" type="email"></div><label>Message*<div class="textarea-wrap"><textarea rows="1"></textarea></div></label>
                               <div class="base-sm-btn"><input type="submit" value="Send"></div>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="bottom">
                   <div class="base-wrap">
                       <div class="copy">© All rights reserved.</div>
                       <div class="dev-logo"><a href="#"><svg class="icon icon-logo_footer"><use xlink:href="./svg/sprite/sprite.svg#logo_footer"></use></svg></a></div>
                   </div>
               </div>
           </footer>

        <?php } else { ?>

           <div id="topbar-first" class="topbar">
               <div class="container">
                   <div class="topbar-brand hidden-xs">
				       <?= \humhub\widgets\SiteLogo::widget(); ?>
                   </div>

                   <div class="topbar-actions pull-right">
				       <?= \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
                   </div>

                   <div class="notifications pull-right">
				       <?= \humhub\widgets\NotificationArea::widget(); ?>
                   </div>
               </div>
           </div>
           <!-- end: first top navigation bar -->

           <!-- start: second top navigation bar -->
           <div id="topbar-second" class="topbar">
               <div class="container">
                   <ul class="nav" id="top-menu-nav">
                       <!-- load space chooser widget -->
				       <?= \humhub\modules\space\widgets\Chooser::widget(); ?>

                       <!-- load navigation from widget -->
				       <?= \humhub\widgets\TopMenu::widget(); ?>
                   </ul>

                   <ul class="nav pull-right" id="search-menu-nav">
				       <?= \humhub\widgets\TopMenuRightStack::widget(); ?>
                   </ul>
               </div>
           </div>




        <!-- end: second top navigation bar -->

        <?= $content; ?>
       <?php } ?>
        <?php $this->endBody() ?>
        <script src="<?= $this->theme->getBaseUrl(); ?>/js/scripts.min.js"></script>
    </body>
</html>
<?php $this->endPage() ?>
