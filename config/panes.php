<?php
/**
 * CMS Music
 *
 * Copyright (c) 2015 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('authoring.musicians', [
	'title' => $t('Musicians', ['scope' => 'cms_music']),
	'url' => ['controller' => 'musicians', 'action' => 'index', 'library' => 'cms_music', 'admin' => true],
	'weight' => 40
]);
Panes::register('authoring.musicArtists', [
	'title' => $t('Records', ['scope' => 'cms_music']),
	'url' => ['controller' => 'records', 'action' => 'index', 'library' => 'cms_music', 'admin' => true],
	'weight' => 40
]);

?>