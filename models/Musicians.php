<?php
/**
 * CMS Music
 *
 * Copyright (c) 2015 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see https://atelierdisko.de/licenses.
 */

namespace cms_music\models;

use lithium\g11n\Message;

class Musicians extends \base_core\models\Base {

	public $belongsTo = [
		'CoverMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'logo_media_id'
		]
	];

	public $hasMany = [
		'Records' => [
			'to' => 'cms_music\models\Records',
			'key' => 'musician_id'
		]
	];

	protected $_actsAs = [
		'base_core\extensions\data\behavior\Sluggable',
		'base_core\extensions\data\behavior\RelationsPlus',
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'logo' => [
					'type' => 'direct',
					'to' => 'logo_media_id'
				]
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'name'
			]
		]
	];

	public static function init() {
		$model = static::_object();
		extract(Message::aliases());

		$model->validates['name'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('This field cannot be left blank.', ['scope' => 'cms_music'])
			]
		];
	}
}

Musicians::init();

?>