<?php

use yii\helpers\Html;
use yii\helpers\Url;
use humhub\modules\user\controllers\ImageController;
use yii\widgets\ActiveForm;

if ( $allowModifyProfileBanner || $allowModifyProfileImage ) {
	$this->registerJsFile( '@web-static/resources/user/profileHeaderImageUpload.js' );
	$this->registerJs( "var profileImageUploaderUserGuid='" . $user->guid . "';", \yii\web\View::POS_BEGIN );
	$this->registerJs( "var profileImageUploaderCurrentUserGuid='" . Yii::$app->user->getIdentity()->guid . "';", \yii\web\View::POS_BEGIN );
	$this->registerJs( "var profileImageUploaderUrl='" . Url::to( [
			'/user/image/upload',
			'userGuid' => $user->guid,
			'type'     => ImageController::TYPE_PROFILE_IMAGE
		] ) . "';", \yii\web\View::POS_BEGIN );
	$this->registerJs( "var profileHeaderUploaderUrl='" . Url::to( [
			'/user/image/upload',
			'userGuid' => $user->guid,
			'type'     => ImageController::TYPE_PROFILE_BANNER_IMAGE
		] ) . "';", \yii\web\View::POS_BEGIN );
}
?>


<div class="profile-top-block">
    <div class="user-info-top-block">

        <div class="desire-img"><?= \humhub\modules\file\widgets\ShowPhotoPreview::widget( [
				'object'  => $greatestDesire,
				'options' => [
					'index'  => 0,
					'height' => 370,
					'width'  => 370
				]
			] ); ?>
			<?php if ( $isProfileOwner ) { ?>
                <a class="edit" href="<?= Url::to( [ '/desire/desire/update', 'id' => $greatestDesire->id ] ); ?>">

                    <svg class="icon icon-edit_desire_hover">
                        <use xlink:href="./svg/sprite/sprite.svg#edit_desire_hover"></use>
                    </svg>
                </a>
			<?php } ?>
        </div>
        <div class="info-short">
            <div class="top">
                <div class="name"><?= Html::encode( $user->displayName ); ?></div>
                <div class="subText"><?= $user->info_status; ?></div>
            </div>
            <div class="bottom">
                <div class="avatar-menu">
                    <div class="status">

                        <?= \humhub\modules\user\widgets\OnlineStatus::widget(['user' => $user]); ?>

                    </div>

                    <div class="img-block"><img src="<?php echo $user->getProfileImage()->getUrl(); ?>">
                        <svg class="icon icon-Oval-2">
                            <use xlink:href="./svg/sprite/sprite.svg#Oval-2"></use>
                        </svg>
                    </div>
                    <ul class="menu">
						<?php if ( $isProfileOwner ) { ?>
                            <li class="edit"><a href="<?= Url::to( [ '/user/account/edit' ] ); ?>">
                                    <svg class="icon icon-edit">
                                        <use xlink:href="./svg/sprite/sprite.svg#edit"></use>
                                    </svg>
                                    <div class="tooltip-base">Edit</div>
                                </a></li>
						<?php } else { ?>
                            <li class="add-friend">
                                <div class="link">
                                    <svg class="icon icon-friend">
                                        <use xlink:href="./svg/sprite/sprite.svg#friend"></use>
                                    </svg>
                                    <svg class="icon icon-unfriend">
                                        <use xlink:href="./svg/sprite/sprite.svg#unfriend"></use>
                                    </svg>
                                    <div class="tooltip-base">Add Friend</div>
                                    <div class="tooltip-base active">Unfriend</div>
                                </div>
                            </li>
                            <li class="share">
                                <div class="link">
                                    <svg class="icon icon-share">
                                        <use xlink:href="./svg/sprite/sprite.svg#share"></use>
                                    </svg>
                                    <div class="tooltip-base">Share</div>
                                </div>
                            </li>
                            <li class="follow">
                                <div class="link">
                                    <svg class="icon icon-follow">
                                        <use xlink:href="./svg/sprite/sprite.svg#follow"></use>
                                    </svg>
                                    <svg class="icon icon-followed">
                                        <use xlink:href="./svg/sprite/sprite.svg#followed"></use>
                                    </svg>
                                    <div class="tooltip-base">Follow</div>
                                    <div class="tooltip-base active">Unfollow</div>
                                </div>
                            </li>
                            <li class="msg">
                                <div class="link">
                                    <svg class="icon icon-message">
                                        <use xlink:href="./svg/sprite/sprite.svg#message"></use>
                                    </svg>
                                    <div class="tooltip-base">Message</div>
                                </div>
                            </li>
						<?php } ?>
                    </ul>
                </div>
                <div class="wrap">
                    <div class="desire-top">
                        <div class="title">
                            <svg class="icon icon-earth_green">
                                <use xlink:href="./svg/sprite/sprite.svg#earth_green"></use>
                            </svg>
                            My Greatest Desire is…
                        </div>
                        <div class="star-rating"><span class="starVal">3.5</span><span class="counterVal">122</span>
                        </div>
                    </div>
                    <div class="desire-text">
                        <div class="text"><?= $greatestDesire->title; ?>
                        </div>
                        <ul class="tags">
							<?php foreach ( $greatestDesire->tags as $tag ) { ?>
                                <li><a href="#">#<?= $tag->title; ?></a></li>
							<?php } ?>
                        </ul>
                    </div>
                    <div class="desire-bottom"><a class="comments" href="#">
                            <svg class="icon icon-comment_border">
                                <use xlink:href="./svg/sprite/sprite.svg#comment_border"></use>
                            </svg>
                            <svg class="icon icon-comments">
                                <use xlink:href="./svg/sprite/sprite.svg#comments"></use>
                            </svg>
                            <div class="text">Comment</div>
                            <div class="val">(<span>35</span>)</div>
                            <div class="tooltip-base">Leave a comment</div>
                        </a>
                        <div
                                class="rating">
                            <div class="active-star-rating"></div>
                            <div class="text">Rate</div>
                        </div>
                        <div class="share">
                            <svg class="icon icon-share">
                                <use xlink:href="./svg/sprite/sprite.svg#share"></use>
                            </svg>
                            <div class="text">Share</div>
                            <div class="val">(12)</div>
                        </div>
                        <div class="stars">
                            <div class="follow-btn">
                                <svg class="icon icon-star_fill">
                                    <use xlink:href="./svg/sprite/sprite.svg#star_fill"></use>
                                </svg>
                                <svg class="icon icon-star_empty">
                                    <use xlink:href="./svg/sprite/sprite.svg#star_empty"></use>
                                </svg>
                                <div class="tooltip-base">Add to Favorites</div>
                            </div>
                            <a class="text" href="#">View all desires</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-info-menu">
		<?php echo \humhub\modules\user\widgets\ProfileMenu::widget( [ 'user' => $user ] ); ?>

    </div>
</div>



