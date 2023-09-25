import { ref } from "vue";
import axiosClient from './axiosClient'

function Product(){
    const errors = ref("");
    const addProduct = async (product) => {
        errors.value = "";
    
        try {
          await axiosClient.post("/products/add", product);
          alert("Product Added");
          location.reload()
        } catch (error) {
          if (error.response && error.response.status === 422) {
            for (const key in error.response.data.errors) {
              errors.value += error.response.data.errors[key][0] + " ";
            }
            console.log('SKU already exists')
          }
        }
      };

    const deleteProduct = async(id) =>{
        try{
            await axiosClient.delete(`products/${id}`)
            alert("Product deleted")
            location.reload()
        }catch (error) {
            if (error.response && error.response.status === 422) {
              for (const key in error.response.data.errors) {
                errors.value += error.response.data.errors[key][0] + " ";
              }
            }
          }
       
    };

    const updateProduct = async(id,product) =>{
        try{
            await axiosClient.post(`products/update/${id}`,product)
            alert("Product updated")
            location.reload()
        }catch (error) {
            if (error.response && error.response.status === 422) {
              for (const key in error.response.data.errors) {
                errors.value += error.response.data.errors[key][0] + " ";
              }
            }
          }
    };

 return{addProduct,deleteProduct,updateProduct}
}
export default Product;