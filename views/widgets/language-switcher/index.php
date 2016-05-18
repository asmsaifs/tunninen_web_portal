<div class="langnav">
   <ul class="langnav__list">
   <?php foreach($items as $item): ?>
       <li class="langnav__item">
       	<a class="langnav__link <?php if ($item['isCurrent']): ?>langnav__link--current<?php endif; ?>" href="<?php echo $item['href']; ?>">
       	<?php echo $item['language']['short_code']; ?></a>
       </li>
   <?php endforeach; ?>
   </ul>
</div>