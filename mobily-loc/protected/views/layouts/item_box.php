<li>
	<?php echo CHtml::link(CHtml::image('/files/images/'.$type.'s/' . $img, '', array('height' => '128px')), 
			Yii::app()->createUrl('product/'.$type, array('id' => $p_id)));
	?>
	<div class="padt-5">
		<?php
		echo CHtml::link($p_name, Yii::app()->createUrl('product/'.$type, array('id' => $p_id)), 
				array("class" => "text-neotec text-blue txt16"));
		?>
	</div>
	<br />
	<?php
	echo CHtml::link(Yii::t('strings', 'Buy Now'), Yii::app()->createUrl('product/'.$type, 
			array('id' => $p_id)), array("class" => "blue-btn text-white txt14 display-inline-block"));
	?>
</li>