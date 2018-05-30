<?php
/**
 * Copyright 2015 David Persson. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_music\controllers;

use cms_music\models\Musicians;
use cms_music\models\RecordLabels;

class RecordsController extends \base_core\controllers\BaseController {

	use \base_core\controllers\AdminIndexTrait;
	use \base_core\controllers\AdminAddTrait;
	use \base_core\controllers\AdminEditTrait;
	use \base_core\controllers\AdminDeleteTrait;

	use \base_core\controllers\AdminPublishTrait;

	protected function _selects($item = null) {
		$musicians = Musicians::find('list');
		$recordLabels = RecordLabels::find('list');
		return compact('musicians', 'recordLabels');
	}
}

?>