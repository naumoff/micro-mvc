<h4>My Task List</h4>
<table border="1">
<?php if(is_array($datas) && count($datas)>0){ ?>
	<?php foreach ($datas AS $key=>$value){ ?>
		<tr>
		<?php if($key == 0) {?>
			<?php foreach ($value AS $column => $data) { ?>
				<th><?= $column ?></th>
			<?php } ?>
		<?php } ?>
		</tr>
		<tr>
			<?php foreach ($value AS $data){?>
				<td> <?= $data ?></td>
			<?php } ?>
		</tr>
	<?php } ?>
<?php } ?>
</table>
<div id="addTask"></div>
<br>
<button id="showForm">Add New Task</button>
<button id="cancellTask">Cancell</button>
<script>
	$(document).ready(function(){
		$('#cancellTask').hide();
		
		$('#showForm').on('click',function () {
			$("#addTask").load('/task/add-form');
			$("#addTask").show();
			$("#showForm").hide();
			$('#cancellTask').show();
			
		});
		$('#cancellTask').on('click',function(){
			$('#addTask').hide();
			$('#cancellTask').hide();
			$('#showForm').show();
		});
	});
</script>