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
use cms_music\models\RecordLabelsRecords;

// Fields roughly follow:
// http://help.mp3tag.de/main_tags.html
class Records extends \base_core\models\Base {

	public $belongsTo = [
		'CoverMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'cover_media_id'
		],
		'Musician' => [
			'to' => 'cms_music\models\Musicians',
			'key' => 'musician_id'
		]
	];

	public $hasMany = [
		'RecordLabels' => [
			'to' => 'cms_music\models\RecordLabelsRecords',
			'key' => 'record_id'
		]
	];

	protected $_actsAs = [
		'base_core\extensions\data\behavior\Sluggable',
		'base_core\extensions\data\behavior\RelationsPlus',
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				],
				'media' => [
					'type' => 'joined',
					'to' => 'base_media\models\MediaAttachments'
				],
				'bodyMedia' => [
					'type' => 'inline',
					'to' => 'body'
				]
			]
		],
		'base_core\extensions\data\behavior\Serializable' => [
			'fields' => [
				'formats' => ','
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'title',
				'formats',
				'published'
			]
		]
	];

	public static function init() {
		$model = static::_object();
		extract(Message::aliases());

		$model->validates['title'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('This field cannot be empty.', ['scope' => 'cms_music'])
			]
		];
	}
}

Records::init();

Records::applyFilter('save', function($self, $params, $chain) {
	$labels = [];

	if (isset($params['data']['record_labels'])) {
		$labels = $params['data']['record_labels'];
		unset($params['data']['record_labels']);
	}

	if (!$result = $chain->next($self, $params, $chain)) {
		return false;
	}

	if ($labels) {
		if ($params['entity']->exists()) {
			RecordLabelsRecords::remove([
				'record_id' => $params['entity']->id
			]);
		}
		foreach ($labels as $id) {
			RecordLabelsRecords::create([
				'record_id' => $params['entity']->id,
				'record_label_id' => $id
			])->save();
		}
	}

	return $result;
});

Records::applyFilter('delete', function($self, $params, $chain) {
	RecordLabelsRecords::remove([
		'record_id' => $params['entity']->id
	]);
	return $chain->next($self, $params, $chain);
});

?>