import { ref } from "vue";
import axiosClient from "./axiosClient";

function Order() {
    const errors = ref("");
    const updateOrderStatus = async (order_id, status) => {
        try {
            await axiosClient.post(`/admin/updateOrder/${order_id}`, {
                status: status,
            });
            alert("Order updated");
            location.reload();
        } catch (error) {
            if (error.response && error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value += error.response.data.errors[key][0] + " ";
                }
            }
        }
    };

    const deleteOrder = async (order_id) => {
        try {
            await axiosClient.patch(`/admin/deleteOrder/${order_id}`);
            alert("Order deleted");
            location.reload();
        } catch (error) {
            if (error.response && error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors.value += error.response.data.errors[key][0] + " ";
                }
            }
        }
    };

    return { updateOrderStatus, deleteOrder };
}

export default Order;
