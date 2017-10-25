<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $record->getGroupName(); ?> - View Details</h4>
</div>
<div class="modal-body">
    <table class="table table-striped" style="margin:none;">
        <tbody>
            <tr>
                <td style="width:20%;"><label><strong>Group Name</strong></label></td>
                <td style="width:2%;"><label><strong>:</strong></label></td>
                <td style="width:78%;"><?php echo $record->getGroupName(); ?></td>
            </tr>
            <tr>
                <td><label><strong>Alias Name</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getAlias(); ?></td>
            </tr>
            <tr>
                <td><label><strong>User Role</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getRole()->getRole(); ?></td>
            </tr>
            <tr>
                <td><label><strong>Description</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getDescription(); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<!-- /.modal-footer -->