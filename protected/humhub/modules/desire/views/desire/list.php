<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 13.03.18
 * Time: 13:24
 */
use humhub\modules\admin\models\AdminDesires;
use humhub\modules\comment\widgets\CommentLink;
use humhub\modules\comment\widgets\Comments;
use humhub\modules\like\widgets\LikeLink;
use humhub\modules\rating\widgets\RatingLink;
use humhub\modules\sharebetween\widgets\ShareLink;
use humhub\widgets\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<div class="panel-heading">
<strong>Blogs</strong>
<p><?php echo $count; ?> Blog Posts</p>
</div>
<div class="panel-body">
<?php foreach($articles as $article) { ?>
<div class="item-desire">

<div class="user-photo"></div>
    <div class="user-name"></div>
    <div class="wraper-images">
	    <?= \humhub\modules\file\widgets\ShowPhotoPreview::widget(['object' => $article]); ?>
    </div>
    <div class="title"><a href="<?= \yii\helpers\Url::toRoute(['desire/view', 'id'=>$article->id]); ?>"><?= $article->title; ?></a></div>
    <div class="category"><hr>
	    <?php
	    foreach ($article->tags as $tag){
		    echo '#'.$tag->title.' ';
	    }
	    ?>
        <hr></div>
    <div class="short-content"><?= \humhub\libs\StringHelper::truncateWords($article->message, 35, '...'); ?></div>
    <div class="panel-widget">

    </div>
    <div class="col-sm-12 social-activities-gallery colorFont5">
		<?= CommentLink::widget(['object' => $article]); ?>
        |
		<?= LikeLink::widget(['object' => $article]); ?>

	    <?= ShareLink::widget(['content' => $article]); ?>

		<?= Comments::widget(['object' => $article]); ?>

		<?= RatingLink::widget(['object' => $article]); ?>


    </div>
</div>
<?php } ?>

<?php
echo LinkPager::widget([
	'pagination' => $pagination,
]);
?>
</div>
