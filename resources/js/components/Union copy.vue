<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Union List</h3>

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
                                                <th class="sorting" style="width: 190px;">
                                                    Union Name
                                                </th>
                                                <th class="sorting" style="width: 110px;">
                                                    District
                                                </th>
                                                <th class="sorting" style="width: 135px;">
                                                    Upazilla
                                                </th>
                                                <th class="sorting" style="width: 60px;">
                                                    Council
                                                </th>
                                                <th class="sorting" style="width: 60px;">
                                                    Executive
                                                </th>
                                                <th class="sorting" style="width: 100px;">
                                                    Word List
                                                </th>
                                                <th class="sorting" style="width: 110px;">
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
                                                <td> {{ districts[item.district_id] }} </td>
                                                <td> {{ upazillas[item.upazilla_id] }} </td>
                                                <!-- <td v-if="item.image"> <img class="img-bordered-ssm" :src="getImage(item.image)" width="100%" height="25" alt="Union image" /> </td>
                                                <td v-else class="img"> <img class="img-bordered-ssm" src="/assets/img/img404.png" width="100%" height="25" alt="Union image" /> </td> -->
                                                <td> <a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td> <a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td><a href="#"><i class="fas fa-eye"></i></a></td>
                                                <td> {{ item.updated_at | myDate }} </td>
                                                <td>
                                                    <a @click.prevent="details(item.id)" href="#">
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
                        <pagination :data="items" :limit=5 @pagination-change-page="pagination"></pagination>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addNewModel" tabindex="-1" role="dialog" aria-labelledby="addNewModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="editMode" class="modal-title" id="addNewModelLabel">Update Union</h5>
                        <h5 v-show="!editMode" class="modal-title" id="addNewModelLabel">Add Union</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? update() : create()" @keydown="form.onKeydown($event)" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name<span class="required">*</span>:</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                placeholder="Enter union name..."
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="division_id">Division<span class="required">*</span>:</label>
                                <select v-model="form.division_id" name="division_id" id="division_id" @change="getDistricts"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('division_id') }" >
                                    <option value="">Select Division</option>
                                    <option v-for="(division, index) in divisions" :value="index" :key="index"> {{ division }} </option>
                                </select>
                                <has-error :form="form" field="division_id"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="district_id">District<span class="required">*</span>:</label>
                                <select v-model="form.district_id" name="district_id" id="district_id" @change="getUpazillas"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('district_id') }" >
                                    <option value="">Select District</option>
                                    <option v-for="(district, index) in districts" :value="index" :key="index"> {{ district }} </option>
                                </select>
                                <has-error :form="form" field="district_id"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="upazilla_id">Upazilla<span class="required">*</span>:</label>
                                <select v-if="form.upazilla_id" v-model="form.upazilla_id" name="upazilla_id" id="upazilla_id" @change="getPourUnion"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('upazilla_id') }" >
                                    <option value="">Select Upazilla</option>
                                    <option v-for="(upazilla, index) in upazillas" :value="index" :key="index"> {{ upazilla }} </option>
                                </select>
                                <has-error :form="form" field="upazilla_id"></has-error>
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
        <!-- End Add Modal -->

        <!-- Modal -->
        <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModal" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="districtDetailsModelLabel">  Union Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">

                            <ul class="nav nav-tabs nav-fill mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="executive-tab" data-toggle="tab" href="#executive" role="tab" aria-controls="executive" aria-selected="true">Union Executive</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="council-tab" data-toggle="tab" href="#council" role="tab" aria-controls="council" aria-selected="true">Union Council </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="word-tab" data-toggle="tab" href="#word" role="tab" aria-controls="word" aria-selected="false">Word Details</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="row justify-content-md-center">
                                        <div class="col-5">
                                            <div class="union-info mt-30">
                                                <h2>Union</h2>
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
                                        <div class="col-6">
                                            Merber list
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="executive" role="tabpanel" aria-labelledby="executive-tab">
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            <div v-for="(committees, index) in unionExecutive" :key="index" class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a v-for="(committee, i) in committees" :key="i" :class="'nav-link ' + getTabClass(i)" :id="'v-pills-'+i+'-ex-tab'" data-toggle="pill" :href="'#v-pills-'+i+'-ex'" role="tab" :aria-controls="'v-pills-'+i+'-ex'" :aria-selected="true">{{i.charAt(0).toUpperCase() + i.slice(1).substr(0, 9)}}</a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div v-for="(committees, index) in unionExecutive" :key="index" class="tab-content" id="v-pills-tabContent">
                                                <div v-for="(committee, i) in committees" :key="i" :class="'tab-pane fade '+ getTabConClass(i)+' content-overflow'" :id="'v-pills-'+i+'-ex'" role="tabpanel" :aria-labelledby="'v-pills-'+i+'ex-tab'">
                                                    <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" style="width: 200px;">
                                                                    Name
                                                                </th>
                                                                <!-- <th class="sorting" style="width: 50px;">
                                                                    Image
                                                                </th> -->
                                                                <th class="sorting" style="width: 150px;">
                                                                    Mobile
                                                                </th>
                                                                <th class="sorting" style="width: 50px;">
                                                                    Word
                                                                </th>
                                                                <th class="sorting" style="width: 150px;">
                                                                    Designation
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            
                                                            <tr v-for="(item, x) in committee" :key="x">
                                                                <td>{{item.member_name}}</td>
                                                                <td>{{item.mobile}}</td>
                                                                <td>{{item.word_no}}</td>
                                                                <!-- <td>{{item.designation}}</td> -->
                                                                <td v-if="item.post_for_committee === 'Union Executive'">{{item.designation}}</td>
                                                                <td v-else>Member</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="council" role="tabpanel" aria-labelledby="council-tab">
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            <div v-for="(committees, index) in unionCouncil" :key="index" class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a v-for="(committee, i) in committees" :key="i" :class="'nav-link ' + getTabClass(i)" :id="'v-pills-'+i+'-cl-tab'" data-toggle="pill" :href="'#v-pills-'+i+'-cl'" role="tab" :aria-controls="'v-pills-'+i+'-cl'" aria-selected="true">{{i.charAt(0).toUpperCase() + i.slice(1).substr(0, 9)}}</a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div v-for="(committees, index) in unionCouncil" :key="index" class="tab-content" id="v-pills-tabContent">
                                                <div v-for="(committee, i) in committees" :key="i" :class="'tab-pane fade '+ getTabConClass(i)+' content-overflow'" :id="'v-pills-'+i+'-cl'" role="tabpanel" :aria-labelledby="'v-pills-'+i+'cl-tab'">
                                                    <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" style="width: 200px;">
                                                                    Name
                                                                </th>
                                                                <!-- <th class="sorting" style="width: 50px;">
                                                                    Image
                                                                </th> -->
                                                                <th class="sorting" style="width: 150px;">
                                                                    Mobile
                                                                </th>
                                                                <th class="sorting" style="width: 50px;">
                                                                    Word
                                                                </th>
                                                                <th class="sorting" style="width: 150px;">
                                                                    Designation
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            
                                                            <tr v-for="(item, x) in committee" :key="x">
                                                                <td>{{item.member_name}}</td>
                                                                <td>{{item.mobile}}</td>
                                                                <td>{{item.word_no}}</td>
                                                                <!-- <td>{{item.designation}}</td> -->
                                                                <td v-if="item.post_for_committee === 'Union Executive'">{{item.designation}}</td>
                                                                <td v-else>Member</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="word" role="tabpanel" aria-labelledby="word-tab">
                                    
                                    <div class="row">
                                        <div class="col-2">
                                            <div v-for="(committees, index) in wordDetails" :key="index" class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a v-for="(committee, i) in committees" :key="i" :class="'nav-link ' + getTabClass(i)" :id="'v-pills-'+i+'-tab'" data-toggle="pill" :href="'#v-pills-'+i" role="tab" :aria-controls="'v-pills-'+i" aria-selected="true">{{i.charAt(0).toUpperCase() + i.slice(1).substr(0, 5)}}</a>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active content-overflow" id="v-pills-word-1" role="tabpanel" aria-labelledby="v-pills-word-1">
                                                    <ul class="nav nav-tabs nav-fill mb-3" id="wordTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="word-executive-tab" data-toggle="tab" href="#word-executive" role="tab" aria-controls="word-executive" aria-selected="true">Word Executive</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="word-council-tab" data-toggle="tab" href="#word-council" role="tab" aria-controls="word-council" aria-selected="false">Word Council</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="wordTabContent">
                                                        <div class="tab-pane fade show active" id="word-executive" role="tabpanel" aria-labelledby="word-executive-tab">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                        <a class="nav-link active" id="v-pills-jubo-cl-tab" data-toggle="pill" href="#v-pills-jubo-cl" role="tab" aria-controls="v-pills-jubo-cl" aria-selected="true">Jubo</a>
                                                                        <a class="nav-link" id="v-pills-chhatra-cl-tab" data-toggle="pill" href="#v-pills-chhatra-cl" role="tab" aria-controls="v-pills-chhatra-cl" aria-selected="false">Chhatra</a>
                                                                        <a class="nav-link" id="v-pills-sramik-cl-tab" data-toggle="pill" href="#v-pills-sramik-cl" role="tab" aria-controls="v-pills-sramik-cl" aria-selected="false">Sramik</a>
                                                                        <a class="nav-link" id="v-pills-mohila-cl-tab" data-toggle="pill" href="#v-pills-mohila-cl" role="tab" aria-controls="v-pills-mohila-cl" aria-selected="false">Mohila</a>
                                                                        <a class="nav-link" id="v-pills-sss-cl-tab" data-toggle="pill" href="#v-pills-sss-cl" role="tab" aria-controls="v-pills-sss-cl" aria-selected="true">Samajik</a>
                                                                        <a class="nav-link" id="v-pills-krishak-cl-tab" data-toggle="pill" href="#v-pills-krishak-cl" role="tab" aria-controls="v-pills-krishak-cl" aria-selected="false">Krishak</a>
                                                                        <a class="nav-link" id="v-pills-sechchasebak-cl-tab" data-toggle="pill" href="#v-pills-sechchasebak-cl" role="tab" aria-controls="v-pills-sechchasebak-cl" aria-selected="false">Sechchasebak</a>
                                                                        <a class="nav-link" id="v-pills-muktijoddha-cl-tab" data-toggle="pill" href="#v-pills-muktijoddha-cl" role="tab" aria-controls="v-pills-muktijoddha-cl" aria-selected="false">Muktijoddha</a>
                                                                        <a class="nav-link" id="v-pills-matshayajibi-cl-tab" data-toggle="pill" href="#v-pills-matshayajibi-cl" role="tab" aria-controls="v-pills-matshayajibi-cl" aria-selected="false">Matshayajibi</a>
                                                                        <a class="nav-link" id="v-pills-tanti-cl-tab" data-toggle="pill" href="#v-pills-tanti-cl" role="tab" aria-controls="v-pills-tanti-cl" aria-selected="false">Tanti</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active" id="v-pills-jubo-cl" role="tabpanel" aria-labelledby="v-pills-jubo-cl-tab">
                                                                            <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                                                                <thead>
                                                                                    <tr role="row">
                                                                                        <th class="sorting" style="width: 180px;">
                                                                                            Name
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 50px;">
                                                                                            Image
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 100px;">
                                                                                            Mobile
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 50px;">
                                                                                            Word
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 100px;">
                                                                                            Designation
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr v-for="(item, index) in wordDetails" :key="index">
                                                                                        <td>{{item.member_name}}</td>
                                                                                        <td>{{item.mobile}}</td>
                                                                                        <td>{{item.word_no}}</td>
                                                                                        <td>{{item.designation}}</td>
                                                                                        <td v-if="item.post_for_committee === 'Union Executive'">{{item.designation}}</td>
                                                                                        <td v-else>Member</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
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
                                                        <div class="tab-pane fade show" id="word-council" role="tabpanel" aria-labelledby="word-council-tab">
                                                            
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                        <a class="nav-link active" id="v-pills-jubo-cl-tab" data-toggle="pill" href="#v-pills-jubo-cl" role="tab" aria-controls="v-pills-jubo-cl" aria-selected="true">Jubo</a>
                                                                        <a class="nav-link" id="v-pills-chhatra-cl-tab" data-toggle="pill" href="#v-pills-chhatra-cl" role="tab" aria-controls="v-pills-chhatra-cl" aria-selected="false">Chhatra</a>
                                                                        <a class="nav-link" id="v-pills-sramik-cl-tab" data-toggle="pill" href="#v-pills-sramik-cl" role="tab" aria-controls="v-pills-sramik-cl" aria-selected="false">Sramik</a>
                                                                        <a class="nav-link" id="v-pills-mohila-cl-tab" data-toggle="pill" href="#v-pills-mohila-cl" role="tab" aria-controls="v-pills-mohila-cl" aria-selected="false">Mohila</a>
                                                                        <a class="nav-link" id="v-pills-sss-cl-tab" data-toggle="pill" href="#v-pills-sss-cl" role="tab" aria-controls="v-pills-sss-cl" aria-selected="true">Samajik</a>
                                                                        <a class="nav-link" id="v-pills-krishak-cl-tab" data-toggle="pill" href="#v-pills-krishak-cl" role="tab" aria-controls="v-pills-krishak-cl" aria-selected="false">Krishak</a>
                                                                        <a class="nav-link" id="v-pills-sechchasebak-cl-tab" data-toggle="pill" href="#v-pills-sechchasebak-cl" role="tab" aria-controls="v-pills-sechchasebak-cl" aria-selected="false">Sechchasebak</a>
                                                                        <a class="nav-link" id="v-pills-muktijoddha-cl-tab" data-toggle="pill" href="#v-pills-muktijoddha-cl" role="tab" aria-controls="v-pills-muktijoddha-cl" aria-selected="false">Muktijoddha</a>
                                                                        <a class="nav-link" id="v-pills-matshayajibi-cl-tab" data-toggle="pill" href="#v-pills-matshayajibi-cl" role="tab" aria-controls="v-pills-matshayajibi-cl" aria-selected="false">Matshayajibi</a>
                                                                        <a class="nav-link" id="v-pills-tanti-cl-tab" data-toggle="pill" href="#v-pills-tanti-cl" role="tab" aria-controls="v-pills-tanti-cl" aria-selected="false">Tanti</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active" id="v-pills-jubo-cl" role="tabpanel" aria-labelledby="v-pills-jubo-cl-tab">
                                                                            <table id="example1" class="table table-bordered table-striped dataTable bigData" role="grid" aria-describedby="example1_info">
                                                                                <thead>
                                                                                    <tr role="row">
                                                                                        <th class="sorting" style="width: 200px;">
                                                                                            Name
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 50px;">
                                                                                            Image
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 150px;">
                                                                                            Mobile
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 50px;">
                                                                                            Word
                                                                                        </th>
                                                                                        <th class="sorting" style="width: 150px;">
                                                                                            Designation
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr v-for="(item, index) in wordDetails" :key="index">
                                                                                        <td>{{item.member_name}}</td>
                                                                                        <td>{{item.mobile}}</td>
                                                                                        <td>{{item.word_no}}</td>
                                                                                        <td>{{item.designation}}</td>
                                                                                        <td v-if="item.post_for_committee === 'Union Executive'">{{item.designation}}</td>
                                                                                        <td v-else>Member</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
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
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="v-pills-word-2" role="tabpanel" aria-labelledby="v-pills-word-2-tab">word-2</div>
                                                <div class="tab-pane fade" id="v-pills-word-3" role="tabpanel" aria-labelledby="v-pills-word-3-tab">word-3</div>
                                                <div class="tab-pane fade" id="v-pills-word-4" role="tabpanel" aria-labelledby="v-pills-word-4-tab">word-4</div>
                                                <div class="tab-pane fade" id="v-pills-word-5" role="tabpanel" aria-labelledby="v-pills-word-5-tab">word-5</div>
                                                <div class="tab-pane fade" id="v-pills-word-6" role="tabpanel" aria-labelledby="v-pills-word-6-tab">word-6</div>
                                                <div class="tab-pane fade" id="v-pills-word-7" role="tabpanel" aria-labelledby="v-pills-word-7-tab">word-7</div>
                                                <div class="tab-pane fade" id="v-pills-word-8" role="tabpanel" aria-labelledby="v-pills-word-8-tab">word-8</div>
                                                <div class="tab-pane fade" id="v-pills-word-9" role="tabpanel" aria-labelledby="v-pills-word-9-tab">word-9</div>
                                                <div class="tab-pane fade" id="v-pills-word-10" role="tabpanel" aria-labelledby="v-pills-word-10-tab">word-10</div>
                                                <div class="tab-pane fade" id="v-pills-word-11" role="tabpanel" aria-labelledby="v-pills-word-11-tab">word-11</div>
                                                <div class="tab-pane fade" id="v-pills-word-12" role="tabpanel" aria-labelledby="v-pills-word-12-tab">word-12</div>
                                                <div class="tab-pane fade" id="v-pills-word-13" role="tabpanel" aria-labelledby="v-pills-word-13-tab">word-13</div>
                                            </div>
                                        </div>
                                    </div>
                                    
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
                districts: {},
                districtList: {},
                upazillas:{},
                upazillaList:{},
                unionInfo:{},
                unionExecutive:{},
                unionCouncil:{},
                wordDetails:{},
                form: new Form({
                    id: '',
                    division_id: '',
                    district_id: '',
                    upazilla_id: '',
                    name: '',
                    image: '',
                    sort_id: ''
                })
            }
        },
        methods: {            

            loadData(){
                axios.get('api/union').then(({ data }) => (
                    this.divisions = data[0],
                    this.districts = data[1],
                    this.upazillas = data[2],
                    this.items = data[3]
                ));
            },

            pagination(page = 1) {
                axios.get('api/union?page=' + page)
                .then(response => {
                    this.items = response.data[3];
                });
            },

            getDistricts() {
                var id = this.form.division_id
                axios.get('api/dstlookup/' + id).then(({ data }) => (
                    this.districtList = data[0]
                ));
            },

            getUpazillas() {
                var id = this.form.district_id
                axios.get('api/upazillalookup/' + id).then(({ data }) => (
                    this.upazillaList = data[0]
                ));
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
                return "assets/img/union/" + img;
            },

            createNew(){
                this.editMode = false;
                this.form.reset();
                $('#addNewModel').modal('show');                
            },

            create(){
                this.$Progress.start();
                this.form.post('api/union')
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
                this.form.put('api/union/' + this.form.id)
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
                        axios.delete('api/union/' + id)
                        .then(() => {
                            Fire.$emit('reloadData');
                            Swal.fire( 'Deleted!', 'The record has been deleted.', 'success')
                        })
                        .catch(() => {
                            Swal.fire('Failed!', 'There was an error!', 'Warning' )
                        })
                    }
                })
            },

            details(id){
                axios.get('api/union/' + id).then(({ data }) => (
                    this.unionInfo = data[0],
                    this.unionExecutive = data[1],
                    this.unionCouncil = data[2],
                    this.wordDetails = data[3]
                ));
                $('#detailsModal').modal('show');                
            },

            getTabClass(str){
                if(str == 'mainstream-show-active'){
                    let cls = str.split('-');
                    console.log(cls[0]);
                    return cls[2];
                }

                if(str == 'word-1-show-active'){
                    let cls = str.split('-');
                    console.log(cls[0]);
                    return cls[3];
                }
            },

            getTabConClass(str){
                if(str == 'mainstream-show-active'){
                    let cls = str.split('-');
                    console.log(cls[0]);
                    return cls[1]+' '+ cls[2];
                }
            }
            
        },        

        created() {
            this.loadData();
            Fire.$on('reloadData', () => this.loadData());
            // setInterval(() => this.loadData(), 3000);
            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUnion?q=' + query)
                .then((data) => {
                    this.items = data.data
                })
                .catch()
            });
        }
        
    }
</script>
