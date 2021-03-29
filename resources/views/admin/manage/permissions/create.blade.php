@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Permission</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('permissionsStore')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="permission_type" value="basic" v-model="permission_type">Basic Permission
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="permission_type" value="crud" v-model="permission_type">CRUD Permissions
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="permission_type == 'basic'">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_name">Name (Display Name)</label>
                            <input type="text" class="form-control" name="display_name" id="display_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                </div>

                <div class="row" v-if="permission_type == 'crud'">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="resource">Resource</label>
                            <input type="text" class="form-control" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
                        </div>
                    </div>
                </div>

                <div class="row" v-if="permission_type == 'crud'">
                    <div class="col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="crudSelected" v-model="crudSelected" value="create">Create
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="crudSelected" v-model="crudSelected" value="read">Read
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="crudSelected" v-model="crudSelected" value="update">Update
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="crudSelected" v-model="crudSelected" value="delete">Delete
                            </label>
                        </div>
                        <input type="hidden" name="crud_selected" :value="crudSelected">
                    </div>
                </div>

                <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in crudSelected" :key="index">
                            <td v-text="crudName(item)"></td>
                            <td v-text="crudSlug(item)"></td>
                            <td v-text="crudDescription(item)"></td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <button class="btn btn-success">Create Permission</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permission_type: 'basic',
                crudSelected: ['create', 'read', 'update', 'delete'],
                resource: ''
            },
            methods: {
                crudName: function(item){
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1)
                },
                crudSlug: function(item){
                    return item.toLowerCase() + "-" + app.resource.toLowerCase()
                },
                crudDescription: function(item){
                    return "Allow a user to " + item.toUpperCase() + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1)
                }
            }
        });
    </script>
@endsection