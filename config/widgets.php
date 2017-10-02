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

namespace cms_music\config;

use base_core\extensions\cms\Widgets;
use cms_music\models\Musicians;
use cms_music\models\RecordLabels;
use cms_music\models\Records;
use lithium\g11n\Message;

extract(Message::aliases());

Widgets::register('authoring',  function() use ($t) {
	return [
		'data' => [
			$t('Musicians', ['scope' => 'cms_music']) => Musicians::find('count'),
			$t('Record Labels', ['scope' => 'cms_music']) => RecordLabels::find('count'),
			$t('Records', ['scope' => 'cms_music']) => Records::find('count')
		]
	];
}, [
	'type' => Widgets::TYPE_TABLE,
	'group' => Widgets::GROUP_DASHBOARD,
	'weight' => Widgets::WEIGHT_HIGH
]);

?>