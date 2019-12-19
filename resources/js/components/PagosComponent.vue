<template>
  <div>
    <!-- Modal -->
    <div>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">CALCULAR SUELDO NETO</h5>
          </div>
          <div class="modal-body">
            <span class="text-danger" v-for="error in errors" :key="error">{{error}}</span>
            <form>
              <div class="form-group">
                <label class="control-label col-form-label">Cargo</label>
                <!--
                <select name="select" class="form-control" v-model="selectCargo">
                  <option value>--SELECCIONA UN CARGO--</option>
                  <option
                    v-for="cargo in cargos"
                    :key="cargo.id"
                    v-bind:value="cargo.id"
                  >{{cargo.cargo}}</option>
                </select>
                -->
                <select name="select" class="form-control" v-model="sueldoBasico">
                  <option value>--SELECCIONA UN CARGO--</option>
                  <option
                    v-for="cargo in cargos"
                    :key="cargo.id"
                    v-bind:value="cargo.sueldo"
                  >{{cargo.cargo}}</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Sueldo básico:</label>
                <input v-model="sueldoBasico" class="form-control" type="text" disabled />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Horas no laboradas</label>
                <input v-model="horasNoLaboradas" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Descuento</label>
                <input v-model="calcDescuento" class="form-control" type="text" disabled />
              </div>
              <div class="form-group">
                <label class="control-label col-form-label">Sueldo Neto</label>
                <input v-model="calcNeto" class="form-control" type="text" disabled />
              </div>
              <button v-on:click.prevent="limpiarDatos()" class="btn btn-success col-md-12">LIMPIAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  created() {
    this.getCargos();
  },
  data() {
    return {
      cargos: [],
      errors: "",
      descuento: 0,
      horasNoLaboradas: "",
      neto: 0,
      sueldoBasico: "",
    };
  },
  methods: {
    getCargos() {
      axios.get(`/lista-cargos`).then(response => {
        this.cargos = response.data;
      });
    },
    limpiarDatos() {
      this.horasNoLaboradas = "";
    }
  },
  computed: {
    calcDescuento() {
      return (this.descuento =
        this.horasNoLaboradas * (this.sueldoBasico / 30 / 8)).toFixed(2);
    },
    calcNeto() {
      return (this.neto = this.sueldoBasico - this.descuento).toFixed(2);
    }
  }
};
</script>