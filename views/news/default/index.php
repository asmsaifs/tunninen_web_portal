
<?php foreach($model::find()->all() as $item): ?>
<pre>
<?php print_r($item->toArray()); ?>
</pre>
<p><a href="<?php echo $item->getDetailUrl(); ?>">News Detail Url</a></p>
<?php endforeach; ?>