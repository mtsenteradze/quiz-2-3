<form method="post" action="notes.php">
    <fieldset>
        <legend>Add note</legend>
            <div>
                <textarea name="note" cols="12" rows="4"></textarea>
            </div>
    </fieldset>
<div>
    <button type="submit" name="save">Save</button>
</div>
<div class="table">
    <table  id="table">
        <tr>
            <th>Note</th>
            <th>ID</th>
            <th>Data</th>
            <th>Delete</th>
        </tr>
    </table>
</div>
