<template>
  <footer class="footer">
    <div class="contact-info">
      <h3>Contact Information</h3>
      <p>Address: 123 Pet Street, City, Zip Code</p>
      <p>Phone: +1 (123) 456-7890</p>
      <p>Email: info@petcare.com</p>
    </div>

    <div class="quick-links">
      <h3>Quick Links</h3>
      <p><router-link to="/faq">FAQ</router-link></p>
      <p><router-link to="/about">About Us</router-link></p>
      <p><router-link to="/contact">Contact</router-link></p>
    </div>

    <div class="social-media">
      <h3>Follow Us</h3>
      <a href="#" class="social-icon"><i class="fab fa-facebook"></i> Facebook</a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
      <!-- Add more social media icons as needed -->
    </div>

    <div class="copyright">
      <p>&copy; 2023 PetCare. All rights reserved.</p>
    </div>
  </footer>
</template>

<style scoped>
/* Footer styles */
.footer {
  background-color: #333;
  color: #fff;
  padding: 30px 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

/* Contact Information styles */
.contact-info, .quick-links, .social-media, .copyright {
  flex: 1;
  max-width: 300px;
  margin: 10px;
  padding: 10px;
}

.contact-info h3, .quick-links h3, .social-media h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

.contact-info p, .quick-links a, .social-media a, .copyright p {
  font-size: 16px;
  margin: 5px 0;
}

/* Social Media Icon styles (assuming you're using Font Awesome) */
.social-icon {
  text-decoration: none;
  color: #fff;
  display: block;
  margin-bottom: 5px;
}

.social-icon i {
  margin-right: 5px;
}

.social-icon:hover {
  text-decoration: underline;
}
</style>
