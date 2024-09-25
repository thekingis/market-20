<?php

    if(isset($_POST['adminId'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include_once $home.'/inc/connect.php';
        include_once $home.'/inc/classes.php';
        include_once $home.'/inc/functions.php';

        $adminId = $_POST['adminId'];
        $adminInfo = new AdminInfo($con, $adminId);
        $adminRoles = explode(',', $adminInfo->roles);
        $isSuperAdmin = $adminInfo->isSuperAdmin;

        $roleList = array('0' => 'Super Admin');
        $roleQuery = mysqli_query($con, "SELECT * FROM `admin-roles`");
        while($roleSql = mysqli_fetch_array($roleQuery)){
            $roleid = $roleSql['id'];
            $roleList[$roleid] = $roleSql['role'];
        }

        $el = '';
        $arrayKeys = array_keys($roleList);
        foreach($arrayKeys as $index => $key){
            $role = $roleList[$key];
            $checked = $isSuperAdmin || in_array($key, $adminRoles) ? 'checked' : '';
            $el .= '<div class="form-check">';
            $el .= '<input class="form-check-input cursor-pointer" type="checkbox" value="'.$role.'" role-id="'.$key.'" id="checkBoxRole-'.$key.'" data-for="roles" '.$checked.' />';
            $el .= '<label class="form-check-label cursor-pointer" for="checkBoxRole-'.$key.'">'.$role.'</label>';
            $el .= '</div>';
        }
        echo $el;
        ?>
        <script>
            var $modalBox = $('div#editModal');
            var adminId = <?php echo $adminId; ?>;
            var adminName = <?php echo json_encode($adminInfo->fullName); ?>;
            var $superInput = $('input:checkbox[data-for=roles][role-id=0]');
            var $input = $('input:checkbox[data-for=roles]:not([role-id=0])');

            $modalBox.find('div.modal-header h5').text(adminName + ' Roles');
            $modalBox.find('button#actionBtn').off('click');

            $modalBox.find('button#actionBtn').click(function(evt){
                $this = $(this);
                var checkedNum = $('input:checkbox[data-for=roles]:checked').length;
                if(checkedNum == 0){
                    showToast('Please assign a role to this admin', 'alert-danger', 4000);
                    return;
                }
                var selectedRoles = new Array();
                $('input:checkbox[data-for=roles]:checked').each(function(){
                    var roleId = parseInt($(this).attr('role-id'));
                    selectedRoles.push(roleId);
                });
                var isSuperAdmin = selectedRoles.includes(0);
                var adminRoles = isSuperAdmin ? '0' : selectedRoles.join(',');
                $this.text('SAVING...');
                $modalBox.find('button').prop('disabled', true);
                var apiUrl = '/apis/actions.php';
                var formData = {
                    action: 'edit-role',
                    adminId: adminId,
                    roles: adminRoles
                };
                requesting = true;
                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    data: formData,
                    error: function(){
                        $this.text('SAVE');
                        $modalBox.modal('hide');
                        $modalBox.find('button').prop('disabled', false);
                        showToast('An error occured. Please try again', 'alert-danger', 4000);
                    },
                    success: function(){
                        $this.text('SAVE');
                        $modalBox.modal('hide');
                        $modalBox.find('button').prop('disabled', false);
                        showToast('Admin Roles Successfully Saved', 'alert-success', 4000);
                    }
                });
            });

            $superInput.click(function(){
                $input.prop('checked', true);
                $(this).prop('checked', true);
            });

            $input.click(function(evt){
                var checkedNum = $input.filter(':not(:checked)').length;
                if(checkedNum == 0)
                    $superInput.prop('checked', true);
                else
                    $superInput.prop('checked', false);
            });

        </script>
        <?php
    }

?>