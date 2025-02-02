<script setup>
import { useRouter } from "vue-router";
import { ref, reactive, onMounted } from "vue";
import api from "../../../api";
// import { me } from "../../me";

const router = useRouter();
// const { userMe } = me(router);

// initApi(router); // Initialize the API with the router

let users = ref([]);
let links = ref([]);
let activePage = ref(1);
let lastPage = ref(1);
let statusArray = ref([]);

const form = reactive({
  id: "",
  tb_name: "",
  status: "",
  field_name: "",
});

onMounted( () => {
  getUsers();
});

const getUsers = async () => {
  let response = await api.get(`/auth/users?page=${activePage.value}`)
    .then((response) => {
      lastPage.value = response.data.result.last_page;
      users.value = response.data.result.data;
      statusArray.value = response.data.result.data.map((item) => item.status);

      links.value = response.data.result.links;
    });
};

const changePage = (link) => {
  console.log(link);
  if (!link.url || link.active) {
    return;
  }

  activePage.value = link.label;

  api.value.get(link.url).then((response) => {
    users.value = response.data.result.data;
    links.value = response.data.result.links;
  });
};

const changeStatus = (index, event, id, tb_name, field_name) => {
  let changedStatus = event.target.checked;
  statusArray.value[index] = changedStatus; // Update the checked state for the specific checkbox

  form.id = id;
  form.tb_name = tb_name;
  form.status = changedStatus;
  form.field_name = field_name;

  api.value.post("/auth/change-status", form).then((response) => {
    getUsers(activePage.value);

    toast.fire({
      icon: "success",
      title: "Գործողությունը հաջողությամբ կատարված է",
    });
  });
};

const deleteItem = (id, tb_name) => {
  const newUrl = `/auth/delete-item/${tb_name}/${id}`;

  Swal.fire({
    title: "Դուք համոզված եք?",
    // text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    cancelButtonText: "Ոչ",
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Այո",
  }).then((result) => {
    if (result.isConfirmed) {
      api.value.get(newUrl).then((response) => {
        if (response.data.result == 1) {
          Swal.fire({
            // title: "Ջնջված է",
            text: "Ձեր գրառումը բարեհաջող ջնջվել է",
            // icon: "success",
            confirmButtonText: "Լավ",
            //   // dont work css
            customClass: {
              icon: "small-icon", // Add custom class for the icon
            },
          });
          getUsers();
        }
      });
    }
  });
};
</script>



<template>

  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Tables /</span> Basic Tables
        </h4>

        <!-- Bordered Table -->
        <div class="card">
            <h5 class="card-header">Bordered Table</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users">
                                <td>
                                    {{ ++index }}
                                </td>
                                <td>{{ user.name }}</td>
                                <td>
                                    <ul
                                    class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"
                                    >
                                    <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar avatar-xs pull-up"
                                        title="Lilian Fuller"
                                    >
                                        <img
                                        src="../assets/img/avatars/5.png"
                                        alt="Avatar"
                                        class="rounded-circle"
                                        />
                                    </li>
                                    <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar avatar-xs pull-up"
                                        title="Sophia Wilkerson"
                                    >
                                        <img
                                        src="../assets/img/avatars/6.png"
                                        alt="Avatar"
                                        class="rounded-circle"
                                        />
                                    </li>
                                    <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar avatar-xs pull-up"
                                        title="Christina Parker"
                                    >
                                        <img
                                        src="../assets/img/avatars/7.png"
                                        alt="Avatar"
                                        class="rounded-circle"
                                        />
                                    </li>
                                    </ul>
                                </td>
                                <td>
                                    <span class="badge bg-label-primary me-1">Active</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                    <button
                                        type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"
                                    >
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                    </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- <nav aria-label="" v-if="lastPage > 1" class="d-flex justify-content-end">
                                <ul class="pagination">
                                    <li class="page-item "
                                        v-for="(link,index) in links"
                                        :key="index"
                                        :class="{active: link.active,disabled:!link.url }"
                                        @click="changePage(link)"
                                    >
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true" v-html="link.label"></a>
                                    </li>

                                </ul>
                            </nav> -->

                </div>
            </div>
        </div>
        <!--/ Bordered Table -->
    </div>
  </div>
</template>

