
<div class="row justify-content-beetwen">
    <div class="col-md-12">
        <table class="table align-middle" id="dataTableRole" style="width: 100%">
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
<form action="" id="formRole">
    <section id="edit_role_form">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col mb-3">
                    <label for="name_role" class="form-label">Name Role</label>
                    <input
                        disabled
                        type="text"
                        id="name_role"
                        name="name_role"
                        class="form-control"
                        placeholder="Name role"
                    />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col mb-3">
                        <label for="display_name_role" class="form-label">Nama Tampilan</label>
                        <input type="text" hidden id="id_edit_form_role">
                        <input
                            disabled
                            type="text"
                            id="display_name_role"
                            name="display_name_role"
                            class="form-control"
                            placeholder="Nama Tampilan"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="description_role" class="form-label">Deskripsi</label>
                        <input
                            disabled
                            type="text"
                            id="description_role"
                            name="description_role"
                            class="form-control"
                            placeholder="Deskripsi"
                        />
                    </div>
                </div>
            
            </div>
        </div>  
        <br>
        
        <div id="checkbox">

        </div>
    </section>
</form>
    <!-- Button to trigger modal -->
<center>
    <button type="submit" id="tambahRole" class="btn btn-primary">Tambah Role</button>
    <button type="submit" hidden id="batalRole" class="btn btn-danger">Batal</button>
    <button id="simpanRole" class="btn btn-primary text-bg-primary" hidden>
        <span class="spinner-border spinner-border-sm" hidden id="spinner" role="status" aria-hidden="true"></span>
        Simpan Role
    </button>
</center>

