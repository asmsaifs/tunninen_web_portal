<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?= $placeholders['content']; ?>							
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
				<!--<div class="widget">
					<form class="form-search">
						<input class="form-control" type="text" placeholder="Search..">
					</form>
				</div>-->
                <div class="widget">
                	<h4 class="widgetheading">About Us</h5>
                    <p>Companies comprehensive ICT service solutions for cyber security software solutions. Coordinated systems save costs and make it easier to tiedonsaantia- and distribution. Check out our services, and to extract the best solutions. As a small and agile player will serve excellently. We would like to help, <a href="contact"> please contact us!</a></p>
				</div>
                <div class="widget">
					<h4 class="widgetheading">Latest news</h5>
					<ul class="recent">
                                            <?php foreach(\newsadmin\models\Article::find()->all() as $item): ?>
                                            <?php
                                                //$detail_url = \luya\helpers\Url::toManager('/news/default/detail', ['id' => $item->id, 'title' => \yii\helpers\Inflector::slug($item->title)]);
                                                $detail_url = \Yii::$app->request->BaseUrl.'/news/'.$item->id.'/'.\yii\helpers\Inflector::slug($item->title);
                                                //list($output)=explode(" ",wordwrap(strip_tags($item->text),50),1);
                                                $limit = 200;
            
                                                //if(strlen($item->text) < $limit) {return $item->text;}

                                                $regex = "/(.{1,$limit})\b/";
                                                preg_match($regex, $item->text, $matches);                                                
                                                $output = $matches[1];
                                                //$output = preg_replace('/\s+?(\S+)?$/', '', substr($item->text, 0, 201));
                                            ?>
                                            <li>
                                            <img src="<?=Yii::$app->storage->getImage($item->image_id)->source;?>" width="80" class="pull-left" alt="" />
                                            <h6><a href="<?php echo $detail_url; ?>"><?=$item->title?></a></h6>
                                            <p><?=$output;?></p>
                                            </li>												
                                            <?php endforeach; ?>												
					</ul>
				</div>
				<!--<div class="widget">
					<h5 class="widgetheading">Popular tags</h5>
					<ul class="tags">
						<li><a href="#">Web design</a></li>
						<li><a href="#">Trends</a></li>
						<li><a href="#">Technology</a></li>
						<li><a href="#">Internet</a></li>
						<li><a href="#">Tutorial</a></li>
						<li><a href="#">Development</a></li>
					</ul>
				</div>-->
				</aside>
			</div>
		</div>
	</div>
	</section>