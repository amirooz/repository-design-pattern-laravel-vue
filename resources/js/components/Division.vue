<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- card-header -->
                    <div class="card-header">
                      <h3 class="card-title">Division List</h3>

                      <div class="card-tools">
                        <button class="btn btn-success btn-sm" @click="createNew"> Add New </button>
                      </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- card-body -->
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
                                                    Division Name
                                                </th>
                                                <th class="sorting" style="width: 70px;">
                                                    Image
                                                </th>
                                                <th class="sorting" style="width: 120px;">
                                                    District List
                                                </th>
                                                <th class="sorting" style="width: 120px;">
                                                    Created
                                                </th>
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
                                                <td> {{ item.name | capitalize }} </td>
                                                <td v-if="item.image"> <img class="img-bordered-ssm" :src="getImage(item.image)" width="100%" height="25" alt="Division image" /> </td>
                                                <td v-else> <img class="img-bordered-ssm" src="/assets/img/img404.png" width="100%" height="25" alt="Division image" /> </td>
                                                <td><a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td> {{ item.created_at | myDate }} </td>
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

                    <!-- card-footer -->
                    <div class="card-footer">
                        <pagination :data="items" @pagination-change-page="pagination"></pagination>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNewModel" tabindex="-1" role="dialog" aria-labelledby="addNewModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="editMode" class="modal-title" id="addNewModelLabel">Update Division</h5>
                        <h5 v-show="!editMode" class="modal-title" id="addNewModelLabel">Add Division</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : create()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span>:</label>
                                <input v-model="form.name" type="text" name="name"
                                placeholder="Enter division name..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" @change="uploadImage"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('image') }" />
                                <has-error :form="form" field="image"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="sort_id">Sequence<span class="required">*</span>:</label>
                                <input v-model="form.sort_id" type="number" name="sort_id"
                                placeholder="Enter sort id..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('sort_id') }" />
                                <has-error :form="form" field="sort_id"></has-error>
                            </div>

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
                form: new Form({
                    id: '',
                    name: '',
                    image: '',
                    sort_id: ''
                })
            }
        },
        methods: {            

            loadData(){
                axios.get('api/division').then(({ data }) => (this.items = data ));
            },

            pagination(page = 1) {
                axios.get('api/division?page=' + page)
                .then(response => {
                    this.items = response.data;
                });
            },

            uploadImage(e){
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if(file['size'] < 2048000){
                    reader.onloadend = (file) => {
                        this.form.image = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Exceed the file size limit!',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            },

            getImage(img){
                return "assets/img/division/" + img;
            },

            createNew(){
                this.editMode = false;
                this.form.reset();
                $('#addNewModel').modal('show');                
            },

            create(){
                this.$Progress.start();
                this.form.post('api/division')
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
                .catch((data) => {
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
            },

            update() {
                this.$Progress.start();
                this.form.put('api/division/' + this.form.id)
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
                        axios.delete('api/division/' + id)
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
