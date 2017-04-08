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