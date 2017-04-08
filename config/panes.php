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