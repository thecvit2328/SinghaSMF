<div class="pagination pagination-centered">
	<ul>
		<li><a href="index.php?op=<?=$opURL?><?=$param_page;?>&p=1">หน้าแรก</a></li>
		<li><a href="index.php?op=<?=$opURL?><?=$param_page;?>&p=<?=$arrPage['previous'];?>">ย้อนกลับ</a></li>
		<?php 
			for($p=0; $p<count($arrPage['pages']); $p++){ 
			$activepages = ($arrPage['pages'][$p]==$arrPage['current']) ? "active" : ""; 
		?>
			<li class="<?=$activepages;?>"><a href="index.php?op=<?=$opURL?><?=$param_page;?>&p=<?=$arrPage['pages'][$p];?>"><?=$arrPage['pages'][$p];?></a></li>
		<? } ?>
		<li><a href="index.php?op=<?=$opURL?><?=$param_page;?>&p=<?=$arrPage['next'];?>">ต่อไป</a></li>
		<li><a href="index.php?op=<?=$opURL?><?=$param_page;?>&p=<?=$arrPage['last'];?>">หน้าสุดท้าย</a></li>
	</ul>
</div>


