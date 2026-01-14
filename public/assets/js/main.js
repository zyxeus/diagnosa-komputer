(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

})();

let jumlahForm = 3;

// Fungsi update background slider
function updateRangeBackground(input) {
  const min = parseInt(input.min || 0);
  const max = parseInt(input.max || 100);
  const val = parseInt(input.value);
  const percent = ((val - min) / (max - min)) * 100;
  input.style.background = `linear-gradient(to right, #007bff ${percent}%, #e0e0e0 ${percent}%)`;
}

// Update opsi dropdown supaya yang sudah dipilih di dropdown lain disembunyikan
function updateDropdownOptions() {
  const selects = document.querySelectorAll('#form-group-container select');
  const selectedValues = Array.from(selects)
    .map(s => s.value)
    .filter(v => v !== "");

  selects.forEach(select => {
    const currentValue = select.value;
    select.querySelectorAll('option').forEach(option => {
      if (option.value === "" || option.value === currentValue) {
        option.hidden = false;
      } else {
        option.hidden = selectedValues.includes(option.value);
      }
    });
  });
}

function tambahFormGroup() {
  const alertBox = document.getElementById('alert-gejala');
  let isValid = false;

  for (let i = 1; i <= jumlahForm; i++) {
    const select = document.getElementById(`gejala${i}`);
    if (select && select.value !== "") {
      isValid = true;
      break;
    }
  }

  if (!isValid) {
    alertBox.classList.remove('d-none');
    setTimeout(() => {
      alertBox.classList.add('fade-out');
      setTimeout(() => {
        alertBox.classList.add('d-none');
        alertBox.classList.remove('fade-out');
      }, 800);
    }, 2000);
    return;
  }

  if (jumlahForm >= 5) return;

  jumlahForm++;
  const container = document.getElementById('form-group-container');
  const newGroup = document.createElement('div');
  newGroup.className = 'form-group mb-3 d-flex align-items-center';

  // Buat opsi select berdasarkan kode_gejala
  let optionsHTML = '<option value="">-- Pilih Gejala --</option>';
  gejalaList.forEach(g => {
    optionsHTML += `<option value="${g.kode_gejala}">${g.nama_gejala}</option>`;
  });

  newGroup.innerHTML = `
    <label for="gejala${jumlahForm}" class="gejala-label fw-bold">Pilih Gejala Kerusakan ${jumlahForm}</label>
    <select id="gejala${jumlahForm}" class="form-select me-3 w-95">
      ${optionsHTML}
    </select>
    <input type="range" class="custom-range" min="0" max="100" step="50" value="50" style="width:400px;">
  `;

  container.appendChild(newGroup);

  const newSlider = newGroup.querySelector('.custom-range');
  updateRangeBackground(newSlider);
  newSlider.addEventListener('input', () => updateRangeBackground(newSlider));

  const newSelect = newGroup.querySelector('select');
  newSelect.addEventListener('change', updateDropdownOptions);

  updateDropdownOptions();

  if (jumlahForm === 5) {
    document.getElementById('tambah-gejala-btn').style.display = 'none';
  }
}

function prosesDiagnosa() {
  const selects = document.querySelectorAll('#form-group-container select');
  let adaGejala = Array.from(selects).some(select => select.value !== "");

  const alertBox = document.getElementById('alert-gejala');

  if (adaGejala) {
    alertBox.classList.add('d-none');
    alertBox.classList.remove('fade-out');
    // Biasanya disini kamu ingin submit form atau kirim data ke server.
    // Untuk demo redirect:
    window.location.href = "{{ url('/diagnosa/hasil') }}";
  } else {
    alertBox.classList.remove('d-none', 'fade-out');
    setTimeout(() => {
      alertBox.classList.add('fade-out');
      setTimeout(() => {
        alertBox.classList.add('d-none');
      }, 800);
    }, 1000);
  }
}

function resetForm() {
  const container = document.getElementById('form-group-container');
  const alertBox = document.getElementById('alert-gejala');

  while (jumlahForm > 3) {
    const lastChild = container.lastElementChild;
    if (lastChild) {
      container.removeChild(lastChild);
      jumlahForm--;
    }
  }

  const selects = container.querySelectorAll('select');
  const sliders = container.querySelectorAll('.custom-range');

  selects.forEach(select => {
    select.value = '';
  });

  sliders.forEach(slider => {
    slider.value = 50;
    updateRangeBackground(slider);
  });

  const tambahBtn = document.getElementById('tambah-gejala-btn');
  if (tambahBtn) tambahBtn.style.display = 'inline-block';

  if (alertBox) {
    alertBox.classList.add('d-none');
    alertBox.classList.remove('fade-out');
  }

  updateDropdownOptions();
}

// Event listener awal
document.addEventListener('DOMContentLoaded', () => {
  const selects = document.querySelectorAll('#form-group-container select');
  selects.forEach(select => {
    select.addEventListener('change', updateDropdownOptions);
  });
});