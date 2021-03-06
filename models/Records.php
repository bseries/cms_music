<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_music\models;

use cms_music\models\RecordLabelsRecords;
use lithium\aop\Filters;
use lithium\g11n\Message;

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
		$model = static::object();
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

Filters::apply(Records::class, 'save', function($params, $next) {
	$labels = [];

	if (isset($params['data']['record_labels'])) {
		$labels = $params['data']['record_labels'];
		unset($params['data']['record_labels']);
	}

	if (!$result = $next($params)) {
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

Filters::apply(Records::class, 'delete', function($params, $next) {
	RecordLabelsRecords::remove([
		'record_id' => $params['entity']->id
	]);
	return $next($params);
});

?>
