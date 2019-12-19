<template>
  <div>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#regCargo">Registrar Cargo</button>
    <table class="table table-striped" id="dtCargos">
      <thead>
        <tr>
          <th>#</th>
          <th>Cargo</th>
          <th>Sueldo</th>
          <th>Opción</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(cargo, index) in cargos" :key="cargo.id">
          <td>{{index + 1}}</td>
          <td>{{cargo.cargo}}</td>
          <td>S/{{cargo.sueldo}}</td>
          <td>
            <i v-on:click.prevent="fillCargo(cargo)" 
            class="material-icons text-success cp">edit</i>

            <i
              v-on:click.prevent="delCargo(index,cargo)"
              class="material-icons text-danger cp"
            >delete</i>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- modal -->
    <div
      class="modal fade"
      id="regCargo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">REGISTRAR CARGO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span class="text-danger" v-for="error in errors" :key="error">{{error}}</span>
            <form v-on:submit.prevent="srtCargo()">
              <div class="form-group">
                <label class="control-label col-form-label">Cargo</label>
                <input v-model="newCargo" class="form-control" type="text" />
              </div>
               <div class="form-group">
                <label class="control-label col-form-label">Sueldo</label>
                <input v-model="newSueldo" class="form-control" type="text" />
              </div>
              <button type="submit" class="btn btn-success col-md-12">REGISTRAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editCargo">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">EDITAR CARGO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span class="text-danger" v-for="error in errors" :key="error">{{error}}</span>
            <form v-on:submit.prevent="updtCargo()">
              <div class="form-group">
                <label class="control-label col-form-label">Cargo</label>
                <input v-model="fCargo.cargo" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Sueldo</label>
                <input v-model="fCargo.sueldo" class="form-control" type="text" />
              </div>
              <button type="submit" class="btn btn-success col-md-12">ACTUALIZAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import datatables from "datatables";
export default {
  created() {
    this.getCargos();
  },
  data() {
    return {
      cargos: [],
      newCargo: "",
      newSueldo: "",
      errors: "",
      fCargo: { id: "", cargo: "", sueldo: "" }
    };
  },
  methods: {
    dtCargos() {
      $(document).ready(function() {
        $("#dtCargos").DataTable();
      });
    },
    getCargos() {
      axios.get(`/lista-cargos`).then(response => {
        this.cargos = response.data;
        this.dtCargos();
      });
    },
    srtCargo() {
      axios
        .post(`/lista-cargos`, {
          cargo: this.newCargo,
          sueldo: this.newSueldo
        })
        .then(response => {
          this.getCargos();
          this.newCargo = "";
          this.newSueldo = "";
          this.errors = [];
          $("#regCargo").modal("hide");
          swal("¡Bien hecho!", "Cargo registrado con éxito.", "success");
        })
        .catch(error => {
          this.errors = error.response.data;
        });
    },
    fillCargo(cargo, fCargo) {
      this.fCargo.id = cargo.id;
      this.fCargo.cargo = cargo.cargo;
      this.fCargo.sueldo = cargo.sueldo;
      $("#editCargo").modal("show");
    },
    updtCargo() {
      axios
        .put(`/lista-cargos/` + this.fCargo.id, this.fCargo)
        .then(response => {
          this.getCargos();
          this.fCargo = { id: "", cargo: "", sueldo:"" };
          this.errors = [];
          $("#editCargo").modal("hide");
          swal("¡Bien hecho!", "Cargo actualizado con éxito.", "success");
        })
        .catch(error => {
          this.errors = error.response.data;
        });
    },
    delCargo(index, cargo) {
      swal({
        title: "¿Estás seguro de eliminar el cargo?",
        text: "Una vez eliminado, no podrás recuperarlo",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios.delete(`/lista-cargos/${cargo.id}`).then(response => {
            this.cargo.splice(index, 1);
          });
          swal("Cargo eliminado correctamente.", {
            icon: "success"
          });
          this.getCargos();
        }
      });
    }
  }
};
</script>

<style>
.cp {
  cursor: pointer;
}
</style>