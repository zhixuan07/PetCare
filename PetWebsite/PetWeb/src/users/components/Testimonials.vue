<template>
  <section class="testimonials">
    <h2 class="testimonials-header">Testimonials</h2>
    <h1 class="caption">What Customers Say</h1>
    <div class="testimonial">
      <div class="testimonial-card">
        <img src="../assets/girl.jpg" alt="John Doe" class="testimonial-image" />
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
        <p><strong>John Doe</strong></p>
      </div>
    </div>
    <div class="testimonial">
      <div class="testimonial-card">
        <img src="../assets/guy.jpg" alt="Jane Smith" class="testimonial-image" />
        <p>"Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
        <p><strong>Jane Smith</strong></p>
      </div>
    </div>
    <!-- Add more testimonials as needed -->
  </section>
</template>

<style scoped>
/* Add your testimonials styles here */
.testimonials {
  text-align: center;
}

.testimonials-header {
  font-weight: bold;
  color: #007f5f; /* Emerald green color */
  font-size: 24px; /* Adjust the font size as needed */
}

.testimonial {
  display: inline-block;
  margin: 20px; /* Adjust the space between testimonials */
  text-align: center;
}

.testimonial-card {
  background-color: #fff; /* White background */
  border: 1px solid #ccc; /* Border for the card */
  padding: 20px;
  border-radius: 8px; /* Rounded corners */
  width: 300px; /* Adjust the card width as needed */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Box shadow for card */
}

.testimonial-image {
  width: 100px; /* Adjust the image size as needed */
  height: 100px; /* Adjust the image size as needed */
  border-radius: 50%; /* Rounded image */
  margin: 0 auto 10px; /* Center image and add space below */
  object-fit: cover;

}

</style>
