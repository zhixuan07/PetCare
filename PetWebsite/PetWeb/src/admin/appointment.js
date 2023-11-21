import { ref } from "vue";
import axiosClient from "./axiosClient";

function Appointment (){
    const errors = ref("");
    const updateAppointmentStatus = async (appointment_id, status) => {
        console.log(appointment_id, status)
        try {
            await axiosClient.post(`/admin/updateService/${appointment_id}`, {
                status: status,
            });
            alert("Appointment updated");
            location.reload();
        } catch (error) {
            if (error.response && error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value += error.response.data.errors[key][0] + " ";
                }
            }
        }
    };
    const cancelAppointment = async (appointment_id) => {
        try {
            await axiosClient.post(`/admin/cancelService/${appointment_id}`);
            alert("Appointment canceled");
            location.reload();
        } catch (error) {
            if (error.response && error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value += error.response.data.errors[key][0] + " ";
                }
            }
        }
    };

    return { updateAppointmentStatus, cancelAppointment, errors };
}
export default Appointment;