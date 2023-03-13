/**
 * Load Badge Data 
 */
const loadBadgeData = () => {
  axios({
    url: `${window.baseURL}/admin/dashboard/data/badge`,
    method: 'GET'
  })
    .then(resultJson => {
      resultJson.data.forEach(row => {
        $('.data-badge-id-' + row.id).html(row.total);
      });
    })
    .catch(errorResponse => {
      handleErrorRequest(errorResponse);
    });
};

loadBadgeData();

const eventToday = () => {
  axios({
    url: `${window.baseURL}/admin/dashboard/data/event-today`,
    method: 'GET'
  })
    .then(resultJson => {
      let eventTodayHtml = ``;
      resultJson.data.forEach(item => {
        eventTodayHtml += `
        <div class="col-xl-3">
          <!-- card -->
          <div class="card card-h-100 rounded-25p bg-soft-light">
            <!-- card body -->
            <div class="card-body">
              <h6>${item.date_start_id} - ${item.date_end_id}</h6>
              <span class="text-sencodary"><i class="fas fa-map-marker-alt"></i> Lokasi Event</span>
              <h5 class="text-primary">${item.title}</h5>
              <span class="badge bg-primary p-2">${item.organizer.name}</span> <span class="badge bg-danger p-2"><i class="fas"></i> ${item.batch.name}</span><br>
              <hr>
              <strong><i class="fas fa-users"></i> Ter Verifikasi :</strong><br>
              <h4 class="text-info">${item.verified}</h4><hr>
              <strong><i class="fas fa-users"></i> Belum Ter Verifikasi :</strong><br>
              <h4 class="text-danger">${item.not_verified}</h4>
              <a href="admin/pd-seminar-registration/verification/${item.id}" class="btn btn-pink w-100 rounded-25p btn-sm mt-4"><i class="fas fa-arrow-alt-circle-right"></i> Detail</a>
            </div>
          </div>
          <!-- end card -->
        </div>`;
      });

      $('#event-today-container').html(eventTodayHtml);
    })
    .catch(errorResponse => {
      handleErrorRequest(errorResponse);
    });
};

eventToday();

const todayArhievement = () => {
  axios({
    url: `${window.baseURL}/admin/dashboard/data/archievement-today`,
    method: 'GET'
  })
    .then(resultJson => {
      let archievementHtml = ``;
      resultJson.data.forEach(item => {
        archievementHtml += `
        <div class="mt-2">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1 ms-3">
              <span class="p-sm-2 rounded-25p font-size-small" style="background-color:${item.color}; color:${item.text};"><i class="${item.icon}"></i> ${item.label}</span>
            </div>
            <div class="flex-shrink-0">
              <span class="badge rounded-pill badge-soft-success font-size-22 fw-medium">${item.total}</span>
            </div>
          </div>
        </div>`;
      });

      $('#archievement-container').html(archievementHtml);
    })
    .catch(errorResponse => {
      handleErrorRequest(errorResponse);
    })
};

todayArhievement();

const eventNext = () => {
  axios({
    url: `${window.baseURL}/admin/dashboard/data/event-next`,
    method: 'GET'
  })
    .then(resultJson => {
      let eventTodayHtml = ``;
      resultJson.data.forEach(item => {
        eventTodayHtml += `
        <div class="col-xl-3">
          <!-- card -->
          <div class="card card-h-100 rounded-25p bg-pink">
            <!-- card body -->
            <div class="card-body">
              <h6 class="text-white">${item.date_start_id} - ${item.date_end_id}</h6>
              <span class="text-white"><i class="fas fa-map-marker-alt"></i> Lokasi Event</span>
              <h5 class="text-warning">${item.title}</h5>
              <span class="badge bg-light p-2">${item.organizer.name}</span> <span class="badge bg-danger p-2"><i class="fas"></i> ${item.batch.name}</span><br>
              <hr>
              <strong class="text-white"><i class="fas fa-users"></i> Ter Verifikasi :</strong><br>
              <h4 class="text-warning">${item.verified}</h4><hr>
              <strong class="text-white"><i class="fas fa-users"></i> Belum Ter Verifikasi :</strong><br>
              <h4 class="text-warning">${item.not_verified}</h4>
              <a href="admin/pd-seminar-registration/verification/${item.id}" class="btn btn-warning w-100 rounded-25p btn-sm mt-4"><i class="fas fa-arrow-alt-circle-right"></i> Detail</a>
            </div>
          </div>
          <!-- end card -->
        </div>`;
      });

      $('#event-next-container').html(eventTodayHtml);
    })
    .catch(errorResponse => {
      handleErrorRequest(errorResponse);
    });
};

eventNext();

const userByProvince = () => {
  axios({
    url: `${window.baseURL}/admin/dashboard/data/user-by-province`,
    method: 'GET'
  })
    .then(resultJson => {
      let data = [];
      let categories = [];
      resultJson.data.forEach(item => {
        data.push(parseInt(item.total));
        categories.push(item.name);
      });

      var options = {
        series: [{
          name: 'Anggota Pandu',
          data: data
        }],
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },

        xaxis: {
          categories: categories,
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart-anggota"), options);
      chart.render();
    })
    .catch(errorResponse => {
      console.log(errorResponse);
      handleErrorRequest(errorResponse);
    });
}

userByProvince(); 