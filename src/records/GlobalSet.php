<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\records;

use yii\db\ActiveQueryInterface;
use craft\app\db\ActiveRecord;
use craft\app\enums\AttributeType;

/**
 * Field group record class.
 *
 * @var integer $id ID
 * @var integer $fieldLayoutId Field layout ID
 * @var string $name Name
 * @var string $handle Handle
 * @var ActiveQueryInterface $element Element
 * @var ActiveQueryInterface $fieldLayout Field layout

 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class GlobalSet extends ActiveRecord
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['handle'], 'craft\\app\\validators\\Handle', 'reservedWords' => ['id', 'dateCreated', 'dateUpdated', 'uid', 'title']],
			[['fieldLayoutId'], 'number', 'min' => -2147483648, 'max' => 2147483647, 'integerOnly' => true],
			[['name', 'handle'], 'unique'],
			[['name', 'handle'], 'required'],
			[['name', 'handle'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 *
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%globalsets}}';
	}

	/**
	 * Returns the global set’s element.
	 *
	 * @return \yii\db\ActiveQueryInterface The relational query object.
	 */
	public function getElement()
	{
		return $this->hasOne(Element::className(), ['id' => 'id']);
	}

	/**
	 * Returns the global set’s fieldLayout.
	 *
	 * @return \yii\db\ActiveQueryInterface The relational query object.
	 */
	public function getFieldLayout()
	{
		return $this->hasOne(FieldLayout::className(), ['id' => 'fieldLayoutId']);
	}
}
