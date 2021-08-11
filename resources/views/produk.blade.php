@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="./css/fontawesome/all.css">
<link rel="stylesheet" href="./css/app.css">
<div class="content-wrapper" id="app">
    @yield('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  List Produk
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: scroll !important">
                <div class="d-flex flex-row mb-3 justify-content-between">
                  <input type="text" name="cari" id="cari" placeholder="Cari ..." size="175" v-model="filter.produk">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus text-light"></i> Tambah Produk</button>
                </div>
                <table class="table">
                  <thead class="text-white text-center bg-success">
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Kategori</th>
                      <th>Merk</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Stok</th>
                      <th>NoBatch</th>
                      <th>Exp</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, i) in computedProduk" :key="item.Id">
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.KodeBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.KodeBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.NamaBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.NamaBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.Deskripsi" size="10">
                        </div>
                        <div v-else>
                          @{{item.Deskripsi}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.KategoriBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.KategoriBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.MerkBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.MerkBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.HargaBeliBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.HargaBeliBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.HargaBeliBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.HargaBeliBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.StokAkhirBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.StokAkhirBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.NoBatchBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.NoBatchBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 1rem !important">
                        <div v-if="item.editable == true">
                          <input type="text" v-model="item.ExpBrg" size="10">
                        </div>
                        <div v-else>
                          @{{item.ExpBrg}}
                        </div>
                      </td>
                      <td class="border border-dark" style="width: 3rem">
                        <div class="d-flex flex-row align-items-center justify-space-between">
                          <div class="mx-2" @click="edit(item, i)">
                            <i class="fas fa-edit text-primary"></i>
                          </div>
                          <div class="mx-2" @click="deleteItem(item, i)">
                            <i class="fas fa-times text-danger"></i>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Tambah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="KodeBrg">Kode Barang</label>
                <input type="text" class="form-control" id="KodeBrg" placeholder="SKU0000" v-model="modal.tambah.KodeBrg">
              </div>
              <div class="form-group">
                <label for="NamaBrg">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBrg" placeholder="" v-model="modal.tambah.NamaBrg">
              </div>
              <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="Deskripsi" placeholder="" v-model="modal.tambah.Deskripsi">
              </div>
              <div class="form-group">
                <label for="KategoriBrg">Kategori Barang</label>
                <input type="text" class="form-control" id="KategoriBrg" placeholder="" v-model="modal.tambah.KategoriBrg">
              </div>
              <div class="form-group">
                <label for="MerkBrg">Merk Barang</label>
                <input type="text" class="form-control" id="MerkBrg" placeholder="" v-model="modal.tambah.MerkBrg">
              </div>
              <div class="form-group">
                <label for="HargaBeliBrg">Harga Barang</label>
                <input type="number" class="form-control" id="HargaBeliBrg" placeholder="" v-model="modal.tambah.HargaBeliBrg">
              </div>
              <div class="form-group">
                <label for="StokAkhirBrg">Stok Barang</label>
                <input type="number" class="form-control" id="StokAkhirBrg" placeholder="" v-model="modal.tambah.StokAkhirBrg">
              </div>
              <div class="form-group">
                <label for="NoBatchBrg">No Batch Barang</label>
                <input type="number" class="form-control" id="NoBatchBrg" placeholder="" v-model="modal.tambah.NoBatchBrg">
              </div>
              <div class="form-group">
                <label for="ExpBrg">Exp Barang</label>
                <input type="text" class="form-control" id="ExpBrg" placeholder="" v-model="modal.tambah.ExpBrg">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" @click="insert()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./js/fontawesome/all.js"></script>
  <script src="./js/vue.js"></script>
  <script>
    const app = new Vue({
        el: '#app',
        data: () => ({
          data: [],
          modal: {
            tambah: {
              KodeBrg: "",
              NamaBrg: "",
              Deskripsi: "",
              KategoriBrg: "",
              MerkBrg: "",
              HargaBeliBrg: 0,
              StokAkhirBrg: 0,
              NoBatchBrg: "0",
              ExpBrg: ""
            }
          },
          filter: {
            produk: ''
          }
        }),
        watch: {
          filter: {
            handler: (val) => {
            },
            deep: true,
          },
        },
        computed: {
          computedProduk(){
            if (this.data != null) {
              let result = this.data;
              return result
                .filter((event) => {
                  return (
                    event.NamaBrg
                      .toLowerCase()
                      .includes(this.filter.produk.toLowerCase()) ||
                    event.KodeBrg.toLowerCase().includes(this.filter.produk.toLowerCase()) ||
                    event.MerkBrg.toLowerCase().includes(this.filter.produk.toLowerCase())
                  );
                })
                // .sort((a, b) => {
                //   if (a.NamaBrg < b.NamaBrg) return -1;
                //   if (a.NamaBrg > b.NamaBrg) return 1;
                //   return 0;
                // });
            } else {
              let result = this.data;
              // return res.sort((a, b) => {
              //   if (a.NamaBrg < b.NamaBrg) return -1;
              //   if (a.NamaBrg > b.NamaBrg) return 1;
              //   // if (a.NamaBrg < b.NamaBrg) return -1;
              //   // if (a.KodeBrg > b.KodeBrg) return 1;
              //   // if (a.MerkBrg > b.MerkBrg) return 1;
              //   return 0;
              // });
              return result;
            }
          }
        },
        methods: {
          getDataProduk() {
            axios.get('/api/produk/getall').then(res => {
              let computedData = [];
              res.data.map(val => {
                computedData.push({
                  ...val,
                  editable: false
                })
              })
              this.data = computedData;
            }).catch(err => {
              console.log(err);
            })
          },
          edit(item, index){
            // ketika mau di submit
            if (item.editable == true) {
              axios.post('/api/produk/update/' + item.Id, {
                KodeBrg: item.KodeBrg,
                NamaBrg: item.NamaBrg,
                Deskripsi: item.Deskripsi,
                KategoriBrg: item.KategoriBrg,
                MerkBrg: item.MerkBrg,
                HargaBeliBrg: item.HargaBeliBrg,
                StokAkhirBrg: item.StokAkhirBrg,
                NoBatchBrg: item.NoBatchBrg,
                ExpBrg: item.ExpBrg
            }).then(res => {
              this.data[index].editable = false;
              this.getDataProduk();
              Swal.fire('Success Updated!', '', 'success');
              }).catch(err => {
                this.data[index].editable = false;
                console.log(err);
              })
            // ketika masih belum di klik
            } else {
              this.data[index].editable = true;
            }
          },
          insert(){
            axios.post('/api/produk/insert', this.modal.tambah).then(res => {
              Swal.fire('Inserted!', '', 'success');
              $('#tambahModal').modal('hide');
              this.getDataProduk();
              this.modal.tambah = {
                KodeBrg: "",
                NamaBrg: "",
                Deskripsi: "",
                KategoriBrg: "",
                MerkBrg: "",
                HargaBeliBrg: 0,
                StokAkhirBrg: 0,
                NoBatchBrg: "0",
                ExpBrg: ""
              }
            }).catch(err => {
              Swal.fire('Gagal insert!', '', 'error');
            })
          },
          deleteItem(item, index){
            Swal.fire({
              title: 'Apakah yakin untuk menghapus ?',
              showCancelButton: true,
              confirmButtonText: `Delete`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                axios.post('/api/produk/delete/' + item.Id).then(res => {
                  Swal.fire('Deleted!', '', 'success');
                  this.getDataProduk();
                }).catch(err => {
                  Swal.fire('Gagal delet!', '', 'error');
                })
              } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
              }
            })
          }
        },
        created() {
          this.getDataProduk();
        }
    });

  </script>
@endsection
