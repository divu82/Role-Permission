<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles</title>
    @include('manageRole-css')
</head>
<body>
    <header>
        <h1>Manage Roles & Permissions</h1>
    </header>
    <div class="container">
         {{-- Add role section --}}
         <div>
            <h2>Add More Role</h2>
            <div class="form-group">
                <input type="text" id="role_id" placeholder="Role ID">
            </div>
            <div class="form-group">
                <input type="text" id="role_name" placeholder="Role Name">
            </div>
            <button onclick="addrole()">ADD</button>
        </div>
        <hr>
        {{-- Available Permissions --}}
        <div>
            <h2>Permissions <button onclick="showPermissionDiv()">ADD Permissions</button></h2>
            {{-- show permission with checkbox to grant or revoke --}}
            @foreach($roles as $role)
            @php
                // Initialize assignedPermissionsIds array for each role
                $assignedPermissionsIds[$role->role_id] = App\Models\Permission_assigned::where('role_id', $role->role_id)->pluck('permission_id')->toArray();
            @endphp
            <div class="show_permissions"> 
                <div>
                    <ul>
                        <li style="font-size: 16px;font-weight:500;">⭕{{ $role->role_name }}
                            <ul>
                                @foreach($role->permissions as $permission)
                                    <li>
                                        <input type="checkbox" value="{{ $permission->permission_Id }}" onchange="assigned_permission('{{ $permission->permission_Id }}','{{ $role->role_id }}')" 
                                            @if(in_array($permission->permission_Id, $assignedPermissionsIds[$role->role_id])) checked @endif>

                                        <label for="{{ $permission->permission_Id }}">{{ $permission->permission_name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        {{-- Permissions table --}}
        <div>
            <h2>Assigned Permissions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Assigned Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->role_name }}</td>
                        <td>
                            @php
                                $assignedPermissions = App\Models\permissions::whereIn('id', $assignedPermissionsIds[$role->role_id])->pluck('permission_name')->toArray();
                            @endphp
                            @if (!empty($assignedPermissions))
                                {{ implode(', ', $assignedPermissions) }}
                            @else
                                No permissions assigned.
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Add permission div --}}
    <div class="addPermission-div">
        <div>
            <h1>ADD PERMISSIONS</h1>
        </div>
        <form action="{{route('addPermission')}}" method="POST">
            <div>
                Select Role:-
                <select name="role_id">
                    @foreach($roles as $role)
                    <option value={{$role->role_id}}>{{$role->role_name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label>Permission Name:-</label>
                <input type="text" name="permission_name" placeholder="Enter Permission Name">
            </div>
            <br>
            <div style="text-align: center">
                <button type='submit'>Save</button>
            </div>
        </form>
    </div>
    {{-- Footer of page --}}
    <footer>
        &copy; ShopMe.com
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @include('content_js')
</body>
</html>
