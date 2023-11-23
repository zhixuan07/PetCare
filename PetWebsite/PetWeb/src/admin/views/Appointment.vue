<script setup>
import { ref, onMounted,watch } from "vue";
import axiosClient from "../axiosClient";
import { useRouter } from "vue-router";
import updateAppointmentModal from "../components/updateAppointmentModal.vue";
import Appointment from "../appointment";
const {cancelAppointment} = Appointment();
const services = ref([]);
const serviceInfo = ref([]);
const openModal = ref(false);
const searchInput = ref("");

onMounted(async () => {
    await axiosClient.get("/services").then((response) => {
        services.value = response.data.services;
    });
});


const openUpdateAppointmentModal = (service) => {
    serviceInfo.value = service;
    console.log(serviceInfo.value);
    openModal.value = true;
};

const closeUpdateAppointmentModal = () => {
    openModal.value = false;
};
const deleteAppointment = async (id) => {
    cancelAppointment(id);
};
watch(searchInput, (value) => {
    if (value === "") {
        axiosClient.get("/services").then((response) => {
            services.value = response.data.services;
        });
    } else {
        services.value = services.value.filter((service) => {
            return service.Name.toLowerCase().includes(value.toLowerCase());
        });
        console.log(services.value);
    }
});
</script>

<template>
    <div class="overflow-x-auto overflow-y-auto border-gray-200 flex flex-col">
        <div
            class="flex flex-row sm:flex-col justify-between p-10 items-center"
        >
            <h1 class="text-2xl text-black">services</h1>
            <p class="font-light text-sm">Pet Admin > Appointment</p>
        </div>
        <div class="flex flex-row md:flex-col justify-end mr-4 mb-2">
            <input
                type="text"
                placeholder="Search appointment"
                class="border-2 border-gray-300 py-2 px-4 rounded-lg"
                v-model="searchInput"
            />
        </div>
        <table
            class="table-auto bg-white border-collapse border-r-2 border-l-2 border-gray-100 ml-2 mr-2"
        >
            <thead>
                <tr class="text-xs w-full text-center">
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        ID
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        Name
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        Type of Service
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        Date
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        Time
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                    Type of Pet
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                        Number of Pet
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                       Status
                    </th>
                    <th
                        class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100"
                    >
                       Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="service in services" :key="service[i]" class="text-xs">
                    <td
                        class="border py-2 px-4 border-gray-200 underline"
                        
                    >
                        {{ service.id }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Name}}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Type_service }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Date }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Time }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Type_pet }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Number_of_pet }}
                    </td>
                    <td class="border py-2 px-4 border-gray-200">
                        {{ service.Status}}
                    </td>


                    <td
                        class="border border-gray-200 py-2 px-4"
                        v-if="
                            service.Status !== 'Cancelled' &&
                            service.Status !== 'Completed'
                        "
                    >
                        <button
                            class="bg-orange-600 rounded-lg h-10 w-20 m-1 text-white hover:bg-orange-500"
                            @click="openUpdateAppointmentModal(service)"
                        >
                            Update Appointment
                        </button>
                        <button
                            class="bg-red-600 rounded-lg h-10 w-20 m-1 text-white hover:bg-red-500"
                            @click="deleteAppointment(service.id)"
                        >
                            Cancel Appointment
                        </button>
                    </td>
                    <td v-else class="border border-gray-200 py-2 px-4">
                        No action
                    </td>
                </tr>
                <p v-if="!services.values">Product Not Found</p>
            </tbody>
        </table>
        <Teleport to="body">
            <div
                v-if="openModal"
                class="fixed inset-0 flex items-center justify-center h-full bg-gray-400 bg-opacity-50"
            >
                <updateAppointmentModal
                    @close="closeUpdateAppointmentModal"
                    :service_id="serviceInfo.id"
                />
            </div>
        </Teleport>
    </div>
</template>
