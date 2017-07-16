<?php 
$bloodGroups = array(
        '' => 'Select Blood Group',
        'A+' => 'A+',
        'A-' => 'A-',
        'B+' => 'B+',
        'B-' => 'B-',
        'O+' => 'O+',
        'O-' => 'O-',
        'AB+' => 'AB+',
        'AB-' => 'AB-',
);
echo form_open($form['action'], $form['attributes']);
?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $pageHeading;?></h3>
	</div>
	<div class="panel-body">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">First Name</label>
                <?php echo form_input(array('name' => 'firstName', 'class' => 'form-control', 'value' => $user->getFirstName()));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Last Name</label>
                <?php echo form_input(array('name' => 'lastName', 'class' => 'form-control', 'value' => $user->getLastName()));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Email</label>
                <?php echo form_input(array('name' => 'email', 'class' => 'form-control', 'value' => $user->getEmail()));?>
            </div>

            <div class="col-xs-6">
                <label class="control-label">Phone</label>
                <?php echo form_input(array('name' => 'phone', 'class' => 'form-control', 'value' => $user->getPhone()));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Birth Date</label>
                <?php
                    if ($user->getBirthDate() !== null) {
                        echo form_input(array('name' => 'birthDate', 'class' => 'datepicker form-control', 'value' => $user->getBirthDate()->format('Y-m-d')));
                    } else {
                        echo form_input(array('name' => 'birthDate', 'class' => 'datepicker form-control'));
                    }
                ?>
            </div>

            <div class="col-xs-6">
					<label class="control-label">Blood Group</label>
                <?php echo form_dropdown('bloodGroup', $bloodGroups, $user->getBloodGroup(), 'class="form-control"');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6">
                <label class="control-label">Country</label>
                <?php
                    if ($user->getCountry() !== null) {
                        echo form_dropdown('country', $countryDropdown, $user->getCountry()->getId(), 'class="form-control"');
                    } else {
                        echo form_dropdown('country', $countryDropdown, '', 'class="form-control"');
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
	<button type="submit" name="submitForm" class="btn btn-info">Save</button>
</div>
<?php echo form_close();?>