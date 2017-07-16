<div class="modal-header bg-primary no-border">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $record->getFirstName().' '.$record->getLastName();?> - View Details</h4>
</div>
<div class="modal-body">
    <table class="table table-striped" style="margin:none;">
        <tbody>
            <tr>
                <td style="width:20%;"><label><strong>First Name</strong></label></td>
                <td style="width:2%;"><label><strong>:</strong></label></td>
                <td style="width:78%;"><?php echo $record->getFirstName();?></td>
            </tr>
            <tr>
                <td><label><strong>Last Name</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getLastName();?></td>
            </tr>
            <tr>
                <td><label><strong>Email</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getEmail();?></td>
            </tr>
            <tr>
                <td><label><strong>User Role</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getUserGroup()->getRole()->getRole();?></td>
            </tr>
            <tr>
                <td><label><strong>User Group</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getUserGroup()->getGroupName();?></td>
            </tr>
            <tr>
                <td><label><strong>Gender</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td>
                    <?php 
                        if ($record->getGender() !== null) {
                            if ($record->getGender() == 'M') {
                                echo 'Male';
                            } else {
                                echo 'Female';
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label><strong>Phone</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td><?php echo $record->getPhone();?></td>
            </tr>
            <tr>
                <td><label><strong>Birth Date</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td>
                    <?php 
                        if ($record->getBirthDate() !== null) {
                            echo $record->getBirthDate()->format('d M, Y');
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label><strong>Country</strong></label></td>
                <td><label><strong>:</strong></label></td>
                <td>
                    <?php 
                        if ($record->getCountry() !== null) {
                            echo $record->getCountry()->getCountryName();
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
<!-- /.modal-footer -->