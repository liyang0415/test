<header><h2>编辑</h2></header>
<form action="testfactorEdit" method="post" enctype="multipart/form-data">
量表名称
 	<input type="text" name="scaleName" style="width:100px;" value="<?php echo $testfactorinfo['scale_name'] ?>">

	分类<select name="parentFactor">
		<?php if($testfactorinfo['parentname']){ ?>
		<option value='<?php echo $testfactorinfo['ID'] ?>' ><?php echo $testfactorinfo['parentname'] ?></option>
		<?php } ?>
			<?php foreach($testfactor as $key=>$value): ?>
	                        <optgroup  label="<?=$key?>"></optgroup>
	                            <?php foreach($value as $val): ?>
	                                <option value='<?=$val['ID']?>' >&nbsp;&nbsp;&nbsp;&nbsp;<?=getTestFactorName($val['FACTORNAME'])?></option>
	                                <?php if(isset($val['children'])): ?>
	                                    <?php foreach($val['children'] as $v): ?>
	                                        <option value='<?=$v['ID']?>' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$v['FACTORNAME']?></option>
	                                    <?php endforeach; ?>
	                                <?php endif; ?>
	                            <?php endforeach; ?>
	                    <?php endforeach; ?>
	</select>
	分类名称<input type="text" name="factorName" style="width:100px" value="<?php echo $testfactorinfo['FACTORNAME'] ?>">
	按钮<input type="submit" name="sub" value="修改" class="" style="width:100px;background-color:rgb(60,166,205);color:white">
</form>