<template>
  <div class="sticky-top">
    <div class="search-box bg-light py-2 px-4">
        <button class="search-box-element btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
            <i class="bi bi-search">Toggle Search</i>
        </button>
        <div class="collapse show d-md-block" id="searchCollapse">
            <form id="find-pet-form">
                <!--search inputs-->
                <div class="row">
                    <div class="search-box-element col-md-2 form-group keyword-element-top-margin">
                        <!--<label for="animal-keyword" class="form-label">Animal Keyword</label>-->
                        <input type="text" class="form-control field-height" id="animal-keyword" name="animal-keyword" placeholder="Keyword">
                    </div>
                    <div class="search-box-element col-md-2 form-group">
                        <!--<label for="animal-type" class="form-label">Animal Type</label>-->
                        <select id="animal-type" name="animal-type" class="form-select field-height">
                            <option value="">Select Type</option>
                            <option value="1">Cat</option>
                            <option value="2">Dog</option>
                        </select>
                    </div>
                    <div class="search-box-element col-md-2 form-group">
                        
                        <select id="gender" name="gender" class="form-select field-height">
                            <option value="">Select Gender</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>
                    <div class="search-box-element col-md-2 form-group">
                        
                        <select id="size" name="size" class="form-select field-height">
                            <option value="">Select Size</option>
                            <option value="1">Small</option>
                            <option value="2">Medium</option>
                            <option value="3">Large</option>
                        </select>
                    </div>

                    <div class="search-box-element col-md-2 form-group">
                        
                        <select class="form-select field-height" id="state" name="state">
                            <option value="">Select State</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                            <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                            <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary field-height">Search</button>
                    </div>
                </div>               
            </form>
        </div> 
    </div>
  </div>
</template>
  
  <script>
  export default {
    data() {
      return {
        slideIndex: 1,
      };
    },
    mounted() {
      this.showSlides(this.slideIndex);
    },
    methods: {
     
    },
  };
  </script>
  
  <style scoped>
  /* Form  */
  .form-control,
  .form-select {
    font-size: 16px;
  }


  .field-height{
    height: 40px;
  }
  


  @media (max-width: 768px) {
    .search-box-element{
      margin-bottom: 8px;
      color: blue;
    }

    .search-box-element.btn-primary.d-md-none[data-bs-toggle="collapse"] {
      margin-top: 10px; /* Adjust the value as needed */
    }
  }
  </style>
  