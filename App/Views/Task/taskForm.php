<h4>Add New Task Form</h4>
<form action="/task/add-task" method="post">
	<fieldset>
		<legend>add new task form</legend>
		№:&nbsp&nbsp&nbsp&nbsp<input type="number" name=":n" style="width:90px" required> <br>
		Task:&nbsp<textarea name=":task"  rows="3"  cols="60" required></textarea> <br>
		Date:&nbsp<input type="date" name=":date">
		Status:&nbsp<select name=":status">
			<option value="Open">Open</option>
			<option value="Cancelled">Cancelled</option>
			<option value="Postponed">Postponed</option>
			<option value="Completed">Completed</option>
		</select> <br><br>
		&nbsp<input type="submit" name="submit" value="Save" id="save">
		&nbsp<input type="submit" name="submit" value="Preview" id="preview">
	</fieldset>
</form>

