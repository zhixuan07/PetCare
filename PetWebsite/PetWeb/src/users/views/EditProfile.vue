<template>
    <!-- Header Component -->
    <Header />

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <form id="editprofile-form" @submit.prevent="updateUserProfile">
                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" v-model="user.name" class="form-control" id="username" name="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Address</label>
                                <input type="text" v-model="user.address" class="form-control" placeholder="Enter Address" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" v-model="user.email" disabled class="form-control"  placeholder="Enter email" required> 
                            </div>
                            <div class="mb-3">
                                <label for="contacts" class="form-label">Contacts</label>
                                <input type="text" v-model="user.contact" class="form-control" placeholder="Enter contacts" required>
                            </div>
                            
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3 text-center">
        <router-link to="/userprofile">
            <button class="btn btn-link">Back to Profile</button>
        </router-link>
    </div>

    <!-- Footer Component -->
    <Footer />
</template>

<script setup>
  import Header from '../components/Header.vue';
  import Footer from '../components/Footer.vue';
  import { ref,onMounted } from 'vue';
  import { useUserStore } from '../stores/user';
  import { useRouter } from 'vue-router';
  const router = useRouter();
  const userString =localStorage.getItem('user');
  const user = ref(JSON.parse(userString));
  const store = useUserStore();
  const updateUserProfile = async () => {
  try {
    if (user.value && user.value.id) {
 
      await store.updateUserProfile(user.value, user.value.id);
      localStorage.setItem('user', JSON.stringify(user.value));
        router.push('/userprofile');
    } else {
      console.error('User or user ID not found.');
    }
  } catch (error) {
    console.error('Error updating user profile:', error.message);
  }
};

  const profile ={
    name: '',
    email: '',
    address: '',
    contact: '',
  }
  
  
</script>