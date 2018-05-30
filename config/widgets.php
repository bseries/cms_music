<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
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