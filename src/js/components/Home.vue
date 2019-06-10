<template>
  <div>
    <!--begin::Breadcrumb-->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
      <div class="kt-subheader__main">
        <nav aria-label="breadcrumb" style="margin-top: 0.5em;">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" @click.prevent>Principal</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end::Breadcrumb-->

    <div
      class="kt-content kt-grid__item kt-grid__item--fluid"
      id="kt_content"
      style="margin-bottom: 8em;"
    >
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <!--begin::Card-->
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <i class="fas fa-gamepad"></i>&nbsp;&nbsp;Administrar atracción
              </div>
              <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                  <div class="kt-portlet__head-actions text-right">
                    <a
                      href="#"
                      class="btn btn-primary btn-elevate btn-sm"
                      @click="modalShow(1)"
                      v-if="game == 1"
                    >
                      <i class="fas fa-user-plus"></i> Añadir usuario
                    </a>
                    <a
                      href="#"
                      class="btn btn-warning btn-elevate btn-sm"
                      @click="modalShow(2)"
                      v-if="game == 1"
                    >
                      <i class="fas fa-eye"></i> Ver apuestas
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit" style="padding: 1em;">
              <div
                class="kt-grid kt-wizard-v1 kt-wizard-v1--white"
                id="kt_wizard_v1"
                data-ktwizard-state="first"
              >
                <div class="kt-grid__item text-center">
                  <div>
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
                      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <button
                          id="button_start"
                          onclick="roulette.startAnimation()"
                          v-if="game == 1"
                          style="display: none;"
                          class="btn btn-light"
                        ></button>
                        <button
                          class="btn btn-success"
                          v-if="game == 1"
                          @click="start_game()"
                        >Jugar ronda</button>
                        <button
                          class="btn btn-danger"
                          v-if="game == 1"
                          @click="end_game()"
                        >Finalizar juego</button>
                        <button
                          class="btn btn-danger btn-block"
                          @click="start()"
                          v-if="game == 0"
                        >Iniciar partida</button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
                    </div>
                    <hr>
                  </div>
                  <button id="button_roulette_result" @click="result()" style="display: none;"></button>
                  <input type="hidden" id="roulette_result">
                  <canvas id="canvas" height="400" width="400"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!--end::Card-->
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
      </div>
    </div>

    <!--begin::Modal-->
    <div
      class="modal fade"
      id="player-modal"
      role="dialog"
      aria-labelledby="user-label"
      aria-modal="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="user-label" v-text="modal.modal_text"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--begin::Find-->
            <div class="form-group" v-if="modal.modal_view == 1">
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <select v-model="person_query.column" class="form-control">
                      <option value="names">Nombres</option>
                      <option value="surnames">Apellidos</option>
                    </select>
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar usuario"
                    v-model="person_query.find"
                    @keyup="queryAxiosGet('persons/findUsersActive/' + person_pagination.current_page + '/' + person_query.column + '/' + person_query.find, 1)"
                  >
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
            </div>
            <!--end::Find-->
            <!--begin::Table-->
            <div class="kt-section">
              <div class="kt-section__content table-responsive">
                <table class="table table-striped" v-if="modal.modal_view == 1">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Email</th>
                      <th>Monto disponible</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="person in persons" :key="person.id">
                      <th scope="row" class="text-center">
                        <button class="btn btn-success btn-sm" @click="addUser(person.id)">
                          <i class="fa fa-check"></i>
                        </button>
                      </th>
                      <td v-text="person.names"></td>
                      <td v-text="person.surnames"></td>
                      <td v-text="person.email"></td>
                      <td>{{ person.total_amount | currency }}</td>
                    </tr>
                  </tbody>
                </table>

                <div v-if="modal.modal_view == 2">
                  <table class="table table-striped" id="bet_table">
                    <thead>
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Monto apostado</th>
                        <th>Color</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="person in players" :key="person.id">
                        <td v-text="person.names"></td>
                        <td v-text="person.surnames"></td>
                        <td>{{ person.amount | currency }}</td>
                        <td>
                          <div v-if="person.color == 1">Negro</div>
                          <div v-if="person.color == 2">Rojo</div>
                          <div v-if="person.color == 3">Verde</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--end::Table-->
            <div class="row" v-if="person_pagination.total > 0 && modal.modal_view == 1">
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <!--begin::Pagination-->
                <nav style="font-size: 16px;">
                  <ul class="pagination">
                    <li class="page-item disabled" v-if="person_pagination.current_page <= 2">
                      <a class="page-link" href="#" @click.prevent>
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item" v-if="person_pagination.current_page > 2">
                      <a
                        class="page-link"
                        href="#"
                        @click.prevent="changePage(1, 1, person_query.column, person_query.find)"
                      >
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item disabled" v-if="person_pagination.current_page <= 1">
                      <a class="page-link" href="#" @click.prevent>
                        <span aria-hidden="true">&lt;</span>
                      </a>
                    </li>
                    <li class="page-item" v-if="person_pagination.current_page > 1">
                      <a
                        class="page-link"
                        href="#"
                        @click.prevent="changePage(1, person_pagination.current_page - 1, person_query.column, person_query.find)"
                      >
                        <span aria-hidden="true">&lt;</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a
                        class="page-link"
                        href="#"
                        @click.prevent
                        v-text="person_pagination.current_page"
                      ></a>
                    </li>
                    <li
                      class="page-item"
                      v-if="person_pagination.current_page < person_pagination.total"
                    >
                      <a
                        class="page-link"
                        href="#"
                        @click.prevent="changePage(1, person_pagination.current_page + 1, person_query.column, person_query.find)"
                      >
                        <span aria-hidden="true">&gt;</span>
                      </a>
                    </li>
                    <li
                      class="page-item disabled"
                      v-if="person_pagination.current_page >= person_pagination.total"
                    >
                      <a class="page-link" href="#" @click.prevent>
                        <span aria-hidden="true">&gt;</span>
                      </a>
                    </li>
                    <li
                      class="page-item"
                      v-if="person_pagination.current_page < (person_pagination.total - 1)"
                    >
                      <a
                        class="page-link"
                        href="#"
                        @click.prevent="changePage(1, person_pagination.total, person_query.column, person_query.find)"
                      >
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                    <li
                      class="page-item disabled"
                      v-if="person_pagination.current_page >= (person_pagination.total - 1)"
                    >
                      <a class="page-link" href="#" @click.prevent>
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!--end::Pagination-->
              </div>
              <div
                class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"
              >{{ person_pagination.first }} - {{ person_pagination.last }} de {{ person_pagination.total_data }} Registros - Página {{ person_pagination.current_page }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end::Modal-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      result_roulette: null,
      game: 0,
      person_id: 0,
      players: [],
      persons: [],
      person_data: {
        names: "",
        surnames: "",
        email: "",
        total_amount: 0
      },
      person_pagination: {
        count: 0,
        total_data: 0,
        total: 0,
        current_page: 0,
        first: 0,
        last: 0
      },
      person_query: {
        column: "names",
        find: ""
      },
      modal: {
        modal_text: "",
        modal_view: ""
      }
    };
  },
  methods: {
    queryAxiosPost(url, params, id) {
      let me = this;

      var formData = new FormData();

      for (var key in params) {
        if (id != 2) {
          formData.append(key, params[key]);
        } else {
          for (var key2 in params[key]) {
            formData.append(key + "-" + key2, params[key][key2]);
          }
        }
      }

      axios
        .post(url, formData)
        .then(response => {
          if (response.data.success) {
            switch (parseInt(id)) {
              case 1:
                me.showSwal(
                  response.data.title,
                  "success",
                  "center",
                  response.data.msj,
                  5000,
                  true
                );
                break;
              case 2:
                break;
            }
          }
        })
        .catch(error => {
          var errors = error.response.data;
          console.log(errors);
          me.showSwal(
            "Error",
            "error",
            "center",
            "Ha ocurrido un error inesperado. Por favor comunicate con soporte",
            2000
          );
        });
    },
    queryAxiosGet(url, id) {
      let me = this;
      axios
        .get(url)
        .then(response => {
          switch (parseInt(id)) {
            case 1:
              me.person_pagination = response.data.pagination;
              me.persons = response.data.persons;
              break;
            case 2:
              me.person_data = response.data.person;
              return me.addUser(id, 2);
              break;
          }
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    },
    changePage(id, page, column = "", find = "") {
      switch (parseInt(id)) {
        case 1:
          return this.queryAxiosGet(
            "persons/findUsersActive/" + page + "/" + column + "/" + find,
            1
          );
          break;
      }
    },
    addUser(id, type = 1) {
      let me = this;

      if (type == 1) {
        me.clearData();
        me.queryAxiosGet("persons/find/" + id, 2);
        me.person_id = id;
      } else if (type == 2) {
        Swal.fire({
          title: "Ingresar valor",
          html: `<br/>
					<div class="text-left"><label><strong>Color:</strong></label></div>
					<select id="color_selected" class="form-control">
						<option value="1">Negro</option>
						<option value="2">Rojo</option>
						<option value="3">Verde</option>
					</select><br/>
					<div class="text-left"><label><strong>Valor de apuesta:</strong></label></div>
					<input id="amount" class="swal2-input" placeholder="Ingresa un valor">
					`,
          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: "Agregar",
          showLoaderOnConfirm: true,
          preConfirm: () => {
            var color_selected = document.getElementById("color_selected")
              .value;
            var value = document.getElementById("amount").value;

            let min = parseInt((me.person_data.total_amount * 8) / 100);
            let max = parseInt((me.person_data.total_amount * 15) / 100);

            try {
              if (!value) {
                throw new Error("Debes ingresar un valor!");
              }

              if (isNaN(value)) {
                throw new Error("Debes ingresar un numero!");
              } else if (value % 1 != 0) {
                throw new Error("Debes ingresar un numero entero!");
              } else if (value <= 0) {
                throw new Error("El valor no puede ser menor o igual a 0!");
              }

              if (parseInt(value) > parseInt(me.person_data.total_amount)) {
                throw new Error(
                  "El saldo del jugador no es suficiente para apostar el valor ingresado!"
                );
              }
              if (
                parseInt(me.person_data.total_amount) <= 1000 &&
                parseInt(value) != parseInt(me.person_data.total_amount)
              ) {
                throw new Error(
                  "El jugador tiene un valor menor o igual a $1.000, debe apostarlo todo! valor: $" +
                    me.person_data.total_amount
                );
              } else if (
                (parseInt(me.person_data.total_amount) > 1000 &&
                  parseInt(value) >= min &&
                  parseInt(value) <= max) ||
                parseInt(me.person_data.total_amount) <= 1000
              ) {
                me.players.push({
                  id: me.person_id,
                  names: me.person_data.names,
                  surnames: me.person_data.surnames,
                  amount: value,
                  color: color_selected
                });

                me.queryAxiosPost(
                  "persons/bet",
                  { id: me.person_id, amount: value },
                  1
                );
              } else {
                throw new Error(
                  "El jugador solo puede apostar entre un 8% y 15% del saldo disponible. Para este caso entre $" +
                    min +
                    " y $" +
                    max
                );
              }
            } catch (error) {
              Swal.showValidationMessage(`${error}`);
            }
          },
          allowOutsideClick: () => !Swal.isLoading()
        }).then(result => {
          if (result.value) {
            me.clearData();
            me.queryAxiosGet(
              "persons/findUsersActive/" +
                me.person_pagination.current_page +
                "/" +
                me.person_query.column +
                "/" +
                me.person_query.find,
              1
            );
          }
        });
      }
    },
    clearData() {
      this.person_data = {
        names: "",
        surnames: "",
        email: "",
        total_amount: 0
      };
      this.person_id = 0;
    },
    result() {
      let number;
      this.result_roulette = $("#roulette_result").val();

      switch (this.result_roulette) {
        case "N":
          number = 1;
          this.result_roulette = "Negro";
          break;
        case "R":
          number = 2;
          this.result_roulette = "Rojo";
          break;
        case "V":
          number = 3;
          this.result_roulette = "Verde";
          break;
      }

      this.players.push({
        result: number
      });

      this.queryAxiosPost("persons/betResult", this.players, 2);
      this.showSwal("Resultado", "info", "center", this.result_roulette, 5000);
      this.clearData();
      this.players = [];
    },
    start_game() {
      if (this.players.length <= 0)
        return this.showSwal(
          "Error",
          "error",
          "center",
          "Debes añadir jugadores antes de iniciar una ronda",
          5000,
          true
        );

      $("#button_start").click();
    },
    end_game() {
      let me = this;

      if (me.players.length <= 0) {
        me.game = 0;
        me.players = [];
        me.clearData();
        me.showSwal(
          "Partida finalizada",
          "success",
          "center",
          "La partida ha finalizado exitosamente",
          10000,
          true
        );
      } else {
        me.showSwal(
          "Error",
          "error",
          "center",
          "La partida no se puede finalizar hasta jugar esta ronda ya que hay jugadores agregados",
          10000,
          true
        );
      }
    },
    start() {
      let me = this;
      me.game = 1;
      me.showSwal(
        "Partida iniciada",
        "success",
        "center",
        "La partida se ha iniciado exitosamente, ahora ya puedes añadir a tus jugadores",
        10000,
        true
      );
    },
    modalShow(selected) {
      let me = this;

      me.modal.modal_view = selected;

      switch (parseInt(selected)) {
        case 1:
          $("#player-modal").modal("show");
          me.modal.modal_text = "Añadir Usuario";
          me.queryAxiosGet(
            "persons/findUsersActive/1/" +
              me.person_query.column +
              "/" +
              me.person_query.find,
            1
          );
          break;
        case 2:
          $("#player-modal").modal("show");
          me.modal.modal_text = "Ver apuestas";

          $(document).ready(function() {
            $("#bet_table").DataTable({
              order: [[0, "asc"]],
              language: {
                lengthMenu:
                  "Ver <select class='form-control'>" +
                  '<option value="5">5</option>' +
                  '<option value="3">3</option>' +
                  "</select> registros por pagina",
                info: "Mostrando pagina _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrada de _MAX_ registros)",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                search: "Buscar:",
                zeroRecords: "No se encontraron registros coincidentes",
                paginate: {
                  next: "Siguiente",
                  previous: "Anterior"
                }
              }
            });
          });
          break;
        default:
          break;
      }
    },
    showSwal(title, type, position, text = "", timer = 2000, bool = false) {
      $(document).ready(() => {
        Swal.fire({
          position: position,
          type: type,
          title: title,
          text: text,
          showConfirmButton: bool,
          timer: timer
        });
      });
    }
  },
  mounted() {}
};
</script>
