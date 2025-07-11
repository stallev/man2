document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.querySelector('.header__mobile-menu-btn');
    const nav = document.querySelector('.header__nav');
    const body = document.body;

    // Функция для переключения меню
    const toggleMenu = () => {
        mobileMenuBtn.classList.toggle('active');
        nav.classList.toggle('active');
        body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
    };

    // Обработчик клика по кнопке меню
    mobileMenuBtn.addEventListener('click', toggleMenu);

    // Закрытие меню при клике на ссылку
    const menuLinks = document.querySelectorAll('.header__menu-link');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (nav.classList.contains('active')) {
                toggleMenu();
            }
        });
    });

    // Закрытие меню при клике вне меню
    document.addEventListener('click', (e) => {
        if (nav.classList.contains('active') && 
            !nav.contains(e.target) && 
            !mobileMenuBtn.contains(e.target)) {
            toggleMenu();
        }
    });

    // Закрытие меню при изменении размера окна
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && nav.classList.contains('active')) {
            toggleMenu();
        }
    });
});

// Модальное окно
const modal = document.getElementById('orderModal');
const modalOverlay = modal.querySelector('.modal__overlay');
const modalClose = modal.querySelector('.modal__close');
const orderForm = document.getElementById('orderForm');
const feedbackForm = document.getElementById('feedbackForm');
const contactsForm = document.getElementById('contactsForm');
const serviceNameInput = document.getElementById('serviceName');
const modalServiceNameInput = modal.querySelector('input[name="service"]');
const phoneInputs = document.querySelectorAll('.form-phone');

// Открытие модального окна
document.querySelectorAll('.service-card__button').forEach(button => {
    button.addEventListener('click', () => {
        const modalTitle = document.querySelector('.modal__title');
        modalTitle.textContent = `Заказать услугу`;
        const serviceName = button.dataset.service;
        modalServiceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

document.querySelectorAll('.hero__button').forEach(button => {
    button.addEventListener('click', () => {
        const serviceName = 'Заказ манипулятора с первого экрана первой страницы';
        modalServiceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

document.querySelectorAll('.equipment-card__order-btn').forEach(button => {
    button.addEventListener('click', () => {
        const equipmentName = button.dataset.equipment;
        const modalTitle = document.querySelector('.modal__title');
        modalTitle.textContent = `Заказать манипулятор ${equipmentName}`;
        const serviceName = `Заказ конретной модели манипулятора: ${equipmentName} `;
        modalServiceNameInput.value = serviceName;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

// Закрытие модального окна
function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
    orderForm.reset();
}

modalClose.addEventListener('click', closeModal);
modalOverlay.addEventListener('click', closeModal);

// Закрытие по Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
    }
});

// Маска телефона
function maskPhone(input) {
    const matrix = '+375 (__) ___-__-__';
    const def = matrix.replace(/\D/g, '');
    let i = 0;
    let val = input.value.replace(/\D/g, '');

    if (def.length >= val.length) {
        val = def;
    }

    input.value = matrix.replace(/./g, function(a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? '' : a;
    });
}

if (phoneInputs) {
    phoneInputs.forEach(input => {
        input.addEventListener('input', () => maskPhone(input));
        input.addEventListener('focus', () => maskPhone(input));
        input.addEventListener('blur', () => {
            if (input.value.length < 18) {
                input.value = '';  
            }
        });
    });
}

// --- Обработчик отправки формы ---
orderForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    await handleFormData(orderForm);
});

if(feedbackForm) {
    feedbackForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        await handleFormData(feedbackForm);
    });
}

async function handleFormData(form) {
    const formData = new FormData(form);
    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            alert(result.message || 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
            form.reset();
        } else {
            alert(result.message || 'Ошибка при отправке сообщения. Пожалуйста, попробуйте ещё раз.');
        }
    } catch (error) {
        alert('Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.');
    }
}

// Анимация появления при прокрутке
(function() {
  const animatedEls = document.querySelectorAll('.animated-fadeInUp, .animated-fadeIn, .breadcrumbs, .contacts-seo-text, .feedback, .contacts-form-section, .service-feedback');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    animatedEls.forEach(el => observer.observe(el));
  } else {
    // Fallback: показать сразу
    animatedEls.forEach(el => el.classList.add('visible'));
  }
})();

// Анимация появления главной страницы при открытии
if (document.body.classList.contains('page-animate-in')) {
  window.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      document.body.classList.remove('page-animate-in');
    }, 80);
  });
}

//service.js
(function() {
  // FAQ-аккордеон: только один открыт, плавное открытие, поддержка Tab
  const faqItems = document.querySelectorAll('.faq__item');
  faqItems.forEach(item => {
      const question = item.querySelector('.faq__question');
      question.addEventListener('click', () => {
          // Закрыть все
          faqItems.forEach(i => {
              if (i !== item) i.classList.remove('active');
          });
          // Открыть/закрыть текущий
          item.classList.toggle('active');
      });
      // Поддержка Tab/Enter
      question.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              question.click();
          }
      });
  });
  
  // Маска телефона для формы обратной связи на странице услуги
  const phoneService = document.getElementById('phoneService');
  if (phoneService) {
      phoneService.addEventListener('input', () => maskPhone(phoneService));
      phoneService.addEventListener('focus', () => maskPhone(phoneService));
      phoneService.addEventListener('blur', () => {
          if (phoneService.value.length < 18) phoneService.value = '';
      });
  }
  
  // Открытие модального окна по кнопке в hero
  const modal = document.getElementById('orderModal');
  const modalOverlay = modal.querySelector('.modal__overlay');
  const modalClose = modal.querySelector('.modal__close');
  const orderForm = document.getElementById('orderForm');
  const serviceNameInput = document.getElementById('serviceName');
  
  document.querySelectorAll('.service-hero__order-btn, .service-card__button').forEach(btn => {
      btn.addEventListener('click', () => {
          const service = btn.dataset.service || 'Перевозка газосиликатных блоков';
          serviceNameInput.value = service;
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
      });
  });
  modalClose.addEventListener('click', closeModal);
  modalOverlay.addEventListener('click', closeModal);
  function closeModal() {
      modal.classList.remove('active');
      document.body.style.overflow = '';
      orderForm.reset();
  }
  document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
  });
  
  // Маска телефона для модального окна
  const phoneInput = document.getElementById('phone');
  if (phoneInput) {
      phoneInput.addEventListener('input', () => maskPhone(phoneInput));
      phoneInput.addEventListener('focus', () => maskPhone(phoneInput));
      phoneInput.addEventListener('blur', () => {
          if (phoneInput.value.length < 18) phoneInput.value = '';
      });
  }
  
  // Отправка формы обратной связи (имитация)
  const feedbackFormService = document.getElementById('feedbackFormService');
  if (feedbackFormService) {
      feedbackFormService.addEventListener('submit', function(e) {
          e.preventDefault();
          alert('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
          feedbackFormService.reset();
      });
  }
  // Отправка формы заказа (имитация)
  if (orderForm) {
      orderForm.addEventListener('submit', function(e) {
          e.preventDefault();
          alert('Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.');
          closeModal();
      });
  }
  })(); 

