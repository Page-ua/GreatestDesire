<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 13.03.18
 * Time: 13:24
 */

use humhub\modules\comment\widgets\Comments;
?>
<div class="page-content">
    <div class="content-wrap">
        <div class="blog-post-list blog-page">
            <div class="blog-page-header">
                <div class="title">Blogs</div>
                <div class="stat"><?= $count; ?> Blog Posts</div>
                <div class="filters">
                    <div class="page-filter category-filter show-on-tablet"><select><option>Activities (1)</option><option>Success Stories (34434)</option><option>Culture (34)</option><option>Food&Drink (643)</option><option>Fashion&Style (45)</option><option>Business&Money (46)</option></select></div>
                    <div
                            class="page-filter"><select><option>Newest first</option><option>Newest first 2</option><option>Newest first 3</option></select></div>
                </div>
            </div>
			<?php foreach($articles as $article) { ?>
                <div class="base-post">
                    <div class="header">
                        <div class="user-img"><img src="img/profile_photo-2.jpg"></div>
                        <div class="wrap">
                            <div class="name">Christopher Lawrence</div>
                            <div class="date"><?= \humhub\widgets\TimeAgo::widget(['timestamp' => $article->created_at]); ?></div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="article-post">
                            <div class="img-block">
                                <?= \humhub\modules\file\widgets\ShowPhotoPreview::widget(['object' => $article]); ?>
                                <div class="item"><img src="img/article-post-img-1.png"></div>
                                <div class="item"><img src="img/article-post-img-2.png"></div>
                                <div class="item"><img src="img/article-post-img-2.png">
                                    <div class="show-more"><span>+1</span></div>
                                </div>
                            </div>
                            <div class="description-block">
                                <div class="title"><?= $article->title; ?></div>
                                <div class="subtitle"><?= $category[$article->category]; ?></div>
                                <div class="text"><?= \humhub\widgets\RichText::widget(['text' => $article->message, 'maxLength' => 40]); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
						<?= \humhub\modules\content\widgets\BottomPanelContent::widget(['object' => $article]); ?>
                    </div>

					<?= Comments::widget(['object' => $article]); ?>
                    <div class="sub-context-menu">
                        <div class="context-menu-btn"><span></span><span></span><span></span></div>
                        <ul class="context-menu">
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Edit 2</a></li>
                            <li><a href="#">Edit 3</a></li>
                        </ul>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
    <div class="base-btn"><a href="#">Load more</a></div>
</div>

