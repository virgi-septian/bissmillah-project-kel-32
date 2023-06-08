
<div class="row justify-content-beetwen">
    <div class="col-md-12">
        <table class="table align-middle" id="dataTable" style="width: 100%">
            <thead>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-6">
        <div class="row">
            <div class="col mb-3">
            <label for="name" class="form-label">Username</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Name"
            />
            </div>
        </div>
        
        <div class="row">
            <div class="col mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="xxxx@xxx.xx"
                />
            </div>
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
            </div>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
              />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
    </div>
    <div class="col-md-6">
        <div class="modal-body">
            <div id="radio">
                
            </div>
            {{-- @foreach($roles as $role)
                <div class="form-check">
                    <input type="radio" name="role" id="{{ $role->name }}" class="role" value="{{ $role->id }}">
                    <label for="{{ $role->name }}">{{ $role->display_name }}</label>
                </div>
            @endforeach --}}
        </div>
        <!-- Button to trigger modal -->
        <center>
            <button type="submit" id="simpanuser" class="btn btn-primary">Simpan</button>
        </center>
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Role : <label for="" id="labelRole"></label></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col mb-3">
                                    <label for="names" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        id="names"
                                        name="names"
                                        class="form-control"
                                        placeholder="Names"
                                    />
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col mb-3">
                                        <label for="emails" class="form-label">Email</label>
                                        <input
                                            type="text"
                                            id="emails"
                                            name="emails"
                                            class="form-control"
                                            placeholder="xxxx@xxx.xx"
                                        />
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="col mb-3">
                                        <label for="id_edit" class="form-label">id</label>
                                        <input
                                            type="text"
                                            id="id_edit"
                                            name="id_edit"
                                            class="form-control"
                                            placeholder="xxxx@xxx.xx"
                                        />
                                    </div>
                                </div>
                                
                                <div id="formRole">
                                    <div id="radio_modal">

                                    </div>
                                    {{-- @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="radio" name="roles" id="{{ $role->name }}" class="roles" value="{{ $role->id }}">
                                            <label for="{{ $role->name }}">{{ $role->display_name }}</label>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5>Permissions</h5>
                                <ul>
                                    <div id="permit">

                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
        
                    <!-- Button to trigger modal -->
        
        
                    <div class="modal-footer">
                        <button type="button" id="btn-tutup" name="batal" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="simpaneditUser" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>