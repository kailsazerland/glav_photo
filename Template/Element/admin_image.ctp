<?if (!empty($entity->{$field})):?>
	<a href="/<?=$entity->{$field}?>" target="_blank"><img src="/<?=$entity->{$field}?>" height="100"></a>
	<a href="/admin/delete_image/<?=$model?>/<?=$field?>/<?=$entity->id?>/" title="удалить"><i class="glyphicon glyphicon-trash text-danger"></i></a>
<?endif;?>
<?=$this->Form->file($field, ['class' => '', "autocomplete" => 'off'])?>