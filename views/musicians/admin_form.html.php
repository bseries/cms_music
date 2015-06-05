<?php

use base_core\extensions\cms\Settings;
use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_music', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->name,
		'empty' => $t('unnamed'),
		'object' => $t('musician')
	],
	'meta' => [
		'is_published' => $item->is_published ? $t('published') : $t('unpublished')
	]
]);

?>
<article>
	<?=$this->form->create($item) ?>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('name', ['type' => 'text', 'label' => $t('Name'), 'class' => 'use-for-title']) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('url', [
					'type' => 'text',
					'label' => $t('Link'),
					'placeholder' => $t('https://foo.com/bar or /bar')]
				) ?>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<div class="media-attachment use-media-attachment-direct">
					<?= $this->form->label('MusicianLogoMediaId', $t('Logo')) ?>
					<?= $this->form->hidden('logo_media_id') ?>
					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
			</div>
			<div class="grid-column-right">
			</div>
		</div>

		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->editor->field('description', [
					'label' => $t('Description'),
					'size' => 'gamma',
					'features' => 'minimal'
				]) ?>
			</div>
			<div class="grid-column-right"></div>
		</div>

		<div class="bottom-actions">
			<?php if ($item->exists()): ?>
				<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_music'], ['class' => 'button large']) ?>
			<?php endif ?>
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'button large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>