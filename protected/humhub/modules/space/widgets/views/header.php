<?php
/* @var $this \humhub\components\View */
/* @var $currentSpace \humhub\modules\space\models\Space */

use yii\helpers\Html;

if ($space->isAdmin()) {
    $this->registerJsFile('@web-static/resources/space/spaceHeaderImageUpload.js');
    $this->registerJsVar('profileImageUploaderUrl', $space->createUrl('/space/manage/image/upload'));
    $this->registerJsVar('profileHeaderUploaderUrl', $space->createUrl('/space/manage/image/banner-upload'));
}
?>
<div class="group-top-block">
    <div class="group-img">
	    <?php if ($space->profileImage->hasImage()) : ?>
            <!-- profile image output-->
            <a data-ui-gallery="spaceHeader" href="<?= $space->profileImage->getUrl('_org'); ?>">
			    <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 370]); ?>
            </a>
	    <?php else : ?>
		    <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 370]); ?>
	    <?php endif; ?>

        <!-- check if the current user is the profile owner and can change the images -->
        <div class="image-upload-container profile-user-photo-container" style="width: 140px; height: 140px;">
	    <?php if ($space->isAdmin()) : ?>
            <form class="fileupload" id="profilefileupload" action="" method="POST" enctype="multipart/form-data"
                  style="position: absolute; top: 0; left: 0; opacity: 0; height: 240px; width: 140px;">
                <input type="file" name="spacefiles[]">
            </form>

            <div class="image-upload-loader" id="profile-image-upload-loader" style="padding-top: 60px;">
                <div class="progress image-upload-progess-bar" id="profile-image-upload-bar">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 0%;">
                    </div>
                </div>
            </div>

            <div class="image-upload-buttons" id="profile-image-upload-buttons">
                <a onclick="javascript:$('#profilefileupload input').click();" class="btn btn-info btn-sm"><i
                            class="fa fa-cloud-upload"></i></a>
                <a id="profile-image-upload-edit-button"
                   style="<?php
			       if (!$space->getProfileImage()->hasImage()) {
				       echo 'display: none;';
			       }
			       ?>"
                   href="<?php echo $space->createUrl('/space/manage/image/crop'); ?>"
                   class="btn btn-info btn-sm" data-target="#globalModal" data-backdrop="static"><i
                            class="fa fa-edit"></i></a>
			    <?php
			    echo humhub\widgets\ModalConfirm::widget(array(
				    'uniqueID' => 'modal_profileimagedelete',
				    'linkOutput' => 'a',
				    'title' => Yii::t('SpaceModule.widgets_views_deleteImage', '<strong>Confirm</strong> image deleting'),
				    'message' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Do you really want to delete your profile image?'),
				    'buttonTrue' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Delete'),
				    'buttonFalse' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Cancel'),
				    'linkContent' => '<i class="fa fa-times"></i>',
				    'cssClass' => 'btn btn-danger btn-sm',
				    'style' => $space->getProfileImage()->hasImage() ? '' : 'display: none;',
				    'linkHref' => $space->createUrl("/space/manage/image/delete", array('type' => 'profile')),
				    'confirmJS' => 'function(jsonResp) { resetProfileImage(jsonResp); }'
			    ));
			    ?>
            </div>
	    <?php endif; ?>
        </div>
    </div>
    <div class="short-info">
        <div class="name"><?php echo Html::encode($space->name); ?></div>
        <div class="category"><?= isset($category[$space->category])?$category[$space->category]:''; ?></div>
        <div class="desc"><?php echo Html::encode($space->description); ?></div>
        <div class="bottom">
            <ul class="group-menu">
                <li class="add-friend">
                    <div class="link"><svg class="icon icon-friend"><use xlink:href="./svg/sprite/sprite.svg#friend"></use></svg><svg class="icon icon-unfriend"><use xlink:href="./svg/sprite/sprite.svg#unfriend"></use></svg>
                        <div class="tooltip-base">Add Friend</div>
                        <div class="tooltip-base active">Unfriend</div>
                    </div>
                </li>
                <li class="share">
                    <div class="link"><svg class="icon icon-share"><use xlink:href="./svg/sprite/sprite.svg#share"></use></svg>
                        <div class="tooltip-base">Share</div>
                    </div>
                </li>
                <li class="follow">
                    <div class="link"><svg class="icon icon-follow"><use xlink:href="./svg/sprite/sprite.svg#follow"></use></svg><svg class="icon icon-followed"><use xlink:href="./svg/sprite/sprite.svg#followed"></use></svg>
                        <div class="tooltip-base">Follow</div>
                        <div class="tooltip-base active">Unfollow</div>
                    </div>
                </li>
            </ul>
            <div class="statistic-info">
                <div class="subscribers"><svg class="icon icon-members"><use xlink:href="./svg/sprite/sprite.svg#members"></use></svg>
                    <div class="val">
                        <a href="<?= $space->createUrl('/space/membership/members-list'); ?>">
                            <?= $space->getMemberships()->count(); ?>
                        </a>
                    </div>
                </div>
                <div class="thumbUp"><svg class="icon icon-liked"><use xlink:href="./svg/sprite/sprite.svg#liked"></use></svg>
                    <div class="val">122</div>
                </div>
                <div class="stars"><svg class="icon icon-star_fill"><use xlink:href="./svg/sprite/sprite.svg#star_fill"></use></svg>
                    <div class="val">14</div>
                </div>
            </div>
            <div class="top-menu">
                <ul>
                    <li class="active"><a href="#">Timeline</a></li>
                    <li><a href="#">Info</a></li>
                    <li><a href="#">Members</a></li>
                    <li><a href="#">Polls</a></li>
                    <li><a href="#">Photos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default panel-profile">

    <div class="panel-profile-header">

        <div class="image-upload-container" style="width: 100%; height: 100%; overflow:hidden;">
            <!-- profile image output-->
            <img class="img-profile-header-background" id="space-banner-image"
                 src="<?php echo $space->getProfileBannerImage()->getUrl(); ?>"
                 width="100%" style="width: 100%;">

            <!-- check if the current user is the profile owner and can change the images -->
            <?php if ($space->isAdmin()) { ?>
                <form class="fileupload" id="bannerfileupload" action="" method="POST" enctype="multipart/form-data"
                      style="position: absolute; top: 0; left: 0; opacity: 0; width: 100%; height: 100%;">
                    <input type="file" name="bannerfiles[]">
                </form>

                <?php
                // set standard padding for banner progressbar
                $padding = '90px 350px';

                // if the default banner image is displaying
                if (!$space->getProfileBannerImage()->hasImage()) {
                    // change padding to the lower image height
                    $padding = '50px 350px';
                }
                ?>

                <div class="image-upload-loader" id="banner-image-upload-loader"
                     style="padding: <?php echo $padding ?>;">
                    <div class="progress image-upload-progess-bar" id="banner-image-upload-bar">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 0%;">
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- show user name and title -->
            <div class="img-profile-data">
                <h1 class="space"><?php echo Html::encode($space->name); ?></h1>

                <h2 class="space"><?php echo Html::encode($space->description); ?></h2>
            </div>

            <!-- check if the current user is the profile owner and can change the images -->
            <?php if ($space->isAdmin()) { ?>
                <div class="image-upload-buttons" id="banner-image-upload-buttons">
                    <a href="#" onclick="javascript:$('#bannerfileupload input').click();"
                       class="btn btn-info btn-sm"><i
                            class="fa fa-cloud-upload"></i></a>
                    <a id="banner-image-upload-edit-button"
                       style="<?php
                       if (!$space->getProfileBannerImage()->hasImage()) {
                           echo 'display: none;';
                       }
                       ?>"
                       href="<?php echo $space->createUrl('/space/manage/image/crop-banner'); ?>"
                       class="btn btn-info btn-sm" data-target="#globalModal" data-backdrop="static"><i
                            class="fa fa-edit"></i></a>
                        <?php
                        echo humhub\widgets\ModalConfirm::widget(array(
                            'uniqueID' => 'modal_bannerimagedelete',
                            'linkOutput' => 'a',
                            'title' => Yii::t('SpaceModule.widgets_views_deleteBanner', '<strong>Confirm</strong> image deleting'),
                            'message' => Yii::t('SpaceModule.widgets_views_deleteBanner', 'Do you really want to delete your title image?'),
                            'buttonTrue' => Yii::t('SpaceModule.widgets_views_deleteBanner', 'Delete'),
                            'buttonFalse' => Yii::t('SpaceModule.widgets_views_deleteBanner', 'Cancel'),
                            'linkContent' => '<i class="fa fa-times"></i>',
                            'cssClass' => 'btn btn-danger btn-sm',
                            'style' => $space->getProfileBannerImage()->hasImage() ? '' : 'display: none;',
                            'linkHref' => $space->createUrl("/space/manage/image/delete", ['type' => 'banner']),
                            'confirmJS' => 'function(jsonResp) { resetProfileImage(jsonResp); }'
                        ));
                        ?>
                </div>

            <?php } ?>
        </div>

        <div class="image-upload-container profile-user-photo-container" style="width: 140px; height: 140px;">

            <?php if ($space->profileImage->hasImage()) : ?>
                <!-- profile image output-->
                <a data-ui-gallery="spaceHeader" href="<?= $space->profileImage->getUrl('_org'); ?>">
                    <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 140]); ?>
                </a>
            <?php else : ?>
                <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 140]); ?>
            <?php endif; ?>


        </div>


    </div>

    <div class="panel-body">

        <div class="panel-profile-controls">
            <!-- start: User statistics -->
            <div class="row">
                <div class="col-md-12">
                    <div class="statistics pull-left">

                        <div class="pull-left entry">
                            <span class="count"><?= $postCount; ?></span>
                            <br>
                            <span
                                class="title"><?= Yii::t('SpaceModule.widgets_views_profileHeader', 'Posts'); ?></span>
                        </div>

                        <a href="<?= $space->createUrl('/space/membership/members-list'); ?>" data-target="#globalModal">
                            <div class="pull-left entry">
                                <span class="count"><?= $space->getMemberships()->count(); ?></span>
                                <br>
                                <span
                                    class="title"><?= Yii::t('SpaceModule.widgets_views_profileHeader', 'Members'); ?></span>
                            </div>
                        </a>
                        <?php if ($followingEnabled): ?>
                            <a href="<?= $space->createUrl('/space/space/follower-list'); ?>" data-target="#globalModal">
                                <div class="pull-left entry">
                                    <span class="count"><?= $space->getFollowerCount(); ?></span><br>
                                    <span
                                        class="title"><?= Yii::t('SpaceModule.widgets_views_profileHeader', 'Followers'); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <!-- end: User statistics -->

                    <div class="controls controls-header pull-right">
                        <?=
                        humhub\modules\space\widgets\HeaderControls::widget(['widgets' => [
                                [\humhub\modules\space\widgets\InviteButton::className(), ['space' => $space], ['sortOrder' => 10]],
                                [\humhub\modules\space\widgets\MembershipButton::className(), ['space' => $space], ['sortOrder' => 20]],
                                [\humhub\modules\space\widgets\FollowButton::className(), [
                                        'space' => $space,
                                        'followOptions' => ['class' => 'btn btn-primary'],
                                        'unfollowOptions' => ['class' => 'btn btn-info']],
                                    ['sortOrder' => 30]]
                        ]]);
                        ?>
                        <?=
                        humhub\modules\space\widgets\HeaderControlsMenu::widget([
                            'space' => $space,
                            'template' => '@humhub/widgets/views/dropdownNavigation'
                        ]);
                        ?>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

<!-- start: Error modal -->
<div class="modal" id="uploadErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-extra-small animated pulse">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"
                    id="myModalLabel"><?php echo Yii::t('SpaceModule.widgets_views_profileHeader', '<strong>Something</strong> went wrong'); ?></h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                        data-dismiss="modal"><?php echo Yii::t('SpaceModule.widgets_views_profileHeader', 'Ok'); ?></button>
            </div>
        </div>
    </div>
</div>
