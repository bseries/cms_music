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

namespace cms_music\config;

use base_media\models\Media;

Media::registerDependent('cms_music\models\Musicians', ['logo' => 'direct']);
Media::registerDependent('cms_music\models\RecordLabels', ['logo' => 'direct']);
Media::registerDependent('cms_music\models\Records', ['cover' => 'direct', 'media' => 'joined']);

?>