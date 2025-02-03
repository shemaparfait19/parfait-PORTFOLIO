  <!DOCTYPE html>

  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
      />

      <title>Parfait | Designer & Web Developer Portfolio</title>

      <!-- Essential CDNs -->

      <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
      <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
      />
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      />

      <style>
        /* Base Styles */
        * {
          scroll-behavior: smooth;
          font-family: "Poppins", sans-serif;
        }

        /* Mobile Menu Styles */
        .mobile-menu {
          transform: translateX(-100%);
          transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.active {
          transform: translateX(0);
        }

        /* Responsive Typography */
        @media (max-width: 640px) {
          h1 {
            font-size: 2.5rem !important;
          }
          h2 {
            font-size: 2rem !important;
          }
          h3 {
            font-size: 1.5rem !important;
          }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
          width: 8px;
        }

        ::-webkit-scrollbar-track {
          background: #1a1f2d;
        }

        ::-webkit-scrollbar-thumb {
          background: #3b82f6;
          border-radius: 4px;
        }

        /* Animated Background */
        .animated-bg {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: -1;
          opacity: 0.1;
        }

        /* Floating Elements Animation */
        .float {
          animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
          0% {
            transform: translateY(0px);
          }
          50% {
            transform: translateY(-20px);
          }
          100% {
            transform: translateY(0px);
          }
        }

        /* Glitch Effect */
        .glitch {
          position: relative;
        }

        .glitch::before,
        .glitch::after {
          content: attr(data-text);
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
        }

        .glitch::before {
          left: 2px;
          text-shadow: -2px 0 #ff00c1;
          animation: glitch-1 2s infinite linear alternate-reverse;
        }

        .glitch::after {
          left: -2px;
          text-shadow: 2px 0 #00fff9;
          animation: glitch-2 3s infinite linear alternate-reverse;
        }

        @keyframes glitch-1 {
          0% {
            clip: rect(20px, 1000px, 51px, 0);
          }
          50% {
            clip: rect(40px, 1000px, 70px, 0);
          }
          100% {
            clip: rect(60px, 1000px, 95px, 0);
          }
        }

        @keyframes glitch-2 {
          0% {
            clip: rect(30px, 1000px, 65px, 0);
          }
          50% {
            clip: rect(50px, 1000px, 85px, 0);
          }
          100% {
            clip: rect(70px, 1000px, 105px, 0);
          }
        }
      </style>
    </head>
    <body class="bg-[#0f172a] font-[Poppins] text-white">
      <canvas id="animatedBg" class="animated-bg"></canvas>
      <div id="app">
        <!-- Navbar -->
        <nav class="fixed w-full backdrop-blur-md bg-white/10 z-50">
          <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
              <a href="#" class="text-2xl font-bold"
                >Par<span class="text-blue-500">fait</span></a
              >

              <!-- Desktop Menu -->
              <div class="hidden md:flex space-x-8">
                <a
                  href="#home"
                  class="text-gray-300 hover:text-blue-500 transition-colors duration-300"
                  >Home</a
                >
                <a
                  href="#about"
                  class="text-gray-300 hover:text-blue-500 transition-colors duration-300"
                  >About</a
                >
                <a
                  href="#services"
                  class="text-gray-300 hover:text-blue-500 transition-colors duration-300"
                  >Services</a
                >
                <a
                  href="#portfolio"
                  class="text-gray-300 hover:text-blue-500 transition-colors duration-300"
                  >Portfolio</a
                >
                <a
                  href="#contact"
                  class="text-gray-300 hover:text-blue-500 transition-colors duration-300"
                  >Contact</a
                >
              </div>

              <!-- Mobile Menu Button -->
              <button @click="toggleMenu" class="md:hidden text-white p-2">
                <i
                  :class="isMenuOpen ? 'fas fa-times' : 'fas fa-bars'"
                  class="text-2xl"
                ></i>
              </button>
            </div>
          </div>

          <!-- Mobile Menu -->
          <div
            v-show="isMenuOpen"
            class="md:hidden absolute top-16 left-0 right-0 bg-[#1a1f2d] py-4 px-4"
          >
            <a
              href="#home"
              @click="closeMenu"
              class="block py-2 text-gray-300 hover:text-blue-500"
              >Home</a
            >
            <a
              href="#about"
              @click="closeMenu"
              class="block py-2 text-gray-300 hover:text-blue-500"
              >About</a
            >
            <a
              href="#services"
              @click="closeMenu"
              class="block py-2 text-gray-300 hover:text-blue-500"
              >Services</a
            >
            <a
              href="#portfolio"
              @click="closeMenu"
              class="block py-2 text-gray-300 hover:text-blue-500"
              >Portfolio</a
            >
            <a
              href="#contact"
              @click="closeMenu"
              class="block py-2 text-gray-300 hover:text-blue-500"
              >Contact</a
            >
          </div>
        </nav>

        <!-- Hero Section -->
        <section
          id="home"
          class="min-h-screen flex items-center relative overflow-hidden"
        >
          <div
            class="absolute w-96 h-96 bg-blue-500 rounded-full filter blur-3xl opacity-20 -top-10 -left-10"
          ></div>
          <div
            class="absolute w-96 h-96 bg-purple-500 rounded-full filter blur-3xl opacity-20 -bottom-10 -right-10"
          ></div>

          <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto">
              <h1
                data-aos="fade-up"
                class="text-5xl font-bold mb-6 glitch"
                data-text="Hi, I'm Parfait, a Creative Designer & Web Developer"
              >
                Hi, I'm Parfait, a Creative Designer & Web Developer
              </h1>
              <p
                data-aos="fade-up"
                data-aos-delay="100"
                class="text-gray-400 text-lg mb-8"
              >
                I specialize in creating stunning designs and developing
                functional, user-friendly web applications.
              </p>
              <div
                data-aos="fade-up"
                data-aos-delay="200"
                class="flex justify-center gap-4"
              >
                <a
                  href="#portfolio"
                  class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                >
                  Explore My Work
                </a>
                <a
                  href="#contact"
                  class="px-8 py-3 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition-colors"
                >
                  Get in Touch
                </a>
              </div>
            </div>
          </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 relative overflow-hidden">
          <!-- Animated Background -->
          <div
            class="absolute w-96 h-96 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-full filter blur-3xl opacity-20 animate-pulse -top-10 right-0"
          ></div>
          <div
            class="absolute w-96 h-96 bg-gradient-to-l from-blue-500/20 to-purple-500/20 rounded-full filter blur-3xl opacity-20 animate-pulse bottom-0 -left-20"
          ></div>

          <div class="container mx-auto px-4">
            <h2 data-aos="fade-up" class="text-4xl font-bold text-center mb-16">
              About <span class="text-blue-500">Me</span>
            </h2>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
              <!-- Left Column - Image and Cards -->
              <div data-aos="fade-right" class="relative">
                <div class="relative w-full max-w-md mx-auto mb-20">
                  <div
                    class="aspect-square rounded-2xl overflow-hidden shadow-2xl border-4 border-blue-500/20"
                  >
                    <img
                      src="https://i.imgur.com/J0seEo4.jpeg"
                      alt="Parfait"
                      class="w-full h-full object-cover"
                    />
                  </div>

                  <!-- Floating Cards -->
                  <div
                    class="absolute -bottom-10 -right-10 bg-[#1a1f2d] p-6 rounded-2xl shadow-xl border border-blue-500/20 backdrop-blur-sm"
                  >
                    <div class="grid grid-cols-2 gap-6">
                      <div class="text-center">
                        <h4
                          class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent"
                        >
                          2+
                        </h4>
                        <p class="text-gray-400 text-sm mt-1">Years Experience</p>
                      </div>
                      <div class="text-center">
                        <h4
                          class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent"
                        >
                          20+
                        </h4>
                        <p class="text-gray-400 text-sm mt-1">Projects Done</p>
                      </div>
                    </div>
                  </div>

                  <!-- Floating Technologies -->
                  <div
                    class="absolute -left-10 top-1/2 transform -translate-y-1/2 bg-[#1a1f2d] p-4 rounded-2xl shadow-xl border border-blue-500/20 backdrop-blur-sm"
                  >
                    <div class="space-y-3">
                      <div class="flex items-center gap-2">
                        <i class="fab fa-laravel text-red-500 text-xl"></i>
                        <span class="text-gray-400">Laravel</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <i class="fab fa-vuejs text-green-500 text-xl"></i>
                        <span class="text-gray-400">Vue.js</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <i class="fab fa-js text-yellow-500 text-xl"></i>
                        <span class="text-gray-400">JavaScript</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Right Column - Content -->
              <div data-aos="fade-left" class="space-y-8">
                <!-- Bio Section -->
                <div class="space-y-4">
                  <h3 class="text-2xl font-bold text-blue-500">
                    Web Developer & Graphic Designer
                  </h3>
                  <p class="text-gray-400 leading-relaxed">
                    Hello! I'm Parfait, a passionate web developer based in
                    Rwanda. I specialize in creating beautiful and
                    functional websites that deliver exceptional user experiences.
                  </p>
                  <p class="text-gray-400 leading-relaxed">
                    With expertise in Laravel, Vue.js, and modern design tools, I
                    transform ideas into reality through clean code and stunning
                    visuals.
                  </p>
                </div>

                <!-- Skills Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                  <!-- Development Skills -->
                  <div class="bg-[#1a1f2d] p-4 rounded-xl border border-blue-500/20">
                    <h4 class="font-semibold mb-3">Development</h4>
                    <div class="space-y-2">
                      <div class="flex items-center gap-2">
                        <i class="fab fa-laravel text-red-500"></i>
                        <span class="text-gray-400">Back-End</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <i class="fab fa-vuejs text-green-500"></i>
                        <span class="text-gray-400">Front-End</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <i class="fab fa-js text-yellow-500"></i>
                        <span class="text-gray-400">APIs</span>
                      </div>
                      <div class="flex items-center gap-2">
                        <i class="fab fa-css3 text-blue-500"></i>
                        <span class="text-gray-400">And Much More</span>
                      </div>
                    </div>
                  </div>

                  <!-- Design Skills -->
                  <div
                    class="bg-[#1a1f2d] p-4 rounded-xl border border-blue-500/20"
                  >
                    <h4 class="font-semibold mb-3">Design</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                      <li>• Figma</li>
                      <li>• Photoshop</li>
                      <li>• Illustrator</li>
                      <li>• After Effects</li>
                      <li>• UI/UX Design</li>
                    </ul>
                  </div>

                  <!-- Tools -->
                  <div
                    class="bg-[#1a1f2d] p-4 rounded-xl border border-blue-500/20"
                  >
                    <h4 class="font-semibold mb-3">Tools</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                      <li>• Git & GitHub</li>
                      <li>• VS Code</li>
                      <li>• Terminal</li>
                      <li>• Responsive Design</li>
                    </ul>
                  </div>
                </div>

                <!-- Call to Action -->
                <div class="flex flex-wrap gap-4 pt-6">
                  <a
                    href="#portfolio"
                    class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105"
                  >
                    View My Work
                  </a>
                  <a
                    href="https://wa.me/250787844326"
                    target="_blank"
                    class="px-6 py-3 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300 transform hover:scale-105"
                  >
                    Let's Talk
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 bg-gray-900">
          <div class="container mx-auto px-4">
            <h2 data-aos="fade-up" class="text-3xl font-bold text-center mb-16">
              My Services
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
              <!-- Web Design Service -->
              <div
                data-aos="fade-up"
                class="bg-[#1a1f2d] p-6 rounded-xl hover:transform hover:scale-105 transition-all duration-300"
              >
                <div class="text-blue-500 text-4xl mb-4">
                  <i class="fas fa-paint-brush"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Web Design</h3>
                <p class="text-gray-400">
                  Creating responsive and creative website layouts that capture
                  your brand's essence.
                </p>
              </div>

              <!-- Web Development Service -->
              <div
                data-aos="fade-up"
                data-aos-delay="100"
                class="bg-[#1a1f2d] p-6 rounded-xl hover:transform hover:scale-105 transition-all duration-300"
              >
                <div class="text-blue-500 text-4xl mb-4">
                  <i class="fas fa-code"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Web Development</h3>
                <p class="text-gray-400">
                  Building user-friendly web applications using modern
                  technologies.
                </p>
              </div>

              <!-- Graphic Design Service -->
              <div
                data-aos="fade-up"
                data-aos-delay="200"
                class="bg-[#1a1f2d] p-6 rounded-xl hover:transform hover:scale-105 transition-all duration-300"
              >
                <div class="text-blue-500 text-4xl mb-4">
                  <i class="fas fa-pencil-ruler"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Graphic Design</h3>
                <p class="text-gray-400">
                  Creating stunning logos, banners, posters, infographics and complete branding
                  solutions.
                </p>
              </div>

              <!-- AI Solutions Service -->
              <div
                data-aos="fade-up"
                data-aos-delay="300"
                class="bg-[#1a1f2d] p-6 rounded-xl hover:transform hover:scale-105 transition-all duration-300"
              >
                <div class="text-blue-500 text-4xl mb-4">
                  <i class="fas fa-robot"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">AI-Driven Solutions</h3>
                <p class="text-gray-400">
                  Implementing AI tools for content creation and business
                  automation.
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="py-20">
          <div class="container mx-auto px-4">
            <h2 data-aos="fade-up" class="text-3xl font-bold text-center mb-16">
              Recent Works
            </h2>

            <!-- Portfolio Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
              @foreach($parfaits as $parfait)
              <!-- Project 1 -->
              <div
                data-aos="fade-up"
                class="group relative overflow-hidden rounded-xl bg-[#1a1f2d]"
              >
                <img
                  src="{{ $parfait->image }}"
                  alt="{{ $parfait->title }}"
                  data-category="Web Development"
                  class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500"
                  loading="lazy"
                  onerror="handleImageError(this)"
                />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"
                >
                  <div class="absolute bottom-0 p-6">
                    <h3 class="text-xl font-semibold text-white">
                      {{ $parfait->title }}
                    </h3>
                    <p class="text-gray-300 mt-2">{{ $parfait->description }}</p>
                    <div class="mt-4 flex space-x-4">
                      <a href="{{ $parfait->live_link }}" class="text-white hover:text-blue-500">
                        <i class="fas fa-link"></i>
                      </a>
                      <a href="{{ $parfait->github_link }}" class="text-white hover:text-blue-500">
                        <i class="fab fa-github"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gray-900">
          <div class="container mx-auto px-4">
            <h2 data-aos="fade-up" class="text-3xl font-bold text-center mb-16">
              Let's Connect
            </h2>

            <div class="grid md:grid-cols-2 gap-12">
              <!-- Contact Information -->
              <div data-aos="fade-right" class="space-y-8">
                <!-- Email Contact -->
                <div
                  class="flex items-center space-x-4 hover:transform hover:translate-x-2 transition-all duration-300"
                >
                  <div
                    class="w-12 h-12 bg-blue-500/10 rounded-full flex items-center justify-center"
                  >
                    <i class="fas fa-envelope text-blue-500 text-xl"></i>
                  </div>
                  <div>
                    <h3 class="text-lg font-semibold">Email</h3>
                    <a
                      href="mailto:ivancyusa1@gmail.com"
                      class="text-gray-400 hover:text-blue-500 transition-colors"
                    >
                      ivancyusa1@gmail.com
                    </a>
                  </div>
                </div>

                <!-- WhatsApp Contact -->
                <div
                  class="flex items-center space-x-4 hover:transform hover:translate-x-2 transition-all duration-300"
                >
                  <div
                    class="w-12 h-12 bg-green-500/10 rounded-full flex items-center justify-center"
                  >
                    <i class="fab fa-whatsapp text-green-500 text-2xl"></i>
                  </div>
                  <div>
                    <h3 class="text-lg font-semibold">WhatsApp</h3>
                    <a
                      href="https://wa.me/250787844326"
                      target="_blank"
                      class="text-gray-400 hover:text-green-500 transition-colors"
                    >
                      +250 787 844 326
                    </a>
                  </div>
                </div>

                <!-- Location -->
                <div
                  class="flex items-center space-x-4 hover:transform hover:translate-x-2 transition-all duration-300"
                >
                  <div
                    class="w-12 h-12 bg-purple-500/10 rounded-full flex items-center justify-center"
                  >
                    <i class="fas fa-map-marker-alt text-purple-500 text-xl"></i>
                  </div>
                  <div>
                    <h3 class="text-lg font-semibold">Location</h3>
                    <p class="text-gray-400">Kigali, Rwanda</p>
                  </div>
                </div>

                <!-- Social Media Links -->
                <div class="pt-8">
                  <h3 class="text-lg font-semibold mb-4">Follow Me</h3>
                  <div class="flex space-x-4">
                    <a
                      href="#"
                      class="w-10 h-10 bg-blue-500/10 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors group"
                    >
                      <i
                        class="fab fa-linkedin-in text-blue-500 group-hover:text-white"
                      ></i>
                    </a>
                    <a
                      href="#"
                      class="w-10 h-10 bg-gray-700/10 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors group"
                    >
                      <i
                        class="fab fa-github text-gray-400 group-hover:text-white"
                      ></i>
                    </a>
                    <a
                    href="https://www.pinterest.com/shemaParfait_/"
                    class="w-10 h-10 bg-gray-700/10 rounded-full flex items-center justify-center hover:bg-gray-700 transition-colors group"
                  >
                    <i
                      class="fab fa-pinterest text-gray-400 group-hover:text-white"
                    ></i>
                  </a>
                    <a
                      href="https://www.instagram.com/pa.rfait30/"
                      class="w-10 h-10 bg-blue-400/10 rounded-full flex items-center justify-center hover:bg-blue-400 transition-colors group"
                    >
                      <i
                        class="fab fa-instagram text-blue-400 group-hover:text-white"
                      ></i>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Contact Form -->
              <div data-aos="fade-left" class="bg-[#1a1f2d] p-8 rounded-xl">
                <form
  action="https://formspree.io/f/myzzbzpo"
  method="POST"
  class="space-y-6"
>
  <!-- Add this hidden input field -->
  <input 
    type="hidden" 
    name="_next" 
    value="http://192.168.30.13:8000/#contact"
  />

  <label class="block">
    Your email:
    <input
      type="email"
      name="email"
      class="w-full px-4 py-3 mt-2 bg-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
  </label>

  <label class="block">
    Your message:
    <textarea
      name="message"
      rows="4"
      class="w-full px-4 py-3 mt-2 bg-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    ></textarea>
  </label>

  <button
    type="submit"
    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg transition-colors duration-300 flex items-center justify-center space-x-2"
  >
    <span>Send</span>
    <i class="fas fa-paper-plane ml-2"></i>
  </button>
</form>
              </div>
            </div>
          </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-[#1a1f2d] py-8">
          <div class="container mx-auto px-4">
            <div class="text-center">
              <a href="#" class="text-2xl font-bold">
                Par<span class="text-blue-500">fait</span>
              </a>
              <p class="text-gray-400 mt-4">Designer & Front-End Developer</p>
              <div class="mt-4 flex items-center justify-center space-x-4">
                <a
                  href="mailto:ivancyusa1@gmail.com"
                  class="text-gray-400 hover:text-blue-500 transition-colors"
                >
                  <i class="fas fa-envelope"></i>
                </a>
                <a
                  href="https://wa.me/250787844326"
                  target="_blank"
                  class="text-gray-400 hover:text-green-500 transition-colors"
                >
                  <i class="fab fa-whatsapp"></i>
                </a>
              </div>
              <div class="mt-8 text-gray-500 text-sm">
                © 2025 Parfait. All rights reserved.
              </div>
            </div>
          </div>
        </footer>
      </div>

      <script>
        const { createApp } = Vue;

        createApp({
          data() {
            return {
              isMenuOpen: false,
              formData: {
                name: "",
                email: "",
                message: "",
              },
              isSubmitting: false,
              projects: [], // For storing portfolio projects
              apiBaseUrl: "http://localhost:8000/api/v1", // Update this with your actual API URL
              cursorPosition: { x: 0, y: 0 },
              mouseOver: false,
            };
          },
          methods: {
            toggleMenu() {
              this.isMenuOpen = !this.isMenuOpen;
              document.body.style.overflow = this.isMenuOpen ? "hidden" : "";
            },
            closeMenu() {
              this.isMenuOpen = false;
              document.body.style.overflow = "";
            },
            async submitForm() {
              this.isSubmitting = true;
              try {
                const response = await fetch(`${this.apiBaseUrl}/messages`, {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json",
                  },
                  body: JSON.stringify(this.formData),
                });

                if (response.ok) {
                  alert("Message sent successfully!");
                  this.formData = { name: "", email: "", message: "" };
                } else {
                  throw new Error("Failed to send message");
                }
              } catch (error) {
                console.error("Error:", error);
                alert("Failed to send message. Please try again.");
              } finally {
                this.isSubmitting = false;
              }
            },
            async fetchProjects() {
              try {
                const response = await fetch(`${this.apiBaseUrl}/projects`);
                if (response.ok) {
                  this.projects = await response.json();
                }
              } catch (error) {
                console.error("Error fetching projects:", error);
              }
            },
            handleScroll() {
              const sections = [
                "home",
                "about",
                "services",
                "portfolio",
                "contact",
              ];
              const scrollPosition = window.scrollY + 100;

              for (const section of sections) {
                const element = document.getElementById(section);
                if (element) {
                  const { offsetTop, offsetHeight } = element;
                  if (
                    scrollPosition >= offsetTop &&
                    scrollPosition < offsetTop + offsetHeight
                  ) {
                    this.activeSection = section;
                    break;
                  }
                }
              }
            },
            handleMouseMove(event) {
              this.cursorPosition.x = event.clientX;
              this.cursorPosition.y = event.clientY;

              // Update particles near cursor
              particles.forEach((particle) => {
                const dx = particle.x - this.cursorPosition.x;
                const dy = particle.y - this.cursorPosition.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 100) {
                  particle.speedX += dx * 0.01;
                  particle.speedY += dy * 0.01;
                }
              });
            },
          },
          mounted() {
            AOS.init({
              duration: 1000,
              once: true,
              disable: window.innerWidth < 768,
            });

            this.fetchProjects();

            window.addEventListener("scroll", this.handleScroll);
            window.addEventListener("resize", () => {
              if (window.innerWidth >= 768 && this.isMenuOpen) {
                this.closeMenu();
              }
            });
            window.addEventListener("mousemove", this.handleMouseMove);
          },
          beforeUnmount() {
            window.removeEventListener("scroll", this.handleScroll);
          },
        }).mount("#app");
      </script>

      <!-- Fetch and display projects -->
      <script>
        // Fetch and display projects
        fetch("/api/projects")
          .then((response) => response.json())
          .then((projects) => {
            const container = document.getElementById("projectsContainer");

            projects.forEach((project) => {
              const projectCard = `
                <div data-aos="fade-up" class="bg-[#1a1f2d] rounded-xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-300 shadow-xl">
                  <div class="relative overflow-hidden h-[400px]">
                    <img 
                      src="${project.image || getProjectImage(project.category)}" 
                      alt="${project.title}"
                      data-category="${project.category}"
                      class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                      onerror="handleImageError(this)"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end">
                      <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-white">${
                          project.title
                        }</h3>
                        <p class="text-gray-200 mb-4 line-clamp-3">${
                          project.description
                        }</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                          ${project.technologies
                            .split(",")
                            .map(
                              (tech) => `
                            <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm backdrop-blur-sm">
                              ${tech.trim()}
                            </span>
                          `
                            )
                            .join("")}
                        </div>
                        <div class="flex justify-between items-center mt-4">
                          <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                            ${project.category}
                          </span>
                          <div class="flex space-x-3">
                            ${
                              project.github_link
                                ? `
                              <a href="${project.github_link}" target="_blank" 
                                class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors backdrop-blur-sm">
                                <i class="fab fa-github text-white"></i>
                              </a>
                            `
                                : ""
                            }
                            ${
                              project.live_link
                                ? `
                              <a href="${project.live_link}" target="_blank" 
                                class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors backdrop-blur-sm">
                                <i class="fas fa-external-link-alt text-white"></i>
                              </a>
                            `
                                : ""
                            }
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              `;
              container.insertAdjacentHTML("beforeend", projectCard);
            });
          })
          .catch((error) => {
            console.error("Error loading projects:", error);
          });
      </script>

      <section id="projects" class="py-20 relative">
        <div
          class="absolute w-96 h-96 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-full filter blur-3xl opacity-20 animate-pulse -top-10 -right-10"
        ></div>

        <div class="container mx-auto px-4">
          <h2 data-aos="fade-up" class="text-4xl font-bold text-center mb-16">
            My <span class="text-blue-500">Projects</span>
          </h2>

          <div
            id="projectsContainer"
            class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto px-4"
          >
            <!-- Projects will be loaded here -->
          </div>
        </div>
      </section>

      <!-- Add this script before the closing body tag -->
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          // Fetch projects when the page loads
          fetch("/api/v1/projects")
            .then((response) => response.json())
            .then((projects) => {
              const container = document.getElementById("projectsContainer");

              projects.forEach((project) => {
                const projectCard = `
                  <div data-aos="fade-up" class="bg-[#1a1f2d] rounded-xl overflow-hidden group hover:transform hover:scale-105 transition-all duration-300 shadow-xl">
                    <div class="relative overflow-hidden h-[400px]">
                      <img 
                        src="${
                          project.image || getProjectImage(project.category)
                        }" 
                        alt="${project.title}"
                        data-category="${project.category}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                        onerror="handleImageError(this)"
                      >
                      <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end">
                        <div class="p-6">
                          <h3 class="text-2xl font-bold mb-3 text-white">${
                            project.title
                          }</h3>
                          <p class="text-gray-200 mb-4 line-clamp-3">${
                            project.description
                          }</p>
                          <div class="flex flex-wrap gap-2 mb-4">
                            ${project.technologies
                              .split(",")
                              .map(
                                (tech) => `
                            <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm backdrop-blur-sm">
                              ${tech.trim()}
                            </span>
                          `
                              )
                              .join("")}
                          </div>
                          <div class="flex justify-between items-center mt-4">
                            <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                              ${project.category}
                            </span>
                            <div class="flex space-x-3">
                              ${
                                project.github_link
                                  ? `
                                <a href="${project.github_link}" target="_blank" 
                                  class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors backdrop-blur-sm">
                                  <i class="fab fa-github text-white"></i>
                                </a>
                              `
                                  : ""
                              }
                              ${
                                project.live_link
                                  ? `
                                <a href="${project.live_link}" target="_blank" 
                                  class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors backdrop-blur-sm">
                                  <i class="fas fa-external-link-alt text-white"></i>
                                </a>
                              `
                                  : ""
                              }
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                `;
                container.insertAdjacentHTML("beforeend", projectCard);
              });

              // Reinitialize AOS after adding new elements
              AOS.refresh();
            })
            .catch((error) => {
              console.error("Error loading projects:", error);
            });
        });
      </script>

      <script>
        // Animated Background
        const canvas = document.getElementById("animatedBg");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const particleCount = 100;

        class Particle {
          constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2;
            this.speedX = Math.random() * 2 - 1;
            this.speedY = Math.random() * 2 - 1;
          }

          update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x > canvas.width) this.x = 0;
            if (this.x < 0) this.x = canvas.width;
            if (this.y > canvas.height) this.y = 0;
            if (this.y < 0) this.y = canvas.height;
          }

          draw() {
            ctx.fillStyle = "#3b82f6";
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
          }
        }

        function init() {
          for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
          }
        }

        function animate() {
          ctx.clearRect(0, 0, canvas.width, canvas.height);

          particles.forEach((particle) => {
            particle.update();
            particle.draw();
          });

          requestAnimationFrame(animate);
        }

        init();
        animate();

        window.addEventListener("resize", () => {
          canvas.width = window.innerWidth;
          canvas.height = window.innerHeight;
        });
      </script>

      <!-- Add this helper function to provide real project images based on category -->
      <script>
        function getProjectImage(category) {
          const images = {
            "Web Development": {
              primary: "https://i.ibb.co/VqXNnBR/web-dev-project.jpg",
              backup: "https://i.ibb.co/9gGGfRz/web-dashboard.jpg",
            },
            "UI/UX Design": {
              primary: "https://i.ibb.co/k8Jq8Sx/ui-design-project.jpg",
              backup: "https://i.ibb.co/Ld4wfTV/app-design.jpg",
            },
            "Mobile Design": {
              primary: "https://i.ibb.co/0MNqWPY/mobile-app-design.jpg",
              backup: "https://i.ibb.co/vw0qyZP/mobile-ui.jpg",
            },
            "AI Development": {
              primary: "https://i.ibb.co/C6t48f1/ai-project.jpg",
              backup: "https://i.ibb.co/xSZwgz7/ai-dashboard.jpg",
            },
            "Graphic Design": {
              primary: "https://i.ibb.co/Qp1SXBz/graphic-design.jpg",
              backup: "https://i.ibb.co/YRbNkxy/brand-design.jpg",
            },
            "Brand Design": {
              primary: "https://i.ibb.co/YRbNkxy/brand-design.jpg",
              backup: "https://i.ibb.co/Qp1SXBz/graphic-design.jpg",
            },
            default: {
              primary: "https://i.ibb.co/VqXNnBR/web-dev-project.jpg",
              backup: "https://i.ibb.co/9gGGfRz/web-dashboard.jpg",
            },
          };
          return (images[category] || images.default).primary;
        }

        // Update the backup image handler
        function handleImageError(img) {
          const backupImages = {
            "Web Development": "https://i.ibb.co/9gGGfRz/web-dashboard.jpg",
            "UI/UX Design": "https://i.ibb.co/Ld4wfTV/app-design.jpg",
            "Mobile Design": "https://i.ibb.co/vw0qyZP/mobile-ui.jpg",
            "AI Development": "https://i.ibb.co/xSZwgz7/ai-dashboard.jpg",
            "Graphic Design": "https://i.ibb.co/YRbNkxy/brand-design.jpg",
            "Brand Design": "https://i.ibb.co/Qp1SXBz/graphic-design.jpg",
            default: "https://i.ibb.co/VqXNnBR/web-dev-project.jpg",
          };

          // If the backup image also fails, use a local fallback
          img.onerror = null; // Prevent infinite loop
          img.src = backupImages[img.dataset.category] || backupImages.default;
        }
      </script>
    </body>
  </html>