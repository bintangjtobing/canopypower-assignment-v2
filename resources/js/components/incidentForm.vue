<template>
  <div>
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="breadcrumb-main user-incidents justify-content-sm-between ">
          <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
            <div class="d-flex align-items-center user-incidents__title justify-content-center mr-sm-25">
              <h4 class="text-capitalize fw-500 breadcrumb-title">Incident overview</h4>
            </div>
          </div>
          <div class="action-btn btn-group atbd-button-group btn-group-normal">
            <button @click="refreshData" class="btn p-10 btn-outline-success">
              <i class="fas fa-sync"></i></button>
            <a href="/generatepdf" class="btn p-10 btn-outline-primary">
              <i class="fas fa-download"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="userDatatable global-shadow border p-30 bg-white radius-xl w-100 mb-30">
          <div class="table-responsive">
            <table class="table mb-0 table-borderless">
              <thead>
                <tr class="userDatatable-header">
                  <th>
                    <span class="userDatatable-title">ID</span>
                  </th>
                  <th>
                    <span class="userDatatable-title">Severity</span>
                  </th>
                  <th>
                    <span class="userDatatable-title">Category</span>
                  </th>
                  <th>
                    <span class="userDatatable-title">Device(s)</span>
                  </th>
                  <th>
                    <span class="userDatatable-title">Name</span>
                  </th>
                  <th>
                    <span class="userDatatable-title">Stop Time</span>
                  </th>
                  <th style='text-align:center;'>
                    <span class="userDatatable-title">status</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="!incident.length">
                  <td colspan="7">
                    <div class="atbd-empty text-center">
                      <div class="atbd-empty__image">
                        <img src="/dashboard/img/folders/1.svg" alt="Admin Empty">
                      </div>
                      <div class="atbd-empty__text">
                        <p class="">No Data</p>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr v-for="incidents in incident" :key="incidents.id">
                  <td>
                    <div class="d-flex">
                      <div class="userDatatable-inline-title">
                        <a href="#" class="text-dark fw-500">
                          <h6>{{incidents.id}}</h6>
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="userDatatable-content">
                      {{incidents.severity}}
                    </div>
                  </td>
                  <td>
                    <div class="userDatatable-content">
                      {{incidents.category}}
                    </div>
                  </td>
                  <td>
                    <div class="userDatatable-content">
                      {{incidents.devices}}
                    </div>
                  </td>
                  <td>
                    <div class="userDatatable-content">
                      {{incidents.title}}
                    </div>
                  </td>
                  <td>
                    <div class="userDatatable-content">
                      {{incidents.stoptime}}
                    </div>
                  </td>

                  <td style='text-align:center;'>
                    <div class="userDatatable-content d-inline-block">
                      <div v-if="incidents.status==1">
                        <span class="rounded-pill userDatatable-content-status color-success
                                                bg-opacity-success active"><i class="fas fa-check"></i>
                          &nbsp;Solved</span>
                      </div>
                      <div v-if="incidents.status==0">
                        <span class="rounded-pill userDatatable-content-status color-warning
                                                bg-opacity-warning active"><i class="fas fa-exclamation"></i>
                          &nbsp;Unresolved</span>
                      </div>
                      <div v-if="incidents.status==2">
                        <span class="rounded-pill userDatatable-content-status color-danger
                                                bg-opacity-danger active"><i class="fas fa-lock"></i>
                          &nbsp;Terminated</span>
                      </div>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import Swal from 'sweetalert2';
  export default {
    title() {
      return 'Incident Overview';
    },
    data() {
      return {
        incident: {},
      }
    },
    created() {
      this.loadDataIncident();
    },
    methods: {
      async loadDataIncident() {
        const resp = await axios.get('/api/incident');
        this.incident = resp.data;
      },
      refreshData() {
        this.loadDataIncident();
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Success refreshed data.',
        });
      },
    },
  }
</script>