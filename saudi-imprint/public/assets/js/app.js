/*import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();*/
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
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  
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
     * Initiate glightbox
     */
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
  
    /*
      Frequently Asked Questions Toggle
     
    document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
      faqItem.addEventListener('click', () => {
        faqItem.parentNode.classList.toggle('faq-active');
      });
    });*/
  
    document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
      faqItem.addEventListener('click', () => {
        let faqContainer = faqItem.parentNode; 
        let faqContent = faqContainer.querySelector('.faq-content'); 
        
        if (faqContainer.classList.contains('faq-active')) {
          faqContent.style.height = "0px"; 
          setTimeout(() => { faqContent.style.display = "none"; }, 500); // إخفاء بعد الانتقال
          faqContainer.classList.remove('faq-active');
        } else {
          faqContent.style.display = "block"; // إظهار قبل تغيير الحجم
          let height = faqContent.scrollHeight + "px"; // حساب الارتفاع تلقائيًا
          faqContent.style.height = height;
          faqContainer.classList.add('faq-active');
        }
      });
    });
    
    function showSection(sectionId) {
      // إخفاء جميع الأقسام
      document.querySelectorAll('.content-section').forEach(section => {
          section.style.display = 'none';
      });
  
      // إظهار القسم المطلوب
      document.getElementById(sectionId).style.display = 'block';
  }
  
  // تشغيل أول قسم عند تحميل الصفحة
  document.addEventListener("DOMContentLoaded", function() {
      showSection('aboutRiyadh');
  });
  
  // تأكد أن الخريطة لا تعمل قبل تحميل الصفحة بالكامل
  document.addEventListener("DOMContentLoaded", function () {
    // إنشاء الخريطة وتحديد الإحداثيات
    var map = L.map('map').setView([24.7136, 46.6753], 12); // الرياض
  
    // إضافة طبقة الخريطة من OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
  
    // إضافة علامة موقع الرياض
    L.marker([24.7136, 46.6753]).addTo(map)
        .bindPopup('Welcome to Riyadh!') // رسالة عند الضغط على العلامة
        .openPopup();
  });
  
  document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filter-buttons .btn");
    const cards = document.querySelectorAll(".filter-item");
  
    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const filter = this.getAttribute("data-filter");
  
            buttons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
  
            cards.forEach(card => {
                if (filter === "all" || card.classList.contains(filter)) {
                    card.classList.remove("hidden");
                } else {
                    card.classList.add("hidden");
                }
            });
        });
    });
  });
  
  })();
  
  function addTour() {
    let name = document.getElementById("tourName").value;
    let location = document.getElementById("tourLocation").value;
    let dateTime = document.getElementById("tourDateTime").value;
    let people = document.getElementById("tourPeople").value;
    let type = document.getElementById("tourType").value;
    
    let features = [];
    if (document.getElementById("car").checked) features.push("Car");
    if (document.getElementById("snacks").checked) features.push("Snacks");
    if (document.getElementById("guide").checked) features.push("Private Guide");
    if (document.getElementById("tickets").checked) features.push("Entrance Tickets");

    let featureText = features.length > 0 ? features.join(", ") : "None";

    let tableBody = document.getElementById("tourTableBody");
    let newRow = tableBody.insertRow();
    
    newRow.innerHTML = `
        <td>${name}</td>
        <td>${location}</td>
        <td>${dateTime}</td>
        <td>${people}</td>
        <td>${type}</td>
        <td>${featureText}</td>
        <td class="d-flex gap-2">
            <button class="btn btn-warning text-white btn-sm" onclick="editTour(this)">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteTour(this)">Delete</button>
        </td>
    `;

    document.getElementById("tourForm").reset();
}

function editTour(button) {
    let row = button.closest("tr");
    let cells = row.getElementsByTagName("td");

    document.getElementById("tourName").value = cells[0].innerText;
    document.getElementById("tourLocation").value = cells[1].innerText;
    document.getElementById("tourDateTime").value = cells[2].innerText;
    document.getElementById("tourPeople").value = cells[3].innerText;
    document.getElementById("tourType").value = cells[4].innerText;

    let features = cells[5].innerText.split(", ");
    document.getElementById("car").checked = features.includes("Car");
    document.getElementById("snacks").checked = features.includes("Snacks");
    document.getElementById("guide").checked = features.includes("Private Guide");
    document.getElementById("tickets").checked = features.includes("Entrance Tickets");

    row.remove();
}

function deleteTour(button) {
    button.closest("tr").remove();
}
document.getElementById("guideImage").addEventListener("change", function(event) {
  const imagePreview = document.getElementById("imagePreview");
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      imagePreview.src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
});

  function openMessageModal(name) {
    document.getElementById('recipientName').innerText = `To: ${name}`;
    var modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modal.show();
  }


