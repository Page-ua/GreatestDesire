<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 16.08.18
 * Time: 14:39
 */
?>

<div class="desires-cloud">
	<div class="random-desires">
        <?php foreach($desires as $desire) { ?>
		<div class="random-desire">
			<div class="desire-img">
				<?= \humhub\modules\file\widgets\ShowPhotoPreview::widget( [
					'object'  => $desire,
					'options' => [
						'index'  => 0,
						'height' => 170,
						'width'  => 170,
					]
				] ); ?>
            </div>
			<div class="info-short">
				<div class="top">
					<div class="name"><?= $desire->user->displayName; ?></div>
                    <?= \humhub\modules\rating\widgets\RatingDisplay::widget(['object' => $desire]); ?>
				</div>
				<div class="bottom">
					<div class="img-block"><img src="<?= $desire->user->getProfileImage()->getUrl(); ?>"></div>
					<div class="wrap">
						<div class="desire-text">
							<div class="text"><?= $desire->title; ?></div>
						</div>
						<div class="desire-bottom-hover">
							<div class="comments"><svg class="icon icon-comment_border"><use xlink:href="./svg/sprite/sprite.svg#comment_border"></use></svg><svg class="icon icon-comments"><use xlink:href="./svg/sprite/sprite.svg#comments"></use></svg>
								<div
									class="text">Comment</div>
								<div class="val">(<span>35</span>)</div>
							</div>
							<div class="rating">
								<div class="star-rating"></div>
								<div class="text">Rate</div>
							</div>
							<div class="share"><svg class="icon icon-share"><use xlink:href="./svg/sprite/sprite.svg#share"></use></svg>
								<div class="text">Share</div>
								<div class="val">(12)</div>
							</div>
							<div class="stars">
								<div class="follow-btn"><svg class="icon icon-star_fill"><use xlink:href="./svg/sprite/sprite.svg#star_fill"></use></svg><svg class="icon icon-star_empty"><use xlink:href="./svg/sprite/sprite.svg#star_empty"></use></svg></div>
							</div>
						</div>
						<div class="statistic-info">
							<div class="comments"><svg class="icon icon-comments"><use xlink:href="./svg/sprite/sprite.svg#comments"></use></svg>
								<div class="val">12</div>
							</div>
							<div class="star-rating"><span class="starVal">3</span><span class="counterVal">122</span></div>
							<div class="share"><svg class="icon icon-share"><use xlink:href="./svg/sprite/sprite.svg#share"></use></svg></div>
							<div class="stars"><svg class="icon icon-star_fill"><use xlink:href="./svg/sprite/sprite.svg#star_fill"></use></svg>
								<div class="val">14</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php } ?>
	</div>
	<div class="title">Desire board</div>
	<div class="search-tags">
		<p>Find your like-minded people</p>
		<div class="form-wrap"><input type="text" placeholder="Desire keywords"><input type="submit" value="Search"></div>
	</div>
</div>
