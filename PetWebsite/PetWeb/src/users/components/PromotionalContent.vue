<template>
  <div>
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        <img src="../assets/christmaspromo.png" style="width: 100%" />
        <div class="text"></div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="../assets/newproduct.png" style="width: 100%" />
        <div class="text"></div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
        <img src="../assets/featuredproduct.png" style="width: 100%" />
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="../assets/featuredproduct2.png" style="width: 100%" />
        
      </div>

      <a class="prev" @click="plusSlides(-1)">❮</a>
      <a class="next" @click="plusSlides(1)">❯</a>
    </div>
    <br />

    <div style="text-align:center">
      <span class="dot" @click="currentSlide(1)"></span>
      <span class="dot" @click="currentSlide(2)"></span>
      <span class="dot" @click="currentSlide(3)"></span>
      <span class="dot" @click="currentSlide(4)"></span>
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
    plusSlides(n) {
      this.showSlides((this.slideIndex += n));
    },
    currentSlide(n) {
      this.showSlides((this.slideIndex = n));
    },
    showSlides(n) {
      let i;
      let slides = this.$el.querySelectorAll(".mySlides");
      let dots = this.$el.querySelectorAll(".dot");
      if (n > slides.length) {
        this.slideIndex = 1;
      }
      if (n < 1) {
        this.slideIndex = slides.length;
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
      }
      slides[this.slideIndex - 1].style.display = "block";
      dots[this.slideIndex - 1].classList.add("active");
    },
  },
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}
body {
  font-family: Verdana, sans-serif;
  margin: 0;
}
.mySlides {
  display: none;
}
img {
  vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
  width: 100%; 
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: rgb(0, 0, 0);
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 138, 115, 0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #000000;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active,
.dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
  animation-fill-mode: forwards;
}

@keyframes fade {
  from {
    opacity: 0.4;
  }
  to {
    opacity: 1;
  }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev,
  .next,
  .text {
    font-size: 11px;
  }
}
</style>
