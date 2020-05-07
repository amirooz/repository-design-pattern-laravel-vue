<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">District List</h3>

                      <div class="card-tools">
                        <button class="btn btn-success btn-sm" @click="createNew"> Add New </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 content-overflow">
                                    <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" style="width: 70px;">
                                                    ID
                                                </th>
                                                <th class="sorting" style="width: 180px;">
                                                    District Name
                                                </th>
                                                <th class="sorting" style="width: 120px;">
                                                    Division
                                                </th>
                                                <th class="sorting" style="width: 80px;">
                                                    Image
                                                </th>
                                                <th class="sorting" style="width: 80px;">
                                                    Council
                                                </th>
                                                <th class="sorting" style="width: 80px;">
                                                    Executive
                                                </th>
                                                <th class="sorting" style="width: 120px;">
                                                    Upazilla List
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
                                                <td> {{ item.name }} </td>
                                                <td> {{ divisions[item.division_id] }} </td>
                                                <td v-if="item.image"> <img class="img-bordered-ssm" :src="getImage(item.image)" width="100%" height="25" alt="District image" /> </td>
                                                <td v-else> <img class="img-bordered-ssm" src="/assets/img/img404.png" width="100%" height="25" alt="District image" /> </td>
                                                <td> <a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td> <a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td><a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td> {{ item.updated_at | myDate }} </td>
                                                <td>
                                                    <a href="#" @click="showData(item.id)">
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

        <!-- Create/Edit Modal -->
        <div class="modal fade" id="addNewModel" tabindex="-1" role="dialog" aria-labelledby="addNewModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="editMode" class="modal-title" id="addNewModelLabel">Update District</h5>
                        <h5 v-show="!editMode" class="modal-title" id="addNewModelLabel">Add District</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : create()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span>:</label>
                                <input v-autofocus v-model="form.name" type="text" name="name" id="name"
                                placeholder="Enter district name..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="division_id">Division<span class="required">*</span>:</label>
                                <select v-model="form.division_id" name="division_id" id="division_id"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('division_id') }" >
                                    <option value="">Select Division</option>
                                    <option v-for="(division, index) in divisions" :value="index" :key="index"> {{ division }} </option>
                                </select>
                                <has-error :form="form" field="division_id"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" id="image" @change="uploadImage"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('image') }" />
                                <has-error :form="form" field="image"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="sort_id">Sequence:</label>
                                <input v-model="form.sort_id" type="number" name="sort_id" id="sort_id"
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

        <!-- Show Modal -->
        <div class="modal fade" id="districtDetails" tabindex="-1" role="dialog" aria-labelledby="districtDetails" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="districtDetailsModelLabel">  District: {{districtDetails.district_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">

                            <ul class="nav nav-tabs nav-fill mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="executive-tab" data-toggle="tab" href="#executive" role="tab" aria-controls="executive" aria-selected="true">Executive</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="council-tab" data-toggle="tab" href="#council" role="tab" aria-controls="council" aria-selected="true">Council </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="upazilla-tab" data-toggle="tab" href="#upazilla" role="tab" aria-controls="upazilla" aria-selected="false">Upazilla</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pourashava-tab" data-toggle="tab" href="#pourashava" role="tab" aria-controls="pourashava" aria-selected="false">Pourashava</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="row justify-content-md-center">
                                        <div class="col-5">
                                            <div v-if="districtDetails.district_image" class="map"><img :src="getImage(districtDetails.district_image)" width="100%" height="400" alt="District image" ></div>
                                            <div v-else class="map"><img src="assets/img/dhaka-map.png" height="400" alt=""></div>
                                        </div>
                                        <div class="col-5">
                                            <div class="district-info mt-30">
                                                <h2>{{districtDetails.district_name}}</h2>
                                                <table width="400">
                                                    <tr>
                                                        <td>Area:</td>
                                                        <td> 15000 Sq. Mt.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Population:</td>
                                                        <td>3,00,000,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Density:</td>
                                                        <td>1500000 / Km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Eduction Rate:</td>
                                                        <td>80%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Seat:</td>
                                                        <td>20</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Main opposition:</td>
                                                        <td>Awamileague</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="executive" role="tabpanel" aria-labelledby="executive-tab">
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-mainstream-tab" data-toggle="pill" href="#v-pills-mainstream" role="tab" aria-controls="v-pills-mainstream" aria-selected="true">Mainstream</a>
                                                <a class="nav-link" id="v-pills-jubo-ex-tab" data-toggle="pill" href="#v-pills-jubo-ex" role="tab" aria-controls="v-pills-jubo-ex" aria-selected="true">Jubo</a>
                                                <a class="nav-link" id="v-pills-chhatra-ex-tab" data-toggle="pill" href="#v-pills-chhatra-ex" role="tab" aria-controls="v-pills-chhatra-ex" aria-selected="false">Chhatra</a>
                                                <a class="nav-link" id="v-pills-sramik-ex-tab" data-toggle="pill" href="#v-pills-sramik-ex" role="tab" aria-controls="v-pills-sramik-ex" aria-selected="false">Sramik</a>
                                                <a class="nav-link" id="v-pills-mohila-ex-tab" data-toggle="pill" href="#v-pills-mohila-ex" role="tab" aria-controls="v-pills-mohila-ex" aria-selected="false">Mohila</a>
                                                <a class="nav-link" id="v-pills-sss-ex-tab" data-toggle="pill" href="#v-pills-sss-ex" role="tab" aria-controls="v-pills-sss" aria-selected="true">Samajik Sangskritik Sangstha</a>
                                                <a class="nav-link" id="v-pills-krishak-ex-tab" data-toggle="pill" href="#v-pills-krishak-ex" role="tab" aria-controls="v-pills-krishak-ex" aria-selected="false">Krishak</a>
                                                <a class="nav-link" id="v-pills-sechchasebak-ex-tab" data-toggle="pill" href="#v-pills-sechchasebak-ex" role="tab" aria-controls="v-pills-sechchasebak-ex" aria-selected="false">Sechchasebak</a>
                                                <a class="nav-link" id="v-pills-muktijoddha-ex-tab" data-toggle="pill" href="#v-pills-muktijoddha-ex" role="tab" aria-controls="v-pills-muktijoddha-ex" aria-selected="false">Muktijoddha</a>
                                                <a class="nav-link" id="v-pills-matshayajibi-ex-tab" data-toggle="pill" href="#v-pills-matshayajibi-ex" role="tab" aria-controls="v-pills-matshayajibi-ex" aria-selected="false">Matshayajibi</a>
                                                <a class="nav-link" id="v-pills-tanti-ex-tab" data-toggle="pill" href="#v-pills-tanti-ex" role="tab" aria-controls="v-pills-tanti-ex" aria-selected="false">Tanti</a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active content-overflow" id="v-pills-mainstream" role="tabpanel" aria-labelledby="v-pills-mainstream-tab">
                                                    <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" style="width: 200px;">
                                                                    Name
                                                                </th>
                                                                <!-- <th class="sorting" style="width: 50px;">
                                                                    Image
                                                                </th> -->
                                                                <th class="sorting" style="width: 300px;">
                                                                    Member Type
                                                                </th>
                                                                <th class="sorting" style="width: 150px;">
                                                                    Designation
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr v-for="(item, index) in districtDetails" :key="index">
                                                                <td>{{item.member_name}}</td>
                                                                <td>{{item.type}}</td>
                                                                <td>{{item.designation}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-jubo-ex" role="tabpanel" aria-labelledby="v-pills-chhatra-ex-tab">jubo</div>
                                                <div class="tab-pane fade" id="v-pills-chhatra-ex" role="tabpanel" aria-labelledby="v-pills-chhatra-ex-tab">chhatra</div>
                                                <div class="tab-pane fade" id="v-pills-sramik-ex" role="tabpanel" aria-labelledby="v-pills-sramik-ex-tab">sramik</div>
                                                <div class="tab-pane fade" id="v-pills-mohila-ex" role="tabpanel" aria-labelledby="v-pills-mohila-ex-tab">mohila</div>
                                                <div class="tab-pane fade" id="v-pills-sss-ex" role="tabpanel" aria-labelledby="v-pills-sss-ex-tab">Samajik Sangskritik Sangstha</div>
                                                <div class="tab-pane fade" id="v-pills-krishak-ex" role="tabpanel" aria-labelledby="v-pills-krishak-ex-tab">krishak</div>
                                                <div class="tab-pane fade" id="v-pills-sechchasebak-ex" role="tabpanel" aria-labelledby="v-pills-sechchasebak-ex-tab">sechchasebak</div>
                                                <div class="tab-pane fade" id="v-pills-muktijoddha-ex" role="tabpanel" aria-labelledby="v-pills-muktijoddha-ex-tab">muktijoddha</div>
                                                <div class="tab-pane fade" id="v-pills-matshayajibi-ex" role="tabpanel" aria-labelledby="v-pills-matshayajibi-ex-tab">Matshayajibi</div>
                                                <div class="tab-pane fade" id="v-pills-tanti-ex" role="tabpanel" aria-labelledby="v-pills-tanti-ex-tab">tanti</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="council" role="tabpanel" aria-labelledby="council-tab">
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-jubo-cl-tab" data-toggle="pill" href="#v-pills-jubo-cl" role="tab" aria-controls="v-pills-jubo-cl" aria-selected="true">Jubo</a>
                                                <a class="nav-link" id="v-pills-chhatra-cl-tab" data-toggle="pill" href="#v-pills-chhatra-cl" role="tab" aria-controls="v-pills-chhatra-cl" aria-selected="false">Chhatra</a>
                                                <a class="nav-link" id="v-pills-sramik-cl-tab" data-toggle="pill" href="#v-pills-sramik-cl" role="tab" aria-controls="v-pills-sramik-cl" aria-selected="false">Sramik</a>
                                                <a class="nav-link" id="v-pills-mohila-cl-tab" data-toggle="pill" href="#v-pills-mohila-cl" role="tab" aria-controls="v-pills-mohila-cl" aria-selected="false">Mohila</a>
                                                <a class="nav-link" id="v-pills-sss-cl-tab" data-toggle="pill" href="#v-pills-sss-cl" role="tab" aria-controls="v-pills-sss-cl" aria-selected="true">Samajik Sangskritik Sangstha</a>
                                                <a class="nav-link" id="v-pills-krishak-cl-tab" data-toggle="pill" href="#v-pills-krishak-cl" role="tab" aria-controls="v-pills-krishak-cl" aria-selected="false">Krishak</a>
                                                <a class="nav-link" id="v-pills-sechchasebak-cl-tab" data-toggle="pill" href="#v-pills-sechchasebak-cl" role="tab" aria-controls="v-pills-sechchasebak-cl" aria-selected="false">Sechchasebak</a>
                                                <a class="nav-link" id="v-pills-muktijoddha-cl-tab" data-toggle="pill" href="#v-pills-muktijoddha-cl" role="tab" aria-controls="v-pills-muktijoddha-cl" aria-selected="false">Muktijoddha</a>
                                                <a class="nav-link" id="v-pills-matshayajibi-cl-tab" data-toggle="pill" href="#v-pills-matshayajibi-cl" role="tab" aria-controls="v-pills-matshayajibi-cl" aria-selected="false">Matshayajibi</a>
                                                <a class="nav-link" id="v-pills-tanti-cl-tab" data-toggle="pill" href="#v-pills-tanti-cl" role="tab" aria-controls="v-pills-tanti-cl" aria-selected="false">Tanti</a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-jubo-cl" role="tabpanel" aria-labelledby="v-pills-jubo-cl-tab">jubo</div>
                                                <div class="tab-pane fade" id="v-pills-chhatra-cl" role="tabpanel" aria-labelledby="v-pills-chhatra-cl-tab">chhatra</div>
                                                <div class="tab-pane fade" id="v-pills-sramik-cl" role="tabpanel" aria-labelledby="v-pills-sramik-cl-tab">sramik</div>
                                                <div class="tab-pane fade" id="v-pills-mohila-cl" role="tabpanel" aria-labelledby="v-pills-mohila-cl-tab">mohila</div>
                                                <div class="tab-pane fade" id="v-pills-sss-cl" role="tabpanel" aria-labelledby="v-pills-sss-cl-tab">Samajik Sangskritik Sangstha</div>
                                                <div class="tab-pane fade" id="v-pills-krishak-cl" role="tabpanel" aria-labelledby="v-pills-krishak-cl-tab">krishak</div>
                                                <div class="tab-pane fade" id="v-pills-sechchasebak-cl" role="tabpanel" aria-labelledby="v-pills-sechchasebak-cl-tab">sechchasebak</div>
                                                <div class="tab-pane fade" id="v-pills-muktijoddha-cl" role="tabpanel" aria-labelledby="v-pills-muktijoddha-cl-tab">muktijoddha</div>
                                                <div class="tab-pane fade" id="v-pills-matshayajibi-cl" role="tabpanel" aria-labelledby="v-pills-matshayajibi-cl-tab">Matshayajibi</div>
                                                <div class="tab-pane fade" id="v-pills-tanti-cl" role="tabpanel" aria-labelledby="v-pills-tanti-cl-tab">tanti</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="tab-pane fade" id="upazilla" role="tabpanel" aria-labelledby="upazilla-tab">
                                    
                                    Upazilla
                                    
                                </div>

                                <div class="tab-pane fade" id="pourashava" role="tabpanel" aria-labelledby="pourashava-tab">
                                    
                                    Pourashava
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

    </div>
</template>

<script>
    export default {
        data(){
            return {
                editMode: false,
                items: {},
                divisions: {},
                districtDetails: {},
                form: new Form({
                    id: '',
                    division_id: '',
                    name: '',
                    image: '',
                    sort_id: ''
                })
            }
        },
        methods: {            

            loadData(){
                axios.get('api/district').then(({ data }) => (
                    this.divisions = data[0],
                    this.items = data[1]
                ));
            },

            pagination(page = 1) {
                axios.get('api/district?page=' + page)
                .then(response => {
                    this.items = response.data[1];
                });
            },

            uploadImage(e){
                let file = e.target.files[0];
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
                return "assets/img/district/" + img;
            },

            createNew(){
                this.editMode = false;
                this.form.reset();
                $('#addNewModel').modal('show');                
            },

            create(){
                this.$Progress.start();
                this.form.post('api/district')
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
            },

            update() {
                this.$Progress.start();
                this.form.put('api/district/' + this.form.id)
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

            showData(id){
                axios.get('api/district/' + id)
                .then(({ data }) => {
                    this.districtDetails = data
                });
                $('#districtDetails').modal('show')
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
                        axios.delete('api/district/' + id)
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
