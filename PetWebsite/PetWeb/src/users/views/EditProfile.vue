<template>
    <!-- Header Component -->
    <Header />

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <form id="editprofile-form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label for="contacts" class="form-label">Contacts</label>
                                <input type="text" class="form-control" id="contacts" name="contacts" placeholder="Enter contacts" required>
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

<script>
  import Header from '../components/Header.vue';
  import Footer from '../components/Footer.vue';
  
  export default {
    components: {
      Header,
      Footer,
    },
    methods: {
      
    },
  };
</script>