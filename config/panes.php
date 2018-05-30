<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_music\config;

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('cms.musicians', [
	'title' => $t('Musicians', ['scope' => 'cms_music']),
	'url' => ['controller' => 'musicians', 'action' => 'index', 'library' => 'cms_music', 'admin' => true],
	'weight' => 22
]);
Panes::register('cms.recordLabels', [
	'title' => $t('Record Labels', ['scope' => 'cms_music']),
	'url' => ['controller' => 'RecordLabels', 'action' => 'index', 'library' => 'cms_music', 'admin' => true],
	'weight' => 23
]);
Panes::register('cms.records', [
	'title' => $t('Records', ['scope' => 'cms_music']),
	'url' => ['controller' => 'records', 'action' => 'index', 'library' => 'cms_music', 'admin' => true],
	'weight' => 20
]);

?>