<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

namespace craft\app\records;

use Craft;
use craft\app\db\ActiveRecord;
use craft\app\enums\AttributeType;

Craft::$app->requireEdition(Craft::Pro);

/**
 * Class UserPermission record.
 *
 * @var integer $id ID
 * @var string $name Name

 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class UserPermission extends ActiveRecord
{
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name'], 'unique'],
			[['name'], 'required'],
			[['name'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 *
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%userpermissions}}';
	}
}
