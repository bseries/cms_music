<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_music\models;

class RecordLabelsRecords extends \base_core\models\Base {

	public $belongsTo = [
		'RecordLabel' => [
			'to' => 'cms_music\models\RecordLabels',
			'key' => 'record_label_id'
		],
		'Records' => [
			'to' => 'cms_music\models\Records',
			'key' => 'record_id'
		]
	];

	protected $_actsAs = [
		'base_core\extensions\data\behavior\RelationsPlus'
	];
}

?>