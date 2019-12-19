<template>
  <div>
    <button
      class="btn btn-primary mb-3"
      data-toggle="modal"
      data-target="#regEmpleado"
    >Registrar Empleado</button>
    <table class="table table-striped" id="dtEmpleados">
      <thead>
        <tr>
          <th>#</th>
          <th>Apellidos</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>DNI</th>
          <th>Teléfono</th>
          <th>Correo</th>
          <th>Cargo</th>
          <th>Opción</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(empleado, index) in empleados" :key="empleado.id">
          <td>{{index + 1}}</td>
          <td>{{empleado.apellidos}}</td>
          <td>{{empleado.nombres}}</td>
          <td>{{empleado.direccion}}</td>
          <td>{{empleado.dni}}</td>
          <td>{{empleado.telefono}}</td>
          <td>{{empleado.correo}}</td>
          <td>{{empleado.cargo}}</td>
          <td>
            <i
              v-on:click.prevent="fillEmpleado(empleado)"
              class="material-icons text-success cp"
            >edit</i>

            <i
              v-on:click.prevent="delEmpleado(index,empleado)"
              class="material-icons text-danger cp"
            >delete</i>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Modal -->

    <div
      class="modal fade"
      id="regEmpleado"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modelTitleId"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">REGISTRAR EMPLEADO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span class="text-danger" v-for="error in errors" :key="error">{{error}}</span>
            <form v-on:submit.prevent="srtEmpleados()">
              <div class="form-group">
                <label class="control-label col-form-label">Apellidos</label>
                <input v-model="newApellidos" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Nombres</label>
                <input v-model="newNombres" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Dirección</label>
                <input v-model="newDireccion" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">DNI</label>
                <input
                  v-model="newDni"
                  class="form-control"
                  type="text"
                  maxlength="8"
                  minlength="8"
                />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Teléfono</label>
                <input
                  v-model="newTelefono"
                  class="form-control"
                  type="text"
                  maxlength="9"
                  minlength="9"
                />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Correo Eléctronico</label>
                <input v-model="newCorreo" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Cargo</label>
                <select name="select" class="form-control" v-model="newCargoId">
                  <option
                    v-for="cargo in cargos"
                    :key="cargo.id"
                    v-bind:value="cargo.id"
                  >{{cargo.cargo}}</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success col-md-12">REGISTRAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editEmpleado">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mx-auto">EDITAR EMPLEADO</h5>
          </div>
          <div class="modal-body">
            <span class="text-danger" v-for="error in errors" :key="error">{{error}}</span>
            <form v-on:submit.prevent="updtEmpleado()">
              <div class="form-group">
                <label class="control-label col-form-label">Apellidos</label>
                <input v-model="fEmpleado.apellidos" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Nombres</label>
                <input v-model="fEmpleado.nombres" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Dirección</label>
                <input v-model="fEmpleado.direccion" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">DNI</label>
                <input
                  v-model="fEmpleado.dni"
                  class="form-control"
                  type="text"
                  maxlength="8"
                  minlength="8"
                />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Teléfono</label>
                <input
                  v-model="fEmpleado.telefono"
                  class="form-control"
                  type="text"
                  maxlength="9"
                  minlength="9"
                />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Correo Eléctronico</label>
                <input v-model="fEmpleado.correo" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Cargo</label>
                <select name="select" class="form-control" v-model="fEmpleado.cargo_id">
                  <option
                    v-for="cargo in cargos"
                    :key="cargo.id"
                    v-bind:value="cargo.id"
                  >{{cargo.cargo}}</option>
                </select>
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
    this.getEmpleados();
    this.getCargos();
  },
  data() {
    return {
      cargos: [],
      empleados: [],
      newApellidos: "",
      newNombres: "",
      newDireccion: "",
      newDni: "",
      newTelefono: "",
      newCorreo: "",
      newNombres: "",
      newCargoId: "",
      fEmpleado: {
        id: "",
        apellidos: "",
        nombres: "",
        direccion: "",
        dni: "",
        telefono: "",
        correo: "",
        cargo_id:"",
        sueldo: ""
      },
      errors: ""
    };
  },
  methods: {
    getCargos() {
      axios.get(`/lista-cargos`).then(response => {
        this.cargos = response.data;
      });
    },
    dtEmpleados() {
      $(document).ready(function() {
        $("#dtEmpleados").DataTable();
      });
    },
    getEmpleados() {
      axios.get(`/lista-empleados`).then(response => {
        this.empleados = response.data;
        this.dtEmpleados();
      });
    },
    srtEmpleados() {
      axios
        .post(`/lista-empleados`, {
          apellidos: this.newApellidos,
          nombres: this.newNombres,
          direccion: this.newDireccion,
          dni: this.newDni,
          telefono: this.newTelefono,
          correo: this.newCorreo,
          nombres: this.newNombres,
          cargo_id: this.newCargoId,
        })
        .then(response => {
          this.getEmpleados();
          this.newApellidos = "";
          this.newNombres = "";
          this.newDireccion = "";
          this.newDni = "";
          this.newTelefono = "";
          this.newCorreo = "";
          this.newNombres = "";
          this.newCargoId = "";
          this.errors = [];
          $("#regEmpleado").modal("hide");
          swal("¡Bien hecho!", "Empleado registrado con éxito.", "success");
        })
        .catch(error => {
          this.errors = error.response.data;
        });
    },
    fillEmpleado(empleado, fEmpleado) {
      this.fEmpleado.id = empleado.id;
      this.fEmpleado.apellidos = empleado.apellidos;
      this.fEmpleado.nombres = empleado.nombres;
      this.fEmpleado.direccion = empleado.direccion;
      this.fEmpleado.dni = empleado.dni;
      this.fEmpleado.telefono = empleado.telefono;
      this.fEmpleado.correo = empleado.correo;
      this.fEmpleado.cargo_id = empleado.cargo_id;

      $("#editEmpleado").modal("show");
    },
    updtEmpleado() {
      axios
        .put(`/lista-empleados/` + this.fEmpleado.id, this.fEmpleado)
        .then(response => {
          this.getEmpleados();
          this.fEmpleado = {
            id: "",
            apellidos: "",
            nombres: "",
            direccion: "",
            dni: "",
            telefono: "",
            correo: "",
            cargo_id: "",
          };
          this.errors = [];
          $("#editEmpleado").modal("hide");
          swal("¡Bien hecho!", "Empleado actualizado con éxito.", "success");
        })
        .catch(error => {
          this.errors = error.response.data;
        });
    },
    delEmpleado(index, empleado) {
      swal({
        title: "¿Estás seguro de eliminar el empleado?",
        text: "Una vez eliminado, no podrás recuperarlo",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios.delete(`/lista-empleados/${empleado.id}`).then(response => {
            this.empleado.splice(index, 1);
          });
          swal("Empleado eliminado correctamente.", {
            icon: "success"
          });
          this.getEmpleados();
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