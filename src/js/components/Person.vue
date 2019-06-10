<template>
  <div>
    <!--begin::Breadcrumb-->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
      <div class="kt-subheader__main">
        <nav aria-label="breadcrumb" style="margin-top: 0.5em;">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Configuración</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Personas</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end::Breadcrumb-->

    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Personas registradas</h3>
              </div>
              <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                  <div class="kt-portlet__head-actions text-right">
                    <a
                      href="#"
                      class="btn btn-primary btn-elevate btn-sm"
                      @click="modalShow(selected)"
                    >
                      <i class="fas fa-user-plus fa-2x"></i> Nuevo
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <!--begin::Find-->
                  <div class="form-group">
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
                      >
                      <div class="input-group-append">
                        <button
                          class="btn btn-primary btn-sm"
                          @click="getPersons(1, person_query.column, person_query.find)"
                          type="button"
                        >
                          <i class="fa fa-search text-light"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!--end::Find-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
              </div>

              <!--begin::Table-->
              <div class="kt-section">
                <div class="kt-section__content table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Acciones</th>
                        <th>Estado</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Monto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="person in persons" :key="person.id">
                        <th scope="row" class="text-center">
                          <select
                            class="form-control option-select-fontawesome"
                            @change="modalShow(selected, person.id)"
                            v-model="selected"
                          >
                            <option value="0" selected disabled>&#xf0ca; Seleccionar</option>
                            <option value="2" v-if="person.state == 1">&#xf044; Editar</option>
                            <option value="4" v-if="person.state == 1">&#xf235; Inactivar</option>
                            <option value="5" v-if="person.state == 0">&#xf14a; Activar</option>
                            <option
                              value="6"
                              v-if="person.state == 0"
                            >&#xf1f8; Eliminar definitivamente</option>
                          </select>
                        </th>
                        <td>
                          <span
                            v-if="person.state == 1"
                            class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill"
                          >Activo</span>
                          <span
                            v-else
                            class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill"
                          >Inactivo</span>
                        </td>
                        <td v-text="person.names"></td>
                        <td v-text="person.surnames"></td>
                        <td v-text="person.email"></td>
                        <td>{{ person.total_amount | currency }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--end::Table-->

              <div class="row" v-if="person_pagination.total > 0">
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
              <div v-else>
                <span class="text-danger">No se encontraron registros coincidentes</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--begin::Modal-->
    <div
      class="modal fade"
      id="user-modal"
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
            <div v-if="modal.modal_view == 0 || modal.modal_view == 2">
              <div class="kt-portlet">
                <div class="kt-portlet__head">
                  <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Campos obligatorios (*)</h3>
                  </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form" @submit.prevent="submit()" novalidate>
                  <div class="kt-portlet__body">
                    <div class="accordion" id="user_store">
                      <div class="card">
                        <div class="card-header" id="user_basic_info_header">
                          <div
                            class="card-title"
                            data-toggle="collapse"
                            data-target="#user_basic_info"
                            aria-expanded="true"
                            aria-controls="user_basic_info"
                          >Información Básica</div>
                        </div>
                        <div
                          id="user_basic_info"
                          class="collapse show"
                          aria-labelledby="user_basic_info_header"
                          data-parent="#user_store"
                          style
                        >
                          <div class="card-body">
                            <div class="form-group">
                              <label for="person_names">Nombres</label>
                              <i class="fa fa-asterisk text-danger"></i>
                              <input
                                id="person_names"
                                type="text"
                                class="form-control"
                                placeholder="Ingresa el(los) nombre(s) de la persona"
                                name="person_names"
                                v-model.trim="person_data.names"
                              >
                              <div class="invalid-feedback" v-text="person_errors.names"></div>
                            </div>
                            <div class="form-group">
                              <label for="person_surnames">Apellidos</label>
                              <i class="fa fa-asterisk text-danger"></i>
                              <input
                                id="person_surnames"
                                type="text"
                                class="form-control"
                                placeholder="Ingresa el(los) apellido(s) de la persona"
                                name="person_surnames"
                                v-model.trim="person_data.surnames"
                              >
                              <div class="invalid-feedback" v-text="person_errors.surnames"></div>
                            </div>
                            <div class="form-group">
                              <label for="person_email">Correo electrónico</label>
                              <i class="fa fa-asterisk text-danger"></i>
                              <input
                                id="person_email"
                                type="email"
                                class="form-control"
                                placeholder="example@example.com"
                                name="person_email"
                                v-model.trim="person_data.email"
                              >
                              <div class="invalid-feedback" v-text="person_errors.email"></div>
                            </div>
                            <div class="form-group">
                              <label for="person_total_amount">Dinero</label>
                              <i class="fa fa-asterisk text-danger"></i>
                              <input
                                id="person_total_amount"
                                type="number"
                                class="form-control"
                                placeholder="Monto del jugador"
                                name="person_total_amount"
                                v-model.trim.number="person_data.total_amount"
                              >
                              <div class="invalid-feedback" v-text="person_errors.total_amount"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                      <button
                        type="submit"
                        class="btn btn-primary btn-sm"
                        v-if="modal.modal_view == 0"
                      >
                        <i class="fa fa-save"></i> Guardar
                      </button>
                      <button
                        type="submit"
                        class="btn btn-primary btn-sm"
                        v-if="modal.modal_view == 2"
                      >
                        <i class="fa fa-edit"></i> Editar
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-times"></i> Cancelar
                      </button>
                    </div>
                  </div>
                </form>
                <!--end::Form-->
              </div>
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
      selected: 0,
      person_id: 0,
      persons: [],
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
      person_data: {
        names: "",
        surnames: "",
        email: "",
        total_amount: 10000
      },
      person_errors: {
        names: "",
        surnames: "",
        email: "",
        total_amount: ""
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
        formData.append(key, params[key]);
      }

      axios
        .post(url, formData)
        .then(response => {
          if (response.data.success) {
            $("#user-modal").modal("hide");
            switch (parseInt(id)) {
              case 1:
                me.getPersons(
                  me.person_pagination.current_page,
                  me.person_query.column,
                  me.person_query.find
                );

                me.clearData();

                me.showSwal(
                  response.data.title,
                  "success",
                  "center",
                  response.data.msj,
                  2000
                );
                break;
            }
          }
        })
        .catch(error => {
          var errors = error.response.data;
          if (errors.type == 1) {
            if (errors.hasOwnProperty("names") && errors.names) {
              $("#person_names").attr("class", "form-control is-invalid");
              me.person_errors.names = errors.names;
            }
            if (errors.hasOwnProperty("surnames") && errors.surnames) {
              $("#person_surnames").attr("class", "form-control is-invalid");
              me.person_errors.surnames = errors.surnames;
            }
            if (errors.hasOwnProperty("email") && errors.email) {
              $("#person_email").attr("class", "form-control is-invalid");
              me.person_errors.email = errors.email;
            }
            if (errors.hasOwnProperty("total_amount") && errors.total_amount) {
              $("#person_total_amount").attr(
                "class",
                "form-control is-invalid"
              );
              me.person_errors.total_amount = errors.total_amount;
            }
          } else if (errors.type == 2) {
            console.log(errors);
            me.showSwal(
              "Error",
              "error",
              "center",
              "Ha ocurrido un error inesperado. Por favor comunicate con soporte",
              2000
            );
          }
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
              me.person_data["id"] = me.person_id;
              break;
          }
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    },
    getPersons(page, column, find) {
      return this.queryAxiosGet(
        "persons/index/" + page + "/" + column + "/" + find,
        1
      );
    },
    changePage(id, page, column = "", find = "") {
      switch (parseInt(id)) {
        case 1:
          return this.getPersons(page, column, find);
          break;
      }
    },
    submit() {
      this.resetValidate(1);
      if (this.modal.modal_view == 0) {
        this.queryAxiosPost("persons/store", this.person_data, 1);
      } else if (this.modal.modal_view == 2) {
        this.queryAxiosPost("persons/update", this.person_data, 1);
      }
    },
    enableUser(id) {
      let me = this;

      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Activar usuario",
          text: "¿Estás seguro de reactivar este usuario?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            let me = this;
            me.queryAxiosPost("persons/enable", { id: id }, 1);
          } else if (result.dismiss === Swal.DismissReason.cancel) {
          }
        });
    },
    disableUser(id) {
      let me = this;

      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Inactivar usuario",
          text: "¿Estás seguro de inactivar este usuario?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            let me = this;
            me.queryAxiosPost("persons/disable", { id: id }, 1);
          } else if (result.dismiss === Swal.DismissReason.cancel) {
          }
        });
    },
    deleteUser(id) {
      let me = this;

      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Inactivar usuario",
          text: "¿Estás seguro de eliminar este usuario definitivamente?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            let me = this;
            me.queryAxiosPost("persons/delete", { id: id }, 1);
          } else if (result.dismiss === Swal.DismissReason.cancel) {
          }
        });
    },
    modalShow(selected, id = 0) {
      let me = this;

      me.modal.modal_view = selected;
      me.selected = 0;

      switch (parseInt(selected)) {
        case 0:
          $("#user-modal").modal("show");
          me.modal.modal_text = "Nuevo usuario";
          me.clearData();
          break;
        case 2:
          $("#user-modal").modal("show");
          me.modal.modal_text = "Editar usuario";
          me.clearData();
          me.queryAxiosGet("persons/find/" + id, 2);
          me.person_id = id;
          break;
        case 4:
          return me.disableUser(id);
          break;
        case 5:
          return me.enableUser(id);
          break;
        case 6:
          return me.deleteUser(id);
          break;
        default:
          break;
      }
    },
    clearData() {
      this.person_data = {
        names: "",
        surnames: "",
        email: "",
        total_amount: 10000
      };
      this.person_id = 0;
      this.resetValidate();
    },
    resetValidate(id) {
      if (id == 1) {
        $("#person_names").attr("class", "form-control");
        $("#person_surnames").attr("class", "form-control");
        $("#person_email").attr("class", "form-control");
        $("#person_total_amount").attr("class", "form-control");

        this.person_errors = {
          names: "",
          surnames: "",
          email: "",
          total_amount: ""
        };
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
  mounted() {
    this.getPersons(1, this.person_query.column, this.person_query.find);
  }
};
</script>

<style scoped>
.option-select-fontawesome {
  font-family: "FontAwesome", "Second Font name";
}
</style>
