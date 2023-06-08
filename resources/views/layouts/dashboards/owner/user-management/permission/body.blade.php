<div class="row justify-content-beetwen">
    <div class="col-md-12">
        <table class="table align-middle" id="dataTable2" style="width: 100%">
            <thead>
                <th>No.</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Description</th>
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
                <label for="name_permission" class="form-label">Name Permission</label>
                <input
                    type="text"
                    id="name_permission"
                    name="name_permission"
                    class="form-control"
                    placeholder="Name Permission"
                />
                </div>
            </div>
            
            <div class="row">
                <div class="col mb-3">
                    <label for="display_name" class="form-label">Nama Tampilan</label>
                    <input
                        type="text"
                        id="display_name"
                        name="display_name"
                        class="form-control"
                        placeholder="Nama Tampilan"
                    />
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <input
                        type="text"
                        id="description"
                        name="description"
                        class="form-control"
                        placeholder="Deskripsi"
                    />
                </div>
            </div>
        
        </div>
        <div class="col-md-6">
            <div class="modal-body">
                <h5>Pilih Hak Akses :</h5>
                <div class="form-check mt-3">
                    <input class="form-check-input hakAkses" name="hakAkses[]" type="checkbox" value="read" id="defaultCheck1" />
                    <label class="form-check-label" for="defaultCheck1"> Read </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input hakAkses" name="hakAkses[]" type="checkbox" value="create" id="defaultCheck2" />
                    <label class="form-check-label" for="defaultCheck2"> Create </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input hakAkses" name="hakAkses[]" type="checkbox" value="update" id="defaultCheck3" />
                    <label class="form-check-label" for="defaultCheck3"> Update </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input hakAkses" name="hakAkses[]" type="checkbox" value="delete" id="defaultCheck3" />
                    <label class="form-check-label" for="defaultCheck3"> Delete </label>
                </div>
            </div>
        <!-- Button to trigger modal -->
        <center>
            <button type="submit" id="tambahPermission" class="btn btn-primary">Tambah Permission</button>
            <button type="submit" hidden id="batalPermission" class="btn btn-primary">Batal</button>
            <button type="submit" hidden id="simpanPermission" class="btn btn-primary">Simpan</button>
        </center>
    </div>
</div>        

