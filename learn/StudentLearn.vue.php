<?php
if (isset($ProfessorSay))
{
	?>
	<div>
		Professor : <?=$ProfessorSay?>
	</div>
	<div style="margin-top:15px;">
		Student say : The result is = <?=eval($ProfessorSay)?>
	</div>
	
	<div style="margin-left:40px; margin-top:30px;">
		<div style="float:left;">
			<form method="post" action="?page=ProfessorSay">
				<input type="hidden" name="ProfessorSay" value="<?=$ProfessorSay?>" />
				<input type="submit" value="Error :-s" />
			</form>
		</div>
		
		<div style="float:left; padding-left:15px;">
			<form method="post" action="?page=StudentWriteExperience">
				<input type="hidden" name="ProfessorSay" value="<?=$ProfessorSay?>" />
				<input type="submit" value="Correct :-)" />
			</form>

		</div>
	</div>
	
	<?php
}
?>