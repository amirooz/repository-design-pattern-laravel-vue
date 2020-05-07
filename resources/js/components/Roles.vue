<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Role Management</h3>

                      <div class="card-tools">
                        <button class="btn btn-success btn-sm" @click="createNew"> Add New </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" style="width: 70px;">
                                                    ID
                                                </th>
                                                <th class="sorting" style="width: 200px;">
                                                    Role Name
                                                </th>
                                                <th class="sorting" style="width: 120px;">
                                                    Guard Name
                                                </th>
                                                <!-- <th class="sorting" style="width: 120px;">
                                                    Created
                                                </th> -->
                                                <th class="sorting" style="width: 120px;">
                                                    Updated
                                                </th>
                                                <th class="sorting" style="width: 100px;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in items.data" :key="item.id">
                                                <td class="sorting_1"> {{ item.id }} </td>
                                                <td> {{ item.name }} </td>
                                                <td> {{ item.guard_name }} </td>
                                                <!-- <td> {{ item.created_at | myDate }} </td> -->
                                                <td> {{ item.updated_at | myDate }} </td>
                                                <td>
                                                    <a href="#">
                                                        <i class="fas fa-eye green"></i>
                                                    </a>
                                                    |
                                                    <a href="#" @click="updateData(item)">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    |
                                                    <a href="#" @click.prevent="deleteData(item.id)" >
                                                        <i class="fas fa-trash-alt red"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNewModel" tabindex="-1" role="dialog" aria-labelledby="addNewModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="editMode" class="modal-title" id="addNewModelLabel">Update Role</h5>
                        <h5 v-show="!editMode" class="modal-title" id="addNewModelLabel">Add Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : create()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span>:</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                placeholder="Enter role name..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="guard_name">Gurad Name<span class="required">*</span>:</label>
                                <input v-model="form.guard_name" type="text" name="guard_name" id="guard_name"
                                placeholder="Enter guard name..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('guard_name') }" />
                                <has-error :form="form" field="guard_name"></has-error>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="permission">Permission<span class="required">*</span></label>
                                </div>
                                <div v-for="(permission,index) in permissions" class="col-sm-6 col-md-3" :key="index">
                                    <div class="form-check">
                                        <input class="form-check-input" v-model="form.permission" type="checkbox" v-bind:value="index" @change="setPermission(index)" />
                                        {{permission}}
                                    </div>
                                </div>                                        
                            </div>
                            {{form.permission}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-success btn-sm">Update</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary btn-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                editMode: false,
                items: {},
                permissions: [],
                form: new Form({
                    id: '',
                    name: '',
                    guard_name: '',
                    permission: [],
                })
            }
        },
        methods: {            

            loadData(){
                axios.get('api/roles').then(({ data }) => (
                    this.items = data[0],
                    this.permissions = data[1],
                    console.log(this.permissions)
                    
                    
                ));
            },

            createNew(){
                this.editMode = false;
                this.form.reset();
                $('#addNewModel').modal('show');                
            },

            setPermission(item){
                console.log(item);
                
                if(this.form.permission.includes(item)){
                    this.form.permission.pop(item);
                }
                
                this.form.permission.push(item);
                console.log(this.form.permission);                
            },

            create(){
                console.log(this.form);
                
                this.$Progress.start();
                this.form.post('api/roles')
                .then(() => {
                    Fire.$emit('reloadData');
                    $('#addNewModel').modal('hide');

                    // this.loadData();

                    Toast.fire({
                      icon: 'success',
                      title: 'Created in successfully'
                    });

                    this.$Progress.finish();
                })
                .catch(() => {
                    Swal.fire({
                      title: 'Error!',
                      text: 'Do you want to continue',
                      icon: 'error',
                      confirmButtonText: 'Ok'
                    });
                        
                    this.$Progress.fail();
                })

            },

            updateData(data){
                this.editMode = true;
                this.form.reset();
                $('#addNewModel').modal('show');
                this.form.fill(data);
                this.form.permission = data.permission.split(',');            
            },

            update() {
                this.$Progress.start();
                this.form.put('api/roles/' + this.form.id)
                .then(() => {
                    $('#addNewModel').modal('hide');
                    Fire.$emit('reloadData');
                    Toast.fire({
                      icon: 'success',
                      title: 'Updated in successfully'
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                })
            },

            deleteData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('api/role/' + id)
                        .then(() => {
                            Fire.$emit('reloadData');
                            Swal.fire( 'Deleted!', 'The record has been deleted.', 'success')
                        })
                        .catch(() => {
                            Swal.fire('Failed!', 'There was an error!', 'Warning' )
                        })
                    }
                })
            }
            
        },        

        created() {
            this.loadData();
            Fire.$on('reloadData', () => this.loadData());
            // setInterval(() => this.loadData(), 3000);
        }
        
    }
</script>
