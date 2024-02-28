<script>
    function addrole() {
            var roleId = document.getElementById('role_id').value;
            var roleName = document.getElementById('role_name').value;
            $.ajax({
            url:"{{ route('addRole') }}",
            method: 'POST', 
            data: {
                        role_id : roleId,
                        role_name: roleName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Role added successfully');
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
    }
    function showPermissionDiv()
    {

        $('.addPermission-div').css("display", "block");
    }
    function addPermission() 
    {
            var permissionId = document.getElementById('permission_id').value;
            var permissionName= document.getElementById('permission_name').value;
            var roleName = document.getElementById('permission_role_name').value;
            $.ajax({
            url:"{{ route('addPermission') }}",
            method: 'POST', 
            data: {
                        permission_id : permissionId,
                        permission_name:permissionName,
                        role_name: roleName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // console.log(response);
                        console.log(' Permission added successfully');
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
    }
    function getuserdetails(id)
    {   
        var user_id=id;
        $.ajax(
        {
                url:"{{route('getUserDetails')}}",
                method:"get",
                data:{
                    user_id: user_id,
                _token: '{{ csrf_token() }}'
                }
                
            ,
            success: function(response) 
            {
                showuserdetails(response);
            },
            error: function(error) 
            {
                console.log(error);
            }
        });
    }
    function showuserdetails(response) 
    {
            var userDetails = response;
            $('.details-div').css("display", "block");
            $('.details-div1').css("display", "block");
            $('.title_permission').text('Permissions Granted To :'+ userDetails.name);
            var userDetailsHtml = '';
            userDetailsHtml += '<tr>';
            userDetailsHtml += '<td>' + userDetails.image+ '</td>';
            userDetailsHtml += '<td>' + userDetails.userType+ '</td>'; 
            userDetailsHtml += '<td>' + userDetails.name + '</td>'; 
            userDetailsHtml += '<td>' + userDetails.email + '</td>';
            userDetailsHtml += '<td>' + userDetails.gender + '</td>'; 
            userDetailsHtml += '<td>' + userDetails.mobile + '</td>'; 
            userDetailsHtml += '<td>' + userDetails.dob+ '</td>'; 
            userDetailsHtml += '</tr>';
            $('#userdetails tbody').append(userDetailsHtml);
            $.ajax({
                url: "{{ route('getUserPermissions') }}",
                method: "GET",
                data: {
                    role_name: userDetails.userType,
                    _token: '{{ csrf_token() }}'
                },
                success: function(permissions) {
                    displayUserPermissions(permissions);
                },
                error: function(error) {
                    console.log(error);
            }
        });
    }
    function displayUserPermissions(permissions) {
        var permissionsHtml = '';
        permissions.forEach(permission => 
        {
            permissionsHtml += '<label><input type="checkbox" name="permissions[]" value="' + permission.permission_id + '"> ' + permission.permission_name + '</label><br>';
        });
        $('.details-div1').append(permissionsHtml);
    }
    function assigned_permission(permission_Id,role_id){
        console.log(permission_Id,role_id);
        $.ajax({
            url:"{{route('update_permissions')}}",
            method:'Post',
            data:{
                permission_Id,
                role_id,
                _token: '{{ csrf_token() }}'
            },
            success:function(response){
                window.location.reload();
            },
            error:function(error){
                console.log(error);
            }
        });
    }
//     function showPermissions() 
//     {
//         var selectedRole = document.getElementById("roleSelect").value;
//         var permissionsHtml = "";
//         if (selectedRole === "Admin") {
//             var selectedRolePermissions = @json($permissions->where('role_name','Admin')->pluck('permission_name'));
//             selectedRolePermissions.forEach((permission)=>{
//             permissionsHtml += "<label><input type='checkbox' value='" + permission_id + "'>" + permission_name + "</label><br>";
//         });
//         } else if (selectedRole === "User") {
//             var selectedRolePermissions = @json($permissions->where('role_name','user')->pluck('permission_name'));
//             permissionsHtml = "<label><input type='checkbox' value='" + permission_id + "'>" + permission_name + "</label><br>";
//         } else {
//             permissionsHtml = "No permissions available";
//         }
//     // Update the inner HTML of the show_permissions div
//     document.querySelector(".show_permissions").innerHTML = permissionsHtml;
// }

    </script>

