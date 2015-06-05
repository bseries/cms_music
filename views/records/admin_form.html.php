<?php

use base_core\extensions\cms\Settings;
use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_music', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->title,
		'empty' => $t('untitled'),
		'object' => $t('record')
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
				<?= $this->form->field('musician_id', [
					'type' => 'select',
					'label' => $t('Musician'),
					'list' => $musicians
				]) ?>
				<?= $this->form->field('title', ['type' => 'text', 'label' => $t('Title'), 'class' => 'use-for-title']) ?>
			</div>
			<div class="grid-column-right">
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('published', [
					'type' => 'date',
					'label' => $t('Publish date'),
					'value' => $item->published ?: date('Y-m-d')
				]) ?>
				<?= $this->form->field('formats', [
					'type' => 'text',
					'label' => $t('Format/s'),
					'value' => $item->formats(['serialized' => true]) ?: 'CD'
				]) ?>
				<div class="help"><?= $t('Separate multiple formats with commas.') ?></div>
				<?php
				$recordLabelsValue = [];
				foreach ($item->recordLabels() as $label) {
					$recordLabelsValue[] = $label->record_label_id;
				}
				?>
				<?= $this->form->field('record_labels', [
					'type' => 'select',
					'multiple' => true,
					'label' => $t('Labels'),
					'value' => $recordLabelsValue,
					'list' => $recordLabels
				]) ?>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<div class="media-attachment use-media-attachment-direct">
					<?= $this->form->label('RecordsCoverMediaId', $t('Cover')) ?>
					<?= $this->form->hidden('cover_media_id') ?>
					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
			</div>
			<div class="grid-column-right">
				<div class="media-attachment use-media-attachment-joined">
					<?= $this->form->label('RecordsMedia', $t('Media')) ?>
					<?php foreach ($item->media() as $media): ?>
						<?= $this->form->hidden('media.' . $media->id . '.id', ['value' => $media->id]) ?>
					<?php endforeach ?>

					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
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

		<div class="grid-row">
			<?= $this->editor->field('tracklist', [
				'label' => $t('Tracklist'),
				'size' => 'beta',
				'features' => ['basic', 'list']
			]) ?>
		</div>

		<div class="bottom-actions">
			<?php if ($item->exists()): ?>
				<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_music'], ['class' => 'button large']) ?>
			<?php endif ?>
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'button large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>