<?php

namespace humhub\modules\gallery\models;

use \humhub\modules\content\components\ContentActiveRecord;
use \humhub\modules\file\models\File;
use \humhub\modules\gallery\libs\FileUtils;
use \humhub\modules\user\models\User;
use \Yii;
use \yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gallery_media".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $description
 * @property string $title
 * @property integer $sort_order
 *
 * @package humhub.modules.gallery.models
 * @since 1.0
 * @author Sebastian Stumpf
 */
class Media extends ContentActiveRecord
{
    /**
     * @var BaseGallery used for instantiation
     */
    public $gallery;

    /**
     * @inheritdoc
     */
    public $autoAddToWall = true;

    /**
     * @inheritdoc
     */
    public $wallEntryClass = "humhub\modules\gallery\widgets\WallEntryMedia";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_media';
    }

	public static function objectName()
	{
		return 'photo'; //TODO translate;
	}

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if($this->gallery) {
            $this->gallery_id =  $this->gallery->id;
            $this->content->visibility = $this->gallery->content->visibility;
            $this->content->container = $this->gallery->content->container;
        }
    }

    public function getWallUrl()
    {
        return Url::to(['/content/perma', 'id' => $this->content->id], true);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['gallery_id', 'integer'],
            ['title', 'string', 'max' => 255],
            ['description', 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
            'description' => 'Description'
        ];
    }

    public function getItemId()
    {
        return 'media_' . $this->id;
    }

    public function getFileName()
    {
        return $this->baseFile->file_name;
    }

    public function getSize()
    {
        return $this->baseFile->size;
    }

    public function getFileUrl($download = false) {
        return \humhub\modules\file\handler\DownloadFileHandler::getUrl($this->baseFile, $download);   
    }

    public function getCreator()
    {
        return User::findOne(['id' => $this->baseFile->created_by]);
    }

    public function getEditor()
    {
        return User::findOne(['id' => $this->baseFile->updated_by]);
    }

    public function getBaseFile()
    {
        $query = $this->hasOne(File::className(), ['object_id' => 'id']);
        $query->andWhere(['file.object_model' => self::className()]);
        return $query;
    }

    protected function getFallbackPreviewImageUrl()
    {
        $path = Yii::$app->getModule('gallery')->getAssetsUrl();
        $path = $path . '/file-picture-o.svg';
        return $path;
    }

    public function getSquarePreviewImageUrl($first = false)
    {
        try {
            $previewImage = SquarePreviewImage::getSquarePreviewImageUrlFromFile($this->baseFile, $first);
        } catch (Exception $e) {
            
        }
        return empty($previewImage) ? $this->getFallbackPreviewImageUrl() : $previewImage;
    }

    public function getMyLastPhoto($pageSize)
    {
    	$userID = Yii::$app->user->id;
    	$query = self::find();
    	$query->leftJoin('file', 'file.object_id = gallery_media.id');
	    $query->andWhere(['file.object_model' => self::className()]);
    	$query->andWhere(['file.created_by' => $userID]);
    	$query->orderBy('date_create DESC');
    	$query->limit($pageSize);


    	return $query->all();
    }

    /**
     * @inheritdoc
     */
    public function getContentName()
    {
        return Yii::t('GalleryModule.base', "Media");
    }

    /**
     * @inheritdoc
     */
    public function getContentDescription()
    {
        return $this->getTitle();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getParentGallery()
    {
        return $this->hasOne(CustomGallery::className(), ['id' => 'gallery_id']);
    }

    public function getEditUrl()
    {
        return $this->content->container->createUrl('/gallery/media/edit', ['id' => $this->getItemId()]);
    }

    /**
     * Saves the given uploaded file.
     *
     * @param UploadedFile $cfile
     * @return MediaUpload
     */
    public function handleUpload(UploadedFile $file)
    {
        $mediaUpload = new MediaUpload();
        $mediaUpload->setUploadedFile($file);
        $valid = $mediaUpload->validate();

        if ($valid) {
            $this->title = $mediaUpload->file_name;
            $this->date_create = new \yii\db\Expression('NOW()');

            $valid = $this->validate();

            if ($valid) {
                if($this->save()) {
                    $mediaUpload->object_model = self::class;
                    $mediaUpload->object_id = $this->id;
                    $mediaUpload->show_in_stream = false;
                    $mediaUpload->save();
                }
            }
        }

        return $mediaUpload;
    }

    public static function getPublicPhotos($offset = 0)
    {
	    $media = (new \yii\db\Query())->from('gallery_media');
	    $content = (new \yii\db\Query())->from('content');
	    $object = File::find();
	    $object->leftJoin(['m' => $media], 'm.id = file.object_id');
	    $object->leftJoin(['c' => $content], 'c.object_id = m.gallery_id');
	    $object->where(['file.object_model' => Media::className()]);
	    $object->andWhere(['c.object_model' => CustomGallery::className()]);
	    $object->andWhere(['c.visibility' => 1]);
	    $object->orderBy('created_at DESC');
	    $object->limit(9);
	    $object->offset($offset);
		$objectClone = clone $object;

	    $data['photos'] = $object->all();
	    $data['count'] = $objectClone->count();

	    return $data;
    }

    public function afterDelete()
    {
        if($this->baseFile !== NULL) {
            $this->baseFile->delete();
        }
        parent::afterDelete();
    }

}
